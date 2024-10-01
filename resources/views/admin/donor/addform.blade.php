<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="mediumModalLabel">Add New Donor/User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="select_user_type" class=" form-control-label">Select User Type</label>
                    <select name="select_user_type" id="select_user_type" class="form-control">
                        <option value="donor">Donor</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="setup" class=" form-control-label">Select User</label>
                    <select name="select_user" id="select_user" class="form-control">
                        <option value="Mr">Mr</option>
                        <option value="Ms">Ms</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="area" class=" form-control-label">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Area" class="form-control">
                </div>
                <div class="form-group">
                    <label for="f_h_name" class=" form-control-label">Father/Husband Name</label>
                    <input type="text" name="f_h_name" id="f_h_name" placeholder="Father/Husband Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email" class=" form-control-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone" class=" form-control-label">Phone No</label>
                    <input type="phone" name="phone" id="phone" placeholder="03000000000" class="form-control">
                </div>
                <div class="form-group">
                    <label for="city" class=" form-control-label">City</label>
                    <input type="text" name="city" id="city" placeholder="City" class="form-control">
                </div>
                <div class="form-group">
                    <label for="country" class=" form-control-label">Country</label>
                    <input type="text" name="country" id="country" placeholder="Country" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmButton" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>