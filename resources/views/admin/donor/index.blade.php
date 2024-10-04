@extends('layouts.admin.app')

@section('top')
<link rel="stylesheet" href="{{ asset('adminTheme/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('content')
@if(session('success'))
    <div id="session-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title float-left">All Donors / Users</strong>
                    <button type="button" class="btn btn-primary float-right color-white" data-toggle="modal" data-target="#mediumModal">
                        Add Donor 
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Type</th>
                                    <th>Name</th>
                                    <th>Father/Husband Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($donors as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>Donor</td>
                                    <td>{{ $data->title }} {{ $data->name }}</td>
                                    <td>{{ $data->f_h_name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->city }}</td>
                                    <td>{{ $data->country }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action Buttons">
                                            <form method="get" action="{{ route('donors.edit', $data->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            <form class="deleteForm" method="post" action="{{ route('donors.destroy', $data->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger deleteButton" type="button">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($users as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>User</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->f_h_name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->city }}</td>
                                    <td>{{ $data->country }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action Buttons">
                                            <form method="get" action="{{ route('users.edit', $data->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            <form class="deleteForm" method="post" action="{{ route('users.destroy', $data->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger deleteButton" type="button">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
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
    </div>
</div>
<!-- .animated -->

@include('admin.donor.addform')
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
            var selectUserType = $('#select_user_type').val();
            var selectUser = $('#select_user').val();
            var name = $('#name').val();
            var fatherHusbandName = $('#f_h_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var city = $('#city').val();
            var country = $('#country').val();
            var password = $('#password').val();
            // Send AJAX request
            $.ajax({
                url: '{{ route("donors.store") }}',
                type: 'POST',
                data: {
                    selectUserType: selectUserType,
                    selectUser: selectUser,
                    name: name,
                    fatherHusbandName: fatherHusbandName,
                    email: email,
                    phone: phone,
                    city: city,
                    country: country,
                    password: password,
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
  
 
    $(document).on('click','.accept', function(e){
        $("#recordModal").modal("hide");
        $(".modal-backdrop").remove();
    });
</script>
@endsection