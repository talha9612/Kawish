@extends('layouts.donor.app')
@section('top')
<link rel="stylesheet" href="{{asset('adminTheme/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('content')
@if(session('success'))
    <div  id="session-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title float-left">All Project</strong>
                    {{-- <button type="button" class="btn btn-primary float-right color-white" data-toggle="modal" data-target="#mediumModal">
                        Add Project
                    </button> --}}
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>SetUp Name</th>
                                <th>Project</th>
                                <th>Status</th>
                                <th>Expected Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->setup}}</td>
                                <td>{{$data->project_id}}</td>
                                <td>{{$data->status}}</td>
                                <td>RS {{$data->expected_cost}}/-</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">
                                        <form method="POST" action="{{ url('/donor/details/' . $data->id) }}">
                                            @csrf
                                            <!-- Add input fields for the data to be updated -->
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </form>
                                        {{-- <form method="POST" action="{{ route('project.edit', $data->id) }}">
                                            @csrf
                                            <!-- Add input fields for the data to be updated -->
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </form>
                                        <form class="deleteForm" method="POST" action="{{ route('project.delete', $data->id) }}">
                                            @csrf
                                            <button class="btn btn-danger deleteButton" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
@endsection
@section('bot')

<script src="{{asset('adminTheme/assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('adminTheme/assets/js/init/datatables-init.js')}}"></script>
<script>
    // JavaScript code to hide the session message after 5 seconds
    setTimeout(function() {
        $('#session-message').fadeOut('slow');
    }, 3000); // 5000 milliseconds = 5 seconds
</script>

@endsection