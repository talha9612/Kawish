<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donor::all();
        $users = User::all();
        return  view('admin.donor.index',compact('donors','users'));
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
        $lastEightNumbers = substr($request->input('phone'), -9);
        if($request->selectUserType == "donor"){
            $lastEightNumbers = substr($request->input('phone'), -9);
            // Create a new donor instance
            $donor = new Donor();
            $donor->title = $request->input('selectUser');
            $donor->name = $request->input('name');
            $donor->f_h_name = $request->input('fatherHusbandName');
            $donor->email = $request->input('email');
            $donor->password = Hash::make($lastEightNumbers);
            $donor->phone = $request->input('phone');
            $donor->city = $request->input('city');
            $donor->country = $request->input('country');
    
            // Save the donor record
            $donor->save();
    
            // Optionally, you can return a response or redirect the user
            return response()->json(['message' => 'Donor created successfully'], 201);
        }else{
            $lastEightNumbers = substr($request->input('phone'), -9);
            // Create a new donor instance
            $user = new User();
          
            $user->name = $request->input('name');
            $user->f_h_name = $request->input('fatherHusbandName');
            $user->email = $request->input('email');
            $user->password = Hash::make($lastEightNumbers);
            $user->phone = $request->input('phone');
            $user->city = $request->input('city');
            $user->country = $request->input('country');
    
            // Save the user record
            $user->save();
             // Optionally, you can return a response or redirect the user
             return response()->json(['message' => 'User created successfully'], 201);
        }
       
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
        $donor = Donor::findOrFail($id);
        return view('admin.donor.edit',compact('donor'));
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
        $donor = Donor::findOrFail($id);

        // Update the donor's attributes
        $donor->title = $request->input('select_user');
        $donor->name = $request->input('name');
        $donor->f_h_name = $request->input('f_h_name');
        $donor->email = $request->input('email');
        $donor->phone = $request->input('phone');
        $donor->city = $request->input('city');
        $donor->country = $request->input('country');

        // Save the changes to the database
        $donor->save();

        // Redirect back or to another page
        return redirect()->route('donors.index')->with('success', 'Donor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
         $donor = Donor::findOrFail($id);

         // Delete the donor
         $donor->delete();
 
         // Redirect back or to another page
         return redirect()->route('donors.index')->with('success', 'Donor deleted successfully.');
    }
}
