<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $donors = Donor::all();
        $projects = Project::where('donor_id',Auth::user()->id)->get();
        return view('donor.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('donor.project.view', compact('records'));
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

        return view('donor.dashboard.index', compact('data'));
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
