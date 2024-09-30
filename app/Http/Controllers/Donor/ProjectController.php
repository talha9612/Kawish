<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Donor;
use Auth;
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
}
