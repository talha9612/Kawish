@extends('layouts.donor.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Project Details</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Setup</th>
                                <td>{{$records->setup}}</td>
                            </tr>
                            <tr>
                                <th>Project ID</th>
                                <td>{{$records->project_id}}</td>
                            </tr>
                            <tr>
                                <th>Project Status</th>
                                <td>{{$records->status}}</td>
                            </tr>
                            <tr>
                                <th>Requested By</th>
                                <td>{{$records->requested_by}}</td>
                            </tr>
                            <tr>
                                <th>Requested For</th>
                                <td>{{$records->requested_for}}</td>
                            </tr>
                            <tr>
                                <th>Donor Name</th>
                                <td>{{$records->donor->name}}</td>
                            </tr>
                            <tr>
                                <th>Plaque id</th>
                                <td>{{$records->plaque_id}}</td>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <td>{{$records->area}}</td>
                            </tr>
                            <tr>
                                <th>Village Name</th>
                                <td>{{$records->village_name}}</td>
                            </tr>
                            <tr>
                                <th>Region</th>
                                <td>{{$records->region}}</td>
                            </tr>
                            <tr>
                                <th>Approximate Households/Families</th>
                                <td>{{$records->appro_h_f}}</td>
                            </tr>
                            <tr>
                                <th>Approximate Residents</th>
                                <td>{{$records->appro_residents}}</td>
                            </tr>
                            <tr>
                                <th>Tentative Start Date</th>
                                <td>{{$records->tentative_start_date}}</td>
                            </tr>
                            <tr>
                                <th>Tentative Completion Date</th>
                                <td>{{$records->tentative_completion_date}}</td>
                            </tr>
                            <tr>
                                <th>Actual Start Date</th>
                                <td>{{$records->actual_start_date}}</td>
                            </tr>
                            <tr>
                                <th>Actual Completion Date</th>
                                <td>{{$records->actual_completion_date}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$records->status}}</td>
                            </tr>
                            <tr>
                                <th>Expected Cost</th>
                                <td>{{number_format($records->expected_cost, 2)}}</td>
                            </tr>
                            <tr>
                                <th>Actual Cost</th>
                                <td>{{number_format($records->actual_cost, 2)}}</td>
                            </tr>
                            <tr>
                                <th>Depth (ft.)</th>
                                <td>{{$records->depth}}</td>
                            </tr>
                            <tr>
                                <th>Custodian Name</th>
                                <td>{{$records->custodian_name}}</td>
                            </tr>
                            <tr>
                                <th>Custodian Phone</th>
                                <td>{{$records->custodian_phone}}</td>
                            </tr>
                            <tr>
                                <th>Snap Upload at working progress and at completion</th>
                                <td>
                                    <div id="image-preview">
                                        @foreach (json_decode($records->snap_surveyed) as $key=>$item)
                                            <div class="image-item">
                                                <a target="_blank" href="{{url($item)}}">
                                                    <img src="{{ asset($item) }}" class="img-fluid" width="150">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Snaps Upload at working progress and at completion</th>
                                <td>
                                    @if (!empty($records->snap_working)) 
                                    <div id="image-preview">
                                        @foreach (json_decode($records->snap_working) as $key=>$item)
                                            <div class="image-item">
                                                <a target="_blank" href="{{url($item)}}">
                                                    <img src="{{ asset($item) }}" class="img-fluid" width="150">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <th>Current Working Condition after completion with snaps</th>
                                <td>
                                    @if (!empty($records->current_working))
                                    <div id="image-preview">
                                        @foreach (json_decode($records->current_working) as $key=>$item)
                                            <div class="image-item">
                                                <a target="_blank" href="{{url($item)}}">
                                                    <img src="{{ asset($item) }}" class="img-fluid" width="150">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Comments</th>
                                <td>{{$records->comments}}</td>
                            </tr>
                            <!-- Add more rows for other fields as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection