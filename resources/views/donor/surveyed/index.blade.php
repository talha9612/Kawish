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
                    <strong class="card-title float-left">All Surveyed</strong>
                   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>SetUp Name</th>
                                    <th>Area</th>
                                    <th>Village Name</th>
                                    <th>Region</th>
                                    <th>Approximate House Family</th>
                                    <th>approximate Residents</th>
                                    <th>Expected Cost</th>
                                    <th>Status</th>
                                    <th>Comment</th>
                                    <!--<th>Images</th>-->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surveyed as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->setup}}</td>
                                    <td>{{$data->area}}</td>
                                    <td>{{$data->village_name}}</td>
                                    <td>{{$data->region}}</td>
                                    <td>{{$data->appro_h_f}}</td>
                                    <td>{{$data->appro_residents}}</td>
                                    <td>Rs {{number_format($data->expected_cost, 2)}}/-</td>
                                    <td>{{($data->status==1)?"Surveyed":"Surveyed"}}</td>
                                    <td>{{$data->remark}}</td>
                                    <!--<td></td>-->
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action Buttons">
                                            <a href="#" class="btn btn-warning view-record" data-record-id="{{ $data->id }}" data-toggle="modal" data-target="#recordModal">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="errorContainer" style="color: red;"></div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
<div class="modal fade close" style="opacity: 5;font-size:1rem;font-weight: 300;" id="recordModal" tabindex="-1" role="dialog" aria-labelledby="recordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recordModalLabel">Surveyed Details</h5>
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
@include('admin.surveyed.surveyedform')
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
        $('.view-record').click(function(e) {
            e.preventDefault();
            var recordId = $(this).data('record-id');
            $.ajax({
                url: '/donor/get-surveyed-details/' + recordId, // Replace with your route
                type: 'GET',
                success: function(response) {
                    // Clear previous data
                    $('#recordDetails').empty();
                    // Define a mapping object for default header names
                    var defaultHeaderNames = {
                        id: 'ID',
                        setup: 'Setup Name',
                        // project_id: 'Project ID',
                        status: 'Status',
                        area: 'Area',
                        village_name: 'Village Name',
                        region: 'Region',
                        appro_h_f: 'Approximate Households/Families',
                        appro_residents: 'Approximate Residents',
                        expected_cost: 'Expected Cost (PKR)',
                        remark: 'Remarks',
                        image: 'Image',
                        created_at: 'Created Date',
                        // Add more key-value pairs as needed
                    };
                    // Get the base URL
                    var baseUrl = window.location.origin;
                    // Iterate over response data and generate HTML for table
                    var tableHTML = '<table class="table">';
                        $.each(response.records, function(key, value) {
                            if (key == "created_at") {
                                var defaultHeaderName = defaultHeaderNames[key] || 'Default Header Name';
                                // Convert to Date object
                                var dateObject = new Date(value);
                                // Get the date in YYYY-MM-DD format
                                var date = dateObject.toLocaleDateString('en-GB', { year: 'numeric', month: '2-digit', day: '2-digit' });
                                tableHTML += '<tr>';
                                tableHTML += '<th>' + defaultHeaderName + '</th>';
                                tableHTML += '<td>' + date + '</td>';
                                tableHTML += '</tr>';
                            } else if (key == "project_id") {
                                var defaultHeaderName = defaultHeaderNames[key] || 'Default Header Name';
                                var projectValue = (value == 1) ? 'KWT-KHI-WN' : 'KWT-KHI-HP';
                                tableHTML += '<tr>';
                                tableHTML += '<th>' + defaultHeaderName + '</th>';
                                tableHTML += '<td>' + projectValue + '</td>';
                                tableHTML += '</tr>';
                            }  else if (key == "status") {
                                var defaultHeaderName = defaultHeaderNames[key] || 'Default Header Name';
                                var statusValue = (value == 1) ? 'Surveyed' : 'Surveyed';
                                tableHTML += '<tr>';
                                tableHTML += '<th>' + defaultHeaderName + '</th>';
                                tableHTML += '<td>' + statusValue + '</td>';
                                tableHTML += '</tr>';
                            }  else if (key == "image") {
                                var defaultHeaderName = defaultHeaderNames[key] || 'Default Header Name';
                                var imagesHTML = '';
                                var images = JSON.parse(value);
                                $.each(images, function(index, imageUrl) {
                                    var fullImageUrl = baseUrl + imageUrl;
                                    imagesHTML += '<a target="_blank" href="'+fullImageUrl+'"><img class="img-fluid" src="' + fullImageUrl + '" width="150"/></a>';
                                });
                                tableHTML += '<tr>';
                                tableHTML += '<th>' + defaultHeaderName + '</th>';
                                tableHTML += '<td>' + imagesHTML + '</td>';
                                tableHTML += '</tr>';
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
    $(document).ready(function() {
        // Event listener for clicking on an image
        $(document).on('click', '.fullScreenImage', function() {
            var imageUrl = $(this).attr('src'); // Get the URL of the clicked image
            $('#fullScreenImage').attr('src', imageUrl); // Set the URL of the full-screen image
            $('#imageModal').modal('show'); // Show the modal
        });
    });
    $(document).on('click','.accept', function(e){
        $("#recordModal").modal("hide");
        $(".modal-backdrop").remove();
    });
</script>
@endsection