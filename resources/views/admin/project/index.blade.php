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
                    <strong class="card-title float-left">All Project</strong>
                    <button type="button" class="btn btn-primary float-right color-white" data-toggle="modal" data-target="#mediumModal">
                        Add Project
                    </button>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>SetUp Name</th>
                                <th>Project</th>
                                <th>Region</th>
                                <th>Donor Name</th>
                                <th>Status</th>
                                <th>Expected Cost</th>
                                <th>Actual Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $data)
                            <tr>
                                {{-- <td>{{$data->id}}</td> --}}
                                <td>{{$data->setup}}</td>
                                <td>{{$data->project_id}}</td>
                                <td>{{$data->region}}</td>
                                <td>{{$data->donor->name}}</td>
                                <td>{{$data->status}}</td>
                                <td>RS {{$data->expected_cost}}/-</td>
                                <td>RS {{$data->actual_cost}}/-</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">
                                        <form method="POST" action="{{ route('project.view', $data->id) }}">
                                            @csrf
                                            <!-- Add input fields for the data to be updated -->
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </form>
                                        <form method="POST" action="{{ route('project.edit', $data->id) }}">
                                            @csrf
                                            <!-- Add input fields for the data to be updated -->
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </form>
                                        <form class="deleteForm" method="POST" action="{{ route('project.delete', $data->id) }}">
                                            @csrf
                                            <button class="btn btn-danger deleteButton" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </form>
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
<div class="modal fade close" style="opacity: 5; font-size:1rem;font-weight: 300;" id="recordModal" tabindex="-1" role="dialog" aria-labelledby="recordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recordModalLabel">Project Details</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <!-- Display record details here -->
                <div id="recordDetails"></div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="confirmButton" class="btn btn-primary">Confirm</button>
            </div> --}}
        </div>
    </div>
</div>
{{-- @include('admin.project.addform') --}}
@include('admin.surveyed.showdetailmodel')
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
    document.querySelectorAll('.deleteButton').forEach(button => {
        button.addEventListener('click', function() {
            // Get the parent form of the clicked button
            const form = this.closest('.deleteForm');

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the corresponding form
                    form.submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // If cancelled, show a message (optional)
                    Swal.fire(
                        'Cancelled',
                        'Your project is safe :)',
                        'error'
                    );
                }
            });
        });
    });
</script>
<script>
    // JavaScript code to hide the session message after 5 seconds
    setTimeout(function() {
        $('#session-message').fadeOut('slow');
    }, 3000); // 5000 milliseconds = 5 seconds
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#confirmButton').click(function() {
            // Collect form data
            var setup = $('#setup').val();
            var projectId = $('#select_project').val();
            var requestedBy = $('#requested_by').val();
            var requestedFor = $('#requested_for').val();
            var donorId = $('#donor_id').val();
            var plaqueId = $('#plaque_id').val();
            var area = $('#area').val();
            var villageName = $('#village_name').val();
            var approHF = $('#appro_h_f').val();
            var approResidents = $('#appro_residents').val();
            var tentativeStartDate = $('#tentative_start_date').val();
            var actualStartDate = $('#actual_start_date').val();
            var tentativeCompletionDate = $('#tentative_completion_date').val();
            var actualCompletionDate = $('#actual_completion_date').val();
            var status = $('#status').val();
            var expectedCost = $('#expected_cost').val();
            var actualCost = $('#actual_cost').val();
            var depth = $('#depth').val();
            var snapSurveyed = $('#snap_surveyed').val();
            var snapWorking = $('#snap_working').val();
            var currentWorking = $('#current_working').val();
            var custodianName = $('#custodian_name').val();
            var custodianPhone = $('#custodian_phone').val();
            var comments = $('#comments').val();

            // Send AJAX request
            $.ajax({
                url: '{{ route("project.store") }}',
                type: 'POST',
                data: {
                    setup: setup,
                    project_id: projectId,
                    requested_by: requestedBy,
                    requested_for: requestedFor,
                    donor_id: donorId,
                    plaque_id: plaqueId,
                    area: area,
                    village_name: villageName,
                    appro_h_f: approHF,
                    appro_residents: approResidents,
                    tentative_start_date: tentativeStartDate,
                    actual_start_date: actualStartDate,
                    tentative_completion_date: tentativeCompletionDate,
                    actual_completion_date: actualCompletionDate,
                    status: status,
                    expected_cost: expectedCost,
                    actual_cost: actualCost,
                    depth: depth,
                    snap_surveyed: snapSurveyed,
                    snap_working: snapWorking,
                    current_working: currentWorking,
                    custodian_name: custodianName,
                    custodian_phone: custodianPhone,
                    comments: comments,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Display success message
                    alert(response.message);
                    // Reload the page or perform any other action
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Display error message
                    alert('An error occurred while saving the data.');
                    console.error(xhr.responseText);
                }
            });
        });
    });
  
    $(document).ready(function() {
        $('.view-record').click(function(e) {
            e.preventDefault();
            var recordId = $(this).data('record-id');
            $.ajax({
                url: '/get-project-details/' + recordId, // Replace with your route
                type: 'GET',
                success: function(response) {
                    // Clear previous data
                    $('#recordDetails').empty();
                    // Define a mapping object for default header names
                    var defaultHeaderNames = {
                        setup: 'Setup Name',
                        project_id: 'Project',
                        requested_by: 'Requested By',
                        requested_for: 'Requested For',
                        donor_id: 'Donor',
                        plaque_id: 'Plaque ID',
                        area: 'Area',
                        village_name: 'Village Name',
                        appro_h_f: 'Approximate Households/ Families',
                        appro_residents: 'approximate Residents',
                        tentative_start_date: 'Tesntative Start Date',
                        actual_start_date: 'Actual Start Date',
                        tentative_completion_date: 'Tentative Completion Date',
                        actual_completion_date: 'Actual Completion Date',
                        status: 'Status',
                        expected_cost: 'Expected Cost (PKR)',
                        actual_cost: 'Actual Cost (PKR)',
                        depth: 'Depth (ft.)',
                        snap_surveyed: 'Snaps Uploading At Surveyed Phase',
                        snap_working: 'Snaps Uploading at Working progress and at Completion',
                        current_working: 'Current Working Condition After completion With Snaps Uploading',
                        custodian_name: 'Custodian Name',
                        custodian_phone: 'Custodian Phone',
                        comments: 'Remarks/ comments',
                        created_at: 'Created Date',
                        // Add more key-value pairs as needed
                    };
                    // Iterate over response data and generate HTML for table
                    var tableHTML = '<table class="table">';
                    $.each(response.records, function(key, value) {
                        
                        if(key == "created_at"){
                            var defaultHeaderName = defaultHeaderNames[key] || 'Default Header Name';
                            // Convert to Date object
                            var dateObject = new Date(value);
                            // Get the date in YYYY-MM-DD format
                            var date = dateObject.toLocaleDateString('en-GB', { year: 'numeric', month: '2-digit', day: '2-digit' });
                            tableHTML += '<tr>';
                            tableHTML += '<th>'+ defaultHeaderName +'</th>';
                            tableHTML += '<td>' + date + '</td>';
                            tableHTML += '</tr>';
                        } else if (key == "donor_id") {
                            tableHTML += '<tr>';
                            tableHTML += '<th>Donor</th>';
                            tableHTML += '<td>' + response.records.donor.name + '</td>'; // Assuming 'name' is a donor attribute
                            tableHTML += '</tr>';
                            // Add more donor details as needed
                        } else {
                            var defaultHeaderName = defaultHeaderNames[key] || 'Default Header Name';
                            tableHTML += '<tr>';
                            tableHTML += '<th>' + defaultHeaderName + '</th>';
                            tableHTML += '<td>' + value + '</td>';
                            tableHTML += '</tr>';
                        }
                    });
                    tableHTML += '</table>';
                    // Append table HTML to modal body
                    $('#recordDetails').append(tableHTML);
                    // Show the modal
                    $('#recordModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    $(document).on('click','.accept', function(e){
        $("#recordModal").modal("hide");
        $(".modal-backdrop").remove();
    });
</script>
@endsection