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
                    <strong class="card-title float-left">Edit Surveyed</strong>
                    
                </div>
                <form method="POST" action="{{ route('surveyed.update', $record->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="modal-body">
                        <input type="hidden" name="surveyed_id" id="surveyed_id" value="{{$record->id}}" >
                        <div class="form-group">
                            <label for="setup" class=" form-control-label">Select Setup</label>
                            <select name="setup" id="setup" class="form-control">
                                <option value="New Well" {{ $record->setup == 'BaNew Well' ? ' selected' : '' }}>New Well</option>
                                <option value="Old Repair Well" {{ $record->setup == 'Old Repair Well' ? ' selected' : '' }}>Old Repair Well</option>
                                <option value="Hand Pump" {{ $record->setup == 'Hand Pump' ? ' selected' : '' }}>Hand Pump</option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="select" class=" form-control-label">Select Project Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Surveyed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="area" class="form-control-label">Area</label>
                            
                            <input type="text" id="area" name="area" value="{{$record->area}}" placeholder="Enter Area" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="village_name" class=" form-control-label">Village Name</label>
                            <input type="text" id="village_name" name="village_name" value="{{$record->village_name}}" placeholder="Enter Village name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="region" class=" form-control-label">Region</label>
                            {{-- <input type="text" id="region" placeholder="Enter Region" class="form-control"> --}}
                            <select id="region" name="region" class="form-control">
                                <option value="Balochistan" {{ $record->region == 'Balochistan' ? ' selected' : '' }}>Balochistan</option>
                                <option value="Khyber Pakhtunkhwa" {{ $record->region == 'Khyber Pakhtunkhwa' ? ' selected' : '' }}>Khyber Pakhtunkhwa</option>
                                <option value="Punjab" {{ $record->region == 'Punjab' ? ' selected' : '' }}>Punjab</option>
                                <option value="Sindh" {{ $record->region == 'Sindh' ? ' selected' : '' }}>Sindh</option>
                            </select>
                        </div>
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="appro_h_f" class=" form-control-label">Approximate Households/Families</label>
                                    <input type="number" id="appro_h_f" name="appro_h_f" value="{{$record->appro_h_f}}" placeholder="Enter your Approximate Households/Families" class="form-control">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="appro_residents" class=" form-control-label">Approximate Residents</label>
                                    <input type="number" id="appro_residents" name="appro_residents" value="{{$record->appro_residents}}" placeholder="Approximate Residents" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="expected_cost" class=" form-control-label">Expected Cost (PKR)</label>
                            <input type="number" id="expected_cost" name="expected_cost" value="{{$record->expected_cost}}" placeholder="Expected Cost (PKR)" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="expected_cost" class="form-control-label">Snap Upload at working progress and at completion</label>
                            <div id="image-preview">
                                <!-- Display current images here -->
                                @foreach (json_decode($record->image) as $key=>$item)
                                    <div class="image-item">
                                        <img src="{{ asset($item) }}" class="img-fluid" width="150">
                                        <button class="remove-image-btn" type="button" data-id="{{$record->id}}" data-image="{{ $item }}">×</button>
                                    </div>
                                @endforeach
                            </div>
                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                        </div>
                        <div class="form-group">
                            <label for="remarks" class=" form-control-label">Remarks</label>
                            <textarea id="remark" name="remark" class="form-control">{{$record->remark}}</textarea>
                        </div>
                                
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
                </form>
            
        </div>


    </div>
</div><!-- .animated -->
@endsection
@section('bot')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
$(document).on('click', '.remove-image-btn', function() {
    var imageUrl = $(this).data('image');
    var imageId = $(this).data('id');
    // var surveyedId = $('#surveyed_id').val();
    ;
    $(this).closest('.image-item').remove();
    $.ajax({
        url: '/surveyed-image/delete/' + imageId,
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