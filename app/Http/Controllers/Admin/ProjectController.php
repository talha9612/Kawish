<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Donor;
use App\Models\Project;
use App\Models\Surveyed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index(){
        $donors = Donor::all();
        $projects = Project::all();
        return view('admin.project.index',compact('donors','projects'));
    }

    public function add($id){
        $survey = Surveyed::findOrFail($id);
        $donors = Donor::all();
        return view('admin.project.add',compact('survey','donors'));
    }
    public function store(Request $request){
      
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
        return redirect('admin/project')->with(['success' => 'Data Saved Successfully']);
    }
    public function editProject($id){
        $record = Project::findOrFail($id);
        $donors = Donor::all();
        return view('admin.project.edit',compact('record','donors'));
    }
    public function updateProject(Request $request, $id){
        // dd($request->all());
         // Validate the incoming request data
         $request->validate([
            // Add validation rules for each field
            // 'requested_by' => 'required',
            // 'requested_for' => 'required',
            // 'donor_id' => 'required|exists:donors,id',
            // 'plaque_id' => 'nullable|numeric',
            // 'appro_h_f' => 'nullable|numeric',
            // 'appro_residents' => 'nullable|numeric',
            // 'tentative_start_date' => 'nullable|date',
            // 'tentative_completion_date' => 'nullable|date',
            // 'actual_start_date' => 'nullable|date',
            // 'actual_completion_date' => 'nullable|date',
            // 'status' => 'required|in:In Process,Completed',
            // 'expected_cost' => 'nullable|numeric',
            // 'actual_cost' => 'nullable|numeric',
            // 'depth' => 'nullable|string',
            // 'custodian_phone' => 'nullable|string',
            // 'custodian_name' => 'nullable|string',
            // 'comments' => 'nullable|string',
            // 'surveyed_images.*' => 'nullable|image', // Adjust this based on your requirements
            // 'current_working.*' => 'nullable|image', // Adjust this based on your requirements
            // 'snap_working.*' => 'nullable|image', // Adjust this based on your requirements
        ]);

        $record = Project::findOrFail($id);
        $record->requested_by = $request->input('requested_by');
        $record->requested_for = $request->input('requested_for');
        $record->donor_id = $request->input('donor_id');
        $record->area = $request->input('area');
        $record->village_name = $request->input('village_name');
        $record->region = $request->input('region');
        $record->plaque_id = $request->input('plaque_id');
        $record->appro_h_f = $request->input('appro_h_f');
        $record->appro_residents = $request->input('appro_residents');
        $record->tentative_start_date = $request->input('tentative_start_date');
        $record->tentative_completion_date = $request->input('tentative_completion_date');
        $record->actual_start_date = $request->input('actual_start_date');
        $record->actual_completion_date = $request->input('actual_completion_date');
        $record->status = $request->input('status');
        $record->expected_cost = $request->input('expected_cost');
        $record->actual_cost = $request->input('actual_cost');
        $record->depth = $request->input('depth');
        $record->custodian_phone = $request->input('custodian_phone');
        $record->custodian_name = $request->input('custodian_name');
        $record->comments = $request->input('comments');
        
        if ($request->hasFile('surveyed_images')) {
            $images = [];
            foreach ($request->file('surveyed_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name
                $imagePath = '/images/' . $imageName;
                // Save the image to the public/images directory
                $image->move(public_path('images'), $imageName);
                
                $images[] = $imagePath;
            }
            
            // Merge existing images with new images
            $existingImages = json_decode($record->snap_surveyed, true) ?? [];
            $updatedImages = array_merge($existingImages, $images);
            // Convert images array to JSON and update the image column
            $record->snap_surveyed = json_encode($updatedImages);
        }else {
            // Handle the case when there are no new images uploaded
            $record->snap_surveyed = $record->snap_surveyed ?? '[]'; // Set to an empty array if there are no existing images
        }
        if ($request->hasFile('current_working')) {
            $images = [];
            foreach ($request->file('current_working') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name
                $imagePath = '/projects/current_working/' . $imageName;
                // Save the image to the public/images directory
                $image->move(public_path('/projects/current_working/'), $imageName);
                
                $images[] = $imagePath;
            }
            
            // Merge existing images with new images
            $existingImages = json_decode($record->current_working, true) ?? [];
            $updatedImages = array_merge($existingImages, $images);
            // Convert images array to JSON and update the image column
            $record->current_working = json_encode($updatedImages);
        }else {
            // Handle the case when there are no new images uploaded
            $record->current_working = $record->current_working ?? '[]'; // Set to an empty array if there are no existing images
        }
        if ($request->hasFile('snap_working')) {
            $images = [];
            foreach ($request->file('snap_working') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name
                $imagePath = '/projects/snap_working/' . $imageName;
                // Save the image to the public/images directory
                $image->move(public_path('/projects/snap_working/'), $imageName);
                
                $images[] = $imagePath;
            }
            
            // Merge existing images with new images
            $existingImages = json_decode($record->snap_working, true) ?? [];
            $updatedImages = array_merge($existingImages, $images);
            // Convert images array to JSON and update the image column
            $record->snap_working = json_encode($updatedImages);
        }else {
            // Handle the case when there are no new images uploaded
            $record->snap_working = $record->snap_working ?? '[]'; // Set to an empty array if there are no existing images
        }
        $record->save();
        $request->session()->flash('success', 'Project updated successfully.');

        return redirect('admin/project');
    }
    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        // Optionally, you can return a response or redirect back
        return redirect()->back()->with('success', 'Project Deleted Successfully.');
    } 
    public function getProjectDetails($id){
        $records = Project::with('donor')->select(
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
        return view('admin.project.view', compact('records'));
    }
    public function surveyedImagedelete(Request $request, $id){
        $project = Project::findOrFail($id);
        $images = json_decode($project->snap_surveyed);
        $imageUrlsArray = (array) $images;
        $key = array_search($request->image, $imageUrlsArray);
        // If the image URL is found, remove it from the array
        if ($key !== false) {
            unset($imageUrlsArray[$key]);
        }
        $project->snap_surveyed = $imageUrlsArray;
        $project->save();
        return redirect()->back()->with('success', 'Image Deleted Successfully.');
    }
    public function currentWorkingImagedelete(Request $request, $id){
        $project = Project::findOrFail($id);
        $images = json_decode($project->current_working);
        $imageUrlsArray = (array) $images;
        $key = array_search($request->image, $imageUrlsArray);
        // If the image URL is found, remove it from the array
        if ($key !== false) {
            unset($imageUrlsArray[$key]);
        }
        $project->current_working = $imageUrlsArray;
        $project->save();
        return redirect()->back()->with('success', 'Image Deleted Successfully.');
    }
    public function snapWorkingImagedelete(Request $request, $id){
        $project = Project::findOrFail($id);
        $images = json_decode($project->snap_working);
        $imageUrlsArray = (array) $images;
        $key = array_search($request->image, $imageUrlsArray);
        // If the image URL is found, remove it from the array
        if ($key !== false) {
            unset($imageUrlsArray[$key]);
        }
        $project->snap_working = $imageUrlsArray;
        $project->save();
        return redirect()->back()->with('success', 'Image Deleted Successfully.');
    }
    public function showPercentages()
    {
        // Define the regions
        $regions = ['Punjab', 'Khyber-Pakhtunkhwa', 'Balochistan', 'Sindh'];
        $data = [];

        // Calculate total setups
        $totalHandPumpSetupsCount = $this->getTotalHandPumpSetupsCount();
        $totalNewWellSetupsCount = $this->getTotalNewWellSetupsCount();
        $totalRepairWellSetupsCount = $this->getTotalRepairWellSetupsCount();
        $totalSum = $totalHandPumpSetupsCount + $totalNewWellSetupsCount + $totalRepairWellSetupsCount;

        // Calculate percentages for each region
        foreach ($regions as $region) {
            $handPumpCount = Project::where('region', $region)->where('setup', 'Hand Pump')->count();
            $newWellCount = Project::where('region', $region)->where('setup', 'New Well')->count();
            $repairWellCount = Project::where('region', $region)->where('setup', 'Repair Well')->count();

            // Calculate percentage
            $percentage = $totalSum > 0 ? ($handPumpCount + $newWellCount + $repairWellCount) / $totalSum * 100 : 0;
            $data[strtolower($region) . 'per'] = round($percentage, 2); // Store with region name in lowercase
        }

        return view('admin.dashboard.index', compact('data'));
    }

    // Example methods for total counts
    private function getTotalHandPumpSetupsCount()
    {
        return Project::where('setup', 'Hand Pump')->count();
    }

    private function getTotalNewWellSetupsCount()
    {
        return Project::where('setup', 'New Well')->count();
    }

    private function getTotalRepairWellSetupsCount()
    {
        return Project::where('setup', 'Repair Well')->count();
    }
}

