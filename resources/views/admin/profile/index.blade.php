@extends('layouts.admin.app')
@section('top')
<link rel="stylesheet" href="{{asset('adminTheme/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
<style>
    .profile-table {
        max-width: 600px;
        margin: auto;
        margin-top: 50px;
    }
    .profile-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin: 20px auto;
        display: block;
    }
    .profile-heading {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
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
                <div class="card-body">
                    <div class="profile-table">
                        <h2 class="profile-heading">Profile Details</h2>
                        <img src="{{url(Auth::guard('admin')->user()->image)}}" alt="Profile Picture" class="profile-image">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$profile->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$profile->email}}</td>
                                </tr>
                                
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$profile->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$profile->address}}</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <button type="button" class="btn btn-primary float-right color-white" data-toggle="modal" data-target="#mediumModal">
                            Edit Profile
                        </button> --}}
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mediumModal" onclick="editForm(1)">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->

@include('admin.profile.editform')
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
        window.editForm = function(id) {
        
            $.ajax({
                url: '/admin/profile/' + id+ '/edit',
                type: 'GET',
                success: function(data) {
                    $('#edit_id').val(data.user.id);
                    $('#name').val(data.user.name);
                    $('#email').val(data.user.email);
                    $('#phone').val(data.user.phone);
                    $('#address').val(data.user.address);
                    $('#mediumModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching data:', error);
                }
            });
        };
        $("#edit_user_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#confirmButton").text('Updating...');
          
            var id = $('#edit_id').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: 'profile/update',
                type: 'post', 
                contentType: 'multipart/form-data',
                cache: false,
                processData: false,
                contentType: false,
                dataType : 'json',
                data: fd,
             
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                    // Hide the modal
                    $('#mediumModal').modal('hide');
                    alert('Profile updated successfully!');
                },
                error: function(xhr, status, error) {
                    console.log('Error updating data:', error);
                    alert('Failed to update profile.');
                },
                complete: function() {
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');
                    $('#address').val('');
                    $('#password').val('');
                    $('#image').val('');
                }
            });
        });
        $('#mediumModal').on('hidden.bs.modal', function () {
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
        });
    });
</script>
<script>
    // JavaScript code to hide the session message after 5 seconds
    setTimeout(function() {
        $('#session-message').fadeOut('slow');
    }, 3000); // 5000 milliseconds = 5 seconds
</script>

@endsection