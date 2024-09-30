@extends('layouts.admin.app')
@section('top')
<link rel="stylesheet" href="{{asset('adminTheme/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title float-left">Edit Project</strong>
                    
                </div>
                <form method="POST" action="{{ route('project.update', $record->id) }}" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="setup" class=" form-control-label">Name Setup</label>
                                    <input type="text" id="setup" name="setup" value="{{$record->setup}}" placeholder="Enter Setup name" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select" class=" form-control-label">Project</label>
                                    <input type="text" id="project_id" name="project_id" value="{{$record->project_id}}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="area" class=" form-control-label">Area</label>
                                    <input type="text" id="area" name="area" value="{{$record->area}}" placeholder="Enter Area" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="village_name" class=" form-control-label">Village Name</label>
                                    <input type="text" id="village_name" name="village_name" value="{{$record->village_name}}" placeholder="Enter Village name" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="region" class="form-control-label">Region</label>
                                    <input type="text" id="region" name="region" value="{{$record->region}}" placeholder="Enter Region" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="requested_by" class=" form-control-label">Requested By</label>
                                    <input type="text" id="requested_by" name="requested_by" value="{{$record->requested_by}}" placeholder="Requested By" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="requested_for" class=" form-control-label">Requested For</label>
                                    <input type="text" id="requested_for" name="requested_for" value="{{$record->requested_for}}" placeholder="Requested For" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="requested_by" class=" form-control-label">Donor Name</label>
                                    <select name="donor_id" id="donor_id" class="form-control">
                                        @foreach($donors as $donor)
                                            <option value="{{$donor->id}}" {{ $record->project_id == $donor->id ? 'selected' : '' }}>{{$donor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                      
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="plaque_id" class=" form-control-label">Plaque ID</label>
                                    <input type="number" id="plaque_id" name="plaque_id" value="{{$record->plaque_id}}" placeholder="Plaque ID" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="appro_h_f" class=" form-control-label">Approximate Households/Families</label>
                                    <input type="number" id="appro_h_f" name="appro_h_f" value="{{$record->appro_h_f}}" placeholder="Enter your Approximate Households/Families" class="form-control">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row form-group">
                           
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="appro_residents" class=" form-control-label">Approximate Residents</label>
                                    <input type="number" id="appro_residents" name="appro_residents" value="{{$record->appro_residents}}" placeholder="Approximate Residents" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tentative_start_date" class=" form-control-label">Tentative Start Date</label>
                                    <input type="date" id="tentative_start_date" name="tentative_start_date" value="{{$record->tentative_start_date}}" placeholder="Tentative Start Date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tentative_completion_date" class=" form-control-label">Tentative Completion Date</label>
                                    <input type="date" id="tentative_completion_date" name="tentative_completion_date" value="{{$record->tentative_completion_date}}" placeholder="Tentative Start Date" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="actual_start_date" class=" form-control-label">Actual Start Date</label>
                                    <input type="date" id="actual_start_date" name="actual_start_date" value="{{$record->actual_start_date}}" placeholder="Actual Start Date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select" class=" form-control-label">Select Project Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="In Process" {{ $record->status == 'In Process' ? 'selected' : '' }}>In Process</option>
                                        <option value="Completed" {{ $record->status == 'Completed' ? 'selected' : '' }}>Completed</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="actual_completion_date" class=" form-control-label">Actual Completion Date</label>
                                    <input type="date" id="actual_completion_date" name="actual_completion_date" value="{{$record->actual_completion_date}}" placeholder="Actual Start Date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="expected_cost" class=" form-control-label">Expected Cost (PKR)</label>
                                    <input type="number" id="expected_cost" name="expected_cost" value="{{$record->expected_cost}}" placeholder="Expected Cost (PKR)" class="form-control">
                                </div>
                            </div>      
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="actual_cost" class=" form-control-label">Actual Cost (PKR)</label>
                                    <input type="number" id="actual_cost" name="actual_cost" value="{{$record->actual_cost}}" placeholder="Actual Cost (PKR)" class="form-control">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="depth" class=" form-control-label">Depth (ft.)</label>
                                    <input type="text" id="depth" name="depth" value="{{$record->depth}}" placeholder="Depth (ft.)" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="expected_cost" class="form-control-label">Snap Upload at working progress and at completion</label>
                                    <div id="image-preview">
                                        <!-- Display current images here -->
                                        @foreach (json_decode($record->snap_surveyed) as $key=>$item)
                                            <div class="image-item">
                                                <img src="{{ asset($item) }}" class="img-fluid" width="150">
                                                <button class="remove-surveyed-image-btn" type="button" data-id="{{$record->id}}" data-image="{{ $item }}">×</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="file" name="surveyed_images[]" id="surveyed_images" class="form-control" multiple>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_working" class=" form-control-label">Current Working Condition after Completion with Snaps Uploading</label>
                                    @if (!empty($record->current_working)) 
                                    <div id="image-preview">
                                        <!-- Display current images here -->
                                        @foreach (json_decode($record->current_working) as $key=>$item)
                                            <div class="image-item">
                                                <img src="{{ asset($item) }}" class="img-fluid" width="150">
                                                <button class="remove-current-working-image-btn" type="button" data-id="{{$record->id}}" data-image="{{ $item }}">×</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    <input type="file" name="current_working[]" id="current_working" class="form-control" multiple>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="snap_working" class=" form-control-label">Snaps Uploading at Working Progress And at Completion</label>
                                    @if (!empty($record->snap_working)) 
                                    <div id="image-preview">
                                        <!-- Display current images here -->
                                        @foreach (json_decode($record->snap_working) as $key=>$item)
                                            <div class="image-item">
                                                <img src="{{ asset($item) }}" class="img-fluid" width="150">
                                                <button class="remove-snap-working-image-btn" type="button" data-id="{{$record->id}}" data-image="{{ $item }}">×</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    <input type="file" name="snap_working[]" id="snap_working" class="form-control" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="custodian_phone" class=" form-control-label">Custodian Phone</label>
                                    <input type="phone" id="custodian_phone" name="custodian_phone" value="{{$record->custodian_phone}}" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="custodian_name" class=" form-control-label">Custodian Name</label>
                                    <input type="text" id="custodian_name" name="custodian_name" value="{{$record->custodian_name}}" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comments" class=" form-control-label">Remarks/ Comments</label>
                            <textarea id="comments" class="form-control" name="comments" rows="5">{{$record->comments}}</textarea>
                        </div>
                        <button type="submit"  class="btn btn-primary" >Update</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@endsection
@section('bot')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
$(document).on('click', '.remove-surveyed-image-btn', function() {
    var imageUrl = $(this).data('image');
    var imageId = $(this).data('id');
    // var surveyedId = $('#surveyed_id').val();
    ;
    $(this).closest('.image-item').remove();
    $.ajax({
        url: '/project-surveyed-image/delete/' + imageId,
        type: 'POST',
        data: {
            image: imageUrl
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Remove the image preview from the UI
            $(this).closest('.image-item').remove();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error if needed
        }
    });
});
$(document).on('click', '.remove-current-working-image-btn', function() {
    var imageUrl = $(this).data('image');
    var imageId = $(this).data('id');
    // var surveyedId = $('#surveyed_id').val();
    ;
    $(this).closest('.image-item').remove();
    $.ajax({
        url: '/project-current-working-image/delete/' + imageId,
        type: 'POST',
        data: {
            image: imageUrl
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Remove the image preview from the UI
            $(this).closest('.image-item').remove();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error if needed
        }
    });
});
$(document).on('click', '.remove-snap-working-image-btn', function() {
    var imageUrl = $(this).data('image');
    var imageId = $(this).data('id');
    // var surveyedId = $('#surveyed_id').val();
    ;
    $(this).closest('.image-item').remove();
    $.ajax({
        url: '/project-snap-working-image/delete/' + imageId,
        type: 'POST',
        data: {
            image: imageUrl
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Remove the image preview from the UI
            $(this).closest('.image-item').remove();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error if needed
        }
    });
});
</script>
@endsection