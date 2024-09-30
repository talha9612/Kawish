@extends('layouts.admin.app')
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
                    <strong class="card-title float-left">Add Project</strong>
                    
                </div>
                <div class="card-body">
                   <form method="post" action="{{route('project.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="setup" class="form-control-label">Setup</label>
                                    <input type="hidden" id="id" name="id" value="{{$survey->id}}">
                                    <input type="text" id="setup" name="setup" value="{{$survey->setup}}" placeholder="Enter Setup name" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="select_status" class="form-control-label">Surveyed Status</label>
                                    <select name="select_status" id="select_status" class="form-control" readonly>
                                        <option value="2" selected>Surveyed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="area" class="form-control-label">Area</label>
                                    <input type="text" id="area" name="area" value="{{$survey->area}}" placeholder="Enter Area" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="village_name" class="form-control-label">Village Name</label>
                                    <input type="text" id="village_name" name="village_name" value="{{$survey->village_name}}" placeholder="Enter Village name" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="region" class="form-control-label">Region</label>
                                    <input type="text" id="region" name="region" value="{{$survey->region}}" placeholder="Enter Region" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="appro_h_f" class="form-control-label">Approximate Households/Families</label>
                                        <input type="number" id="appro_h_f" name="appro_h_f" value="{{$survey->appro_h_f}}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expected_cost" class="form-control-label">Expected Cost (PKR)</label>
                                    <input type="number" id="expected_cost" name="expected_cost" value="{{$survey->expected_cost}}" placeholder="Expected Cost (PKR)" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="appro_residents" class="form-control-label">Approximate Residents</label>
                                    <input type="number" id="appro_residents" name="appro_residents" value="{{$survey->appro_residents}}" placeholder="Approximate Residents" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                            {{-- Project Fields --}}
                            <hr>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="select" class=" form-control-label">Project</label>
                                        <input type="text" id="project_id" name="project_id" class="form-control" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="requested_by" class=" form-control-label">Requested By</label>
                                        <input type="text" id="requested_by" name="requested_by" placeholder="Requested By" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="requested_for" class=" form-control-label">Requested For</label>
                                        <input type="text" id="requested_for" name="requested_for" placeholder="Requested For" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="requested_by" class=" form-control-label">Donor Name</label>
                                        <select name="donor_id" id="donor_id" class="form-control">
                                            @foreach($donors as $donor)
                                                <option value="{{$donor->id}}">{{$donor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="plaque_id" class=" form-control-label">Plaque ID</label>
                                        <input type="number" id="plaque_id" name="plaque_id" placeholder="Plaque ID" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="select" class=" form-control-label">Select Project Status</label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="In Process">In Process</option>
                                            <option value="Completed">Completed</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tentative_start_date" class=" form-control-label">Tentative Start Date</label>
                                        <input type="date" id="tentative_start_date" name="tentative_start_date" placeholder="Tentative Start Date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="actual_start_date" class=" form-control-label">Actual Start Date</label>
                                        <input type="checkbox" id="toggleDivCheckbox">
                                        <div id="toggleDiv" style="display: none;">
                                            <input type="date" id="actual_start_date" name="actual_start_date" placeholder="Actual Start Date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tentative_completion_date" class=" form-control-label">Tentative Completion Date</label>
                                        <input type="date" id="tentative_completion_date" name="tentative_completion_date" placeholder="Tentative Start Date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="actual_completion_date" class=" form-control-label">Actual Completion Date</label>
                                        <input type="checkbox" id="toggleDivCheckbox2">
                                        <div id="toggleDiv2" style="display: none;">
                                            <input type="date" id="actual_completion_date" name="actual_completion_date" placeholder="Actual Start Date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="actual_cost" class=" form-control-label">Actual Cost (PKR)</label>
                                        <input type="number" id="actual_cost" name="actual_cost" placeholder="Actual Cost (PKR)" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="depth" class=" form-control-label">Depth (ft.)</label>
                                        <input type="text" id="depth" name="depth" value="--" placeholder="Depth (ft.)" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="current_working" class=" form-control-label">Current Working Condition after Completion with Snaps Uploading</label>
                                        <input type="file" id="current_working" name="current_working[]" class="form-control" multiple>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="custodian_name" class=" form-control-label">Custodian Name</label>
                                        <input type="text" id="custodian_name" name="custodian_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="snap_working" class=" form-control-label">Snaps Uploading at Working Progress And at Completion</label>
                                        <input type="file" id="snap_working" name="snap_working[]" class="form-control" multiple>
                                    </div>
                                </div>
                               
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="custodian_phone" class=" form-control-label">Custodian Phone</label>
                                        <input type="phone" id="custodian_phone" name="custodian_phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="surveyed_images" value="{{$survey->image}}"/>
                            <div class="form-group">
                                <label for="comments" class=" form-control-label">Remarks/ Comments</label>
                                <textarea id="comments" name="comments" class="form-control" rows="5">{{$survey->remark}}</textarea>
                            </div>
                         
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                   </form>
                    
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
$(document).ready(function() {
    $('#toggleDivCheckbox').change(function() {
        if ($(this).is(':checked')) {
            $('#toggleDiv').show();
        } else {
            $('#toggleDiv').hide();
        }
    });
});
    $(document).ready(function() {
        $('#toggleDivCheckbox2').change(function() {
            if ($(this).is(':checked')) {
                $('#toggleDiv2').show();
            } else {
                $('#toggleDiv2').hide();
            }
        });
    });
    var originalString1 = $('#region').val();
    var originalString2 = $('#area').val();
    var originalString3 = $('#village_name').val();
    var originalString4 = $('#setup').val();

    var wordsArray1 = originalString1.split(" ");
    var wordsArray2 = originalString2.split(" ");
    var wordsArray3 = originalString3.split(" ");
    var wordsArray4 = originalString4.split(" ");

   
    var firstLetters1 = wordsArray1.map(function(word) {
        return word.charAt(0);
    }).join("");
    var firstLetters2 = wordsArray2.map(function(word) {
        return word.charAt(0);
    }).join("");
    var firstLetters3 = wordsArray3.map(function(word) {
        return word.charAt(0);
    }).join("");
    var firstLetters4 = wordsArray4.map(function(word) {
        return word.charAt(0);
    }).join("");
    
    var concatenatedLetters = firstLetters1 + "-" + firstLetters2 + "-" + firstLetters3 + "-" + firstLetters4 + "-" ;
    document.getElementById("project_id").value = concatenatedLetters;
</script>

@endsection