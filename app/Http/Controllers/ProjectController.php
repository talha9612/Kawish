<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Auth;
use App\Models\Surveyed;
use App\Models\Donor;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::get();
        return view('user_project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $record = Surveyed::findOrFail($request->id);
        $record->asign = 1;
        $record->save();
        $validatedData = $request->validate([
            'requested_by' => 'required',
            'requested_for' => 'required',
            'donor_id' => 'required',
            'plaque_id' => 'required',
            // 'status' => 'required',
            'tentative_start_date' => 'required|date',
            // 'actual_start_date' => 'required|date',
            'tentative_completion_date' => 'required|date',
            // 'actual_completion_date' => 'required|date',
            'actual_cost' => 'required|numeric',
            // 'depth' => 'required|numeric',
            // 'snap_surveyed' => 'required',
            // 'snap_working' => 'required',
            // 'current_working' => 'required',
            'custodian_name' => 'required',
            'custodian_phone' => 'required',
            // 'comments' => 'required',
        ]);
      
        $today = Carbon::today()->toDateString();
        $newDate = date("Ymd", strtotime($request->input('tentative_start_date')));
        // echo $newDate;
     
        $project = Project::where('setup',$request->input('setup'))->where('region',$request->input('region'))->where('area',$request->input('area'))->where('village_name',$request->input('village_name'))->whereDate('tentative_start_date', $today)->first();
        // dd($project);
        // Given project code
        $projectCode = $project->project_id ?? null;
        
        // Check if $projectCode is a string before proceeding
        if (is_string($projectCode)) {
            $one = rtrim($projectCode, '0123456789');
            $second = intval(substr($projectCode, -1));
            $project_name = $request->input('project_id') . $newDate;
            if ($one == $project_name."-") {
                $second++;
            }
        } else {
            $project_name = $request->input('project_id') . $newDate;
            $second = 1;
        }
        $model = new Project();
        $model->survey_id = $request->input('id');
        $model->setup = $request->input('setup');
        $model->project_id = $project_name . "-" . $second;
        $model->requested_by = $request->input('requested_by');
        $model->requested_for = $request->input('requested_for');
        $model->donor_id = $request->input('donor_id');
        $model->plaque_id = $request->input('plaque_id');
        $model->area = $request->input('area');
        $model->region = $request->input('region');
        $model->village_name = $request->input('village_name');
        $model->appro_h_f = $request->input('appro_h_f');
        $model->appro_residents = $request->input('appro_residents');
        $model->tentative_start_date = $request->input('tentative_start_date');
        $model->actual_start_date = $request->input('actual_start_date');
        $model->tentative_completion_date = $request->input('tentative_completion_date');
        $model->actual_completion_date = $request->input('actual_completion_date');
        $model->status = $request->input('status');
        $model->expected_cost = $request->input('expected_cost');
        $model->actual_cost = $request->input('actual_cost');
        $model->depth = $request->input('depth');
        $model->snap_surveyed = $request->input('surveyed_images');
        $model->snap_working = $request->input('snap_working');
        $model->current_working = $request->input('current_working');
        $model->custodian_name = $request->input('custodian_name');
        $model->custodian_phone = $request->input('custodian_phone');
        $model->comments = $request->input('comments');
        
        if ($request->hasFile('current_working')) {
            $images = [];
            foreach ($request->file('current_working') as $image) {
                $imageName = time().rand() . '_' . $image->getClientOriginalName(); // Generate a unique name
                $imagePath = '/projects/current_working/' . $imageName;
                // Save the image to the public/images directory
                $image->move(public_path('/projects/current_working/'), $imageName);
                $images[] = $imagePath;
            }
            // Convert images array to JSON and save it to the image column
            $model->current_working = json_encode($images);
        }
        if ($request->hasFile('snap_working')) {
            $images = [];
            foreach ($request->file('snap_working') as $image) {
                $imageName = time().rand() . '_' . $image->getClientOriginalName(); // Generate a unique name
                $imagePath = '/projects/snap_working/' . $imageName;
                // Save the image to the public/images directory
                $image->move(public_path('/projects/snap_working/'), $imageName);
                $images[] = $imagePath;
            }
            // Convert images array to JSON and save it to the image column
            $model->snap_working = json_encode($images);
        }
        // Save the model instance to the database
        $model->save();

        // Optionally, you can return a response to the AJAX request
        return redirect('project')->with(['success' => 'Data Saved Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function add($id){
        $survey = Surveyed::findOrFail($id);
        $donors = Donor::all();
        return view('user_project.add',compact('survey','donors'));
    }
    public function getProjectDetails($id){
        $records = Project::select(
            'setup',
            'project_id',
            'requested_by',
            'requested_for',
            'donor_id',
            'plaque_id',
            'area',
            'village_name',
            'region',
            'appro_h_f',
            'appro_residents',
            'tentative_start_date',
            'actual_start_date',
            'tentative_completion_date',
            'actual_completion_date',
            'status',
            'expected_cost',
            'actual_cost',
            'depth',
            'snap_surveyed',
            'snap_working',
            'current_working',
            'custodian_name',
            'custodian_phone',
            'comments',
        )->findOrFail($id);
        $datetimeString = $records->created_at;
        $date = date("Y-m-d", strtotime($datetimeString));
        $records->created_at =  $date; 
        return view('user_project.view', compact('records'));
    }






    public function punjper()
    {
        $totalHandPumpSetupsCount = $this->getTotalHandPumpSetupsCount();
        $totalNewWellSetupsCount = $this->getTotalNewWellSetupsCount();
        $totalRepairWellSetupsCount = $this->getTotalRepairWellSetupsCount();
    
        // Calculate the total sum
        $totalSum = $totalHandPumpSetupsCount + $totalNewWellSetupsCount + $totalRepairWellSetupsCount;
    
        $HandPumpCount = Project::where('region', 'Punjab')->where('setup', 'Hand Pump')->count();
        $NewWellCount = Project::where('region', 'Punjab')->where('setup', 'New Well')->count();
        $RepairWellCount = Project::where('region', 'Punjab')->where('setup', 'Repair Well')->count();
    
        // Calculate percentage for the current region
        $percentage = ($HandPumpCount + $NewWellCount + $RepairWellCount) / $totalSum * 100;
        return $percentage;
    }
    public function kpkper()
    {
        $totalHandPumpSetupsCount = $this->getTotalHandPumpSetupsCount();
        $totalNewWellSetupsCount = $this->getTotalNewWellSetupsCount();
        $totalRepairWellSetupsCount = $this->getTotalRepairWellSetupsCount();
    
        // Calculate the total sum
        $totalSum = $totalHandPumpSetupsCount + $totalNewWellSetupsCount + $totalRepairWellSetupsCount;
    
        $HandPumpCount = Project::where('region', 'Khyber-Pakhtunkhwa')->where('setup', 'Hand Pump')->count();
        $NewWellCount = Project::where('region', 'Khyber-Pakhtunkhwa')->where('setup', 'New Well')->count();
        $RepairWellCount = Project::where('region', 'Khyber-Pakhtunkhwa')->where('setup', 'Repair Well')->count();
    
        // Calculate percentage for the current region
        $percentage = ($HandPumpCount + $NewWellCount + $RepairWellCount) / $totalSum * 100;
        return $percentage;
    }
    public function balper()
    {
        $totalHandPumpSetupsCount = $this->getTotalHandPumpSetupsCount();
        $totalNewWellSetupsCount = $this->getTotalNewWellSetupsCount();
        $totalRepairWellSetupsCount = $this->getTotalRepairWellSetupsCount();
    
        // Calculate the total sum
        $totalSum = $totalHandPumpSetupsCount + $totalNewWellSetupsCount + $totalRepairWellSetupsCount;
    
        $HandPumpCount = Project::where('region', 'Balochistan')->where('setup', 'Hand Pump')->count();
        $NewWellCount = Project::where('region', 'Balochistan')->where('setup', 'New Well')->count();
        $RepairWellCount = Project::where('region', 'Balochistan')->where('setup', 'Repair Well')->count();
    
        // Calculate percentage for the current region
        $percentage = ($HandPumpCount + $NewWellCount + $RepairWellCount) / $totalSum * 100;
        return $percentage;
    }
    public function sindhper()
    {
        $totalHandPumpSetupsCount = $this->getTotalHandPumpSetupsCount();
        $totalNewWellSetupsCount = $this->getTotalNewWellSetupsCount();
        $totalRepairWellSetupsCount = $this->getTotalRepairWellSetupsCount();
    
        // Calculate the total sum
        $totalSum = $totalHandPumpSetupsCount + $totalNewWellSetupsCount + $totalRepairWellSetupsCount;
    
        $HandPumpCount = Project::where('region', 'Sindh')->where('setup', 'Hand Pump')->count();
        $NewWellCount = Project::where('region', 'Sindh')->where('setup', 'New Well')->count();
        $RepairWellCount = Project::where('region', 'Sindh')->where('setup', 'Repair Well')->count();
    
        // Calculate percentage for the current region
        $percentage = ($HandPumpCount + $NewWellCount + $RepairWellCount) / $totalSum * 100;
        return $percentage;
    }
    
    



    public function headCount()
    {
        // Calculate the total hand pump setups count
        $headNewWellSetupsCount = Project::where('setup', 'New Well')->count();
        $headHandPumpSetupsCount = Project::where('setup', 'Hand Pump')->count();
        $headRepairWellSetupsCount = Project::where('setup', 'Repair Well')->count();

        // Return the counts as an array
        return [
            'headNewWellSetupsCount' => $headNewWellSetupsCount,
            'headHandPumpSetupsCount' => $headHandPumpSetupsCount,
            'headRepairWellSetupsCount' => $headRepairWellSetupsCount,
        ];
    }
    public function getheadHandPumpSetupsCount()
    {
        // Calculate the total hand pump setups count
        $headHandPumpSetupsCount = Project::where('setup', 'Hand Pump')->count();

        // Return the count
        return $headHandPumpSetupsCount;
    }
    public function getheadNewWellSetupsCount()
    {
        // Calculate the total count of setups where setup is "New Well"
        $headNewWellSetupsCount = Project::where('setup', 'New Well')->count();

        // Return the count
        return $headNewWellSetupsCount;
    }

    public function getheadRepairWellSetupsCount()
    {
        // Calculate the total count of setups where setup is "Repair Well"
        $headRepairWellSetupsCount = Project::where('setup', 'Repair Well')->count();

        // Return the count
        return $headRepairWellSetupsCount;
    }












    

    public function getTotalHandPumpSetupsCount()
    {
        // Calculate the total hand pump setups count
        $totalHandPumpSetupsCount = Project::where('setup', 'Hand Pump')->count();

        // Return the count
        return $totalHandPumpSetupsCount;
    }
    public function getTotalNewWellSetupsCount()
    {
        // Calculate the total count of setups where setup is "New Well"
        $totalNewWellSetupsCount = Project::where('setup', 'New Well')->count();

        // Return the count
        return $totalNewWellSetupsCount;
    }

    public function getTotalRepairWellSetupsCount()
    {
        // Calculate the total count of setups where setup is "Repair Well"
        $totalRepairWellSetupsCount = Project::where('setup', 'Repair Well')->count();

        // Return the count
        return $totalRepairWellSetupsCount;
    }






    public function getTotalCountsByRegion()
    {
        try {
            // Define all regions
            $regions = ['Punjab', 'Sindh', 'Khyber-Pakhtunkhwa', 'Balochistan'];

            // Initialize an array to store counts for all regions
            $totalCountsByRegion = [];

            // Loop through each region
            foreach ($regions as $region) {
                // Fetch counts for each setup type in the current region
                $totalHandPumpCount = Project::where('region', $region)->where('setup', 'Hand Pump')->count();
                $totalNewWellCount = Project::where('region', $region)->where('setup', 'New Well')->count();
                $totalRepairWellCount = Project::where('region', $region)->where('setup', 'Repair Well')->count();

                // Store counts for the current region
                $totalCountsByRegion[$region] = [
                    'totalHandPumpCount' => $totalHandPumpCount,
                    'totalNewWellCount' => $totalNewWellCount,
                    'totalRepairWellCount' => $totalRepairWellCount,
                ];
            }

            // Return the counts for all regions
            return response()->json($totalCountsByRegion);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch total counts by region'], 500);
        }
    }

    public function getAllRegionSetupCounts($region)
    {
        try {
            $areas = Project::where('region', ucfirst($region))->distinct()->pluck('area')->toArray();
            $data = [];

            foreach ($areas as $area) {
                $handPumpCount = Project::where('region', ucfirst($region))->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Project::where('region', ucfirst($region))->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Project::where('region', ucfirst($region))->where('area', $area)->where('setup', 'Repair Well')->count();

                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }

            return response()->json([$region => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
    


    public function getAllPunjabSetupCounts()
    {
        try {
            // Fetch the counts of hand pumps, new wells, and repair wells for all areas in Punjab
            $areas = Project::where('region', 'Punjab')->distinct()->pluck('area')->toArray();
            $data = [];
    
            foreach ($areas as $area) {
                $handPumpCount = Project::where('region', 'Punjab')->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Project::where('region', 'Punjab')->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Project::where('region', 'Punjab')->where('area', $area)->where('setup', 'Repair Well')->count();
    
                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }
    
            // Return the setup counts as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
   
    public function getAllkpkSetupCounts()
    {
        try {
            // Fetch the counts of hand pumps, new wells, and repair wells for all areas in Punjab
            $areas = Project::where('region', 'Khyber-Pakhtunkhwa')->distinct()->pluck('area')->toArray();
            $data = [];
    
            foreach ($areas as $area) {
                $handPumpCount = Project::where('region', 'Khyber-Pakhtunkhwa')->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Project::where('region', 'Khyber-Pakhtunkhwa')->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Project::where('region', 'Khyber-Pakhtunkhwa')->where('area', $area)->where('setup', 'Repair Well')->count();
    
                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }
    
            // Return the setup counts as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
    public function getAllsindhSetupCounts()
    {
        try {
            // Fetch the counts of hand pumps, new wells, and repair wells for all areas in Punjab
            $areas = Project::where('region', 'Sindh')->distinct()->pluck('area')->toArray();
            $data = [];
    
            foreach ($areas as $area) {
                $handPumpCount = Project::where('region', 'Sindh')->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Project::where('region', 'Sindh')->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Project::where('region', 'Sindh')->where('area', $area)->where('setup', 'Repair Well')->count();
    
                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }
    
            // Return the setup counts as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
    public function getAllbalSetupCounts()
    {
        try {
            // Fetch the counts of hand pumps, new wells, and repair wells for all areas in Punjab
            $areas = Project::where('region', 'Balochistan')->distinct()->pluck('area')->toArray();
            $data = [];
    
            foreach ($areas as $area) {
                $handPumpCount = Project::where('region', 'Balochistan')->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Project::where('region', 'Balochistan')->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Project::where('region', 'Balochistan')->where('area', $area)->where('setup', 'Repair Well')->count();
    
                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }
    
            // Return the setup counts as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }












}
