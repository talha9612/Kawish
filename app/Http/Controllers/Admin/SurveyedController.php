<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Surveyed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SurveyedController extends Controller
{
    public function index(){
        $surveyed = Surveyed::where('asign',0)->get();
        return view('admin.surveyed.index',compact('surveyed'));
    }
    public function SaveSurveyed(Request $request){
        // dd($request->all());
        // Validate the incoming request data if needed
        $validatedData = $request->validate([
        'setup' => 'required',
        // 'project_id' => 'required|numeric', 
        'status' => 'required', // Add validation rules for other fields here
        'area' => 'required',
        'village_name' => 'required',
        'appro_h_f' => 'required|numeric',
        'appro_residents' => 'required|numeric',
        'expected_cost' => 'required|numeric',
        'images.*' => 'required',
        'remark' => 'required',
        ]);

        // Create a new Project instance and populate it with the request data
        $project = new Surveyed();
        $project->setup = $request->input('setup');
        $project->project_id = $request->input('project_id');
        $project->status = $request->input('status');
        $project->area = $request->input('area');
        $project->village_name = $request->input('village_name');
        $project->region = $request->input('region');
        $project->appro_h_f = $request->input('appro_h_f');
        $project->appro_residents = $request->input('appro_residents');
        $project->expected_cost = $request->input('expected_cost');
        $project->remark = $request->input('remark');

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name
                $imagePath = '/images/' . $imageName;
                // Save the image to the public/images directory
                $image->move(public_path('images'), $imageName);
                $images[] = $imagePath;
            }
            // Convert images array to JSON and save it to the image column
            $project->image = json_encode($images);
        }

        // Save the project to the database
        $project->save();

        // Optionally, you can return a response to the AJAX request
        return response()->json(['message' => 'Surveyed Saved Successfully']);
    }
    public function getSurveyedDetails($id){
        $records = Surveyed::select('id','setup', 'project_id', 'status', 'area', 'village_name', 'region', 'appro_h_f', 'appro_residents', 'expected_cost', 'remark', 'created_at','image')->findOrFail($id);
        $datetimeString = $records->created_at;
        $date = date("Y-m-d", strtotime($datetimeString));
        $customize_cost = number_format($records->expected_cost, 2);
        $records->expected_cost = $customize_cost;
        $records->created_at =  $date; 
    
        return response()->json(['records'=>$records]);
    }
    public function editSurveyed($id){
        $record = Surveyed::findOrFail($id);
        return view('admin.surveyed.edit',compact('record'));
    }
    public function updateSurveyed(Request $request, $id){
        // dd($request->all());
        $validatedData = $request->validate([
            'setup' => 'required',
            // 'project_id' => 'required|numeric', // Example validation rule for project_id
            'status' => 'required', // Add validation rules for other fields here
            'area' => 'required',
            'village_name' => 'required',
            'appro_h_f' => 'required|numeric',
            'appro_residents' => 'required|numeric',
            'images.*' => 'nullable|image',
            'expected_cost' => 'required|numeric',
            ]);
        // Find the existing surveyed record by ID
        $project = Surveyed::findOrFail($id);

        // Update the project instance with the request data
        $project->setup = $request->input('setup');
        $project->status = $request->input('status');
        $project->area = $request->input('area');
        $project->village_name = $request->input('village_name');
        $project->region = $request->input('region');
        $project->appro_h_f = $request->input('appro_h_f');
        $project->appro_residents = $request->input('appro_residents');
        $project->expected_cost = $request->input('expected_cost');
        $project->remark = $request->input('remark');
       
         // Handle image updates
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name
                $imagePath = '/images/' . $imageName;
                // Save the image to the public/images directory
                $image->move(public_path('images'), $imageName);
                
                $images[] = $imagePath;
            }
            
            // Merge existing images with new images
            $existingImages = json_decode($project->image, true) ?? [];
            $updatedImages = array_merge($existingImages, $images);
            // Convert images array to JSON and update the image column
            $project->image = json_encode($updatedImages);
        }
            $project->save();
        // Add a success message to the session
        $request->session()->flash('success', 'Serveyed Updated Successfully.');

        return redirect('admin/surveyed');
    }
    public function delete($id)
    {
        $surveyed = Surveyed::findOrFail($id);
        $surveyed->delete();

        // Optionally, you can return a response or redirect back
        return redirect()->back()->with('success', 'Record Deleted Successfully.');
    }
    public function Imagedelete(Request $request, $id){
        $surveyed = Surveyed::findOrFail($id);
        $images = json_decode($surveyed->image);
        $imageUrlsArray = (array) $images;
        // dd($images);
        $key = array_search($request->image, $imageUrlsArray);
        // If the image URL is found, remove it from the array
        if ($key !== false) {
            unset($imageUrlsArray[$key]);
        }
        $surveyed->image = $imageUrlsArray;
        $surveyed->save();
        return redirect()->back()->with('success', 'Image Deleted Successfully.');
    }
}
