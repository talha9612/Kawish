@extends('layouts.admin.app')
@section('top')
<link rel="stylesheet" href="{{asset('adminTheme/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title float-left">Edit Donor</strong>
                   
                </div>
                <form method="POST" action="{{route('donors.update', $donor->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="card-body"> 
                        <div class="form-group">
                            <label for="setup" class=" form-control-label">Select User</label>
                            <select name="select_user" id="select_user" class="form-control">
                                <option value="Mr" {{ $donor->title == 'Mr' ? 'selected' : '' }}>Mr</option>
                                <option value="Ms" {{ $donor->title == 'Ms' ? 'selected' : '' }}>Ms</option>
                                <option value="Mrs" {{ $donor->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="area" class=" form-control-label">Name</label>
                            <input type="text" name="name" id="name" value="{{$donor->name}}" placeholder="Enter Area" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="f_h_name" class=" form-control-label">Father/Husband Name</label>
                            <input type="text" name="f_h_name" id="f_h_name" value="{{$donor->f_h_name}}" placeholder="Father/Husband Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class=" form-control-label">Email</label>
                            <input type="email" name="email" id="email" value="{{$donor->email}}" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone" class=" form-control-label">Phone No</label>
                            <input type="phone" name="phone" id="phone" value="{{$donor->phone}}" placeholder="Phone No" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="city" class=" form-control-label">City</label>
                            <input type="text" name="city" id="city" value="{{$donor->city}}" placeholder="City" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="country" class=" form-control-label">Country</label>
                            <input type="text" name="country" id="country" value="{{$donor->country}}" placeholder="Country" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection