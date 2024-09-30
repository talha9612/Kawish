<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="mediumModalLabel">Edit Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="edit_user_form" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-group">
                    <label for="title" class=" form-control-label">Title</label>
                    <input type="text" name="email" id="email" class="form-control" >
                </div> --}}
                <div class="form-group">
                    <label for="name" class=" form-control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <input type="hidden" name="edit_id" id="edit_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="f_h_name" class=" form-control-label">Father name</label>
                    <input type="text" name="f_h_name" id="f_h_name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="email" class=" form-control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="phone" class=" form-control-label">Phone No</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="city" class=" form-control-label">City</label>
                    <input type="text" name="city" id="city" class="form-control">
                </div>
                <div class="form-group">
                    <label for="country" class=" form-control-label">Country</label>
                    <input type="text" name="country" id="country" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class=" form-control-label">Password (<span style="color:red;">*</span>Optional)</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="village_name" class=" form-control-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="confirmButton" class="btn btn-primary" >Confirm</button>
            </div>
        </div>
    </div>
</div>