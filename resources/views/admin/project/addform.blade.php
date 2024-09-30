<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="mediumModalLabel">Add New Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="setup" class=" form-control-label">Name Setup</label>
                            <input type="text" id="setup" placeholder="Enter Setup name" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="select" class=" form-control-label">Project</label>
                            <select name="select" id="select_project" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="requested_by" class=" form-control-label">Requested By</label>
                            <input type="text" id="requested_by" placeholder="Requested By" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="requested_for" class=" form-control-label">Requested For</label>
                            <input type="text" id="requested_for" placeholder="Requested For" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="plaque_id" class=" form-control-label">Plaque ID</label>
                            <input type="number" id="plaque_id" placeholder="Plaque ID" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="area" class=" form-control-label">Area</label>
                            <input type="text" id="area" placeholder="Enter Area" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="village_name" class=" form-control-label">Village Name</label>
                            <input type="text" id="village_name" placeholder="Enter Village name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="appro_h_f" class=" form-control-label">Approximate Households/Families</label>
                            <input type="number" id="appro_h_f" placeholder="Enter your Approximate Households/Families" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="appro_residents" class=" form-control-label">Approximate Residents</label>
                            <input type="number" id="appro_residents" placeholder="Approximate Residents" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tentative_start_date" class=" form-control-label">Tentative Start Date</label>
                            <input type="date" id="tentative_start_date" placeholder="Tentative Start Date" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="actual_start_date" class=" form-control-label">Actual Start Date</label>
                            <input type="date" id="actual_start_date" placeholder="Actual Start Date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tentative_completion_date" class=" form-control-label">Tentative Completion Date</label>
                            <input type="date" id="tentative_completion_date" placeholder="Tentative Start Date" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="actual_completion_date" class=" form-control-label">Actual Completion Date</label>
                            <input type="date" id="actual_completion_date" placeholder="Actual Start Date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="select" class=" form-control-label">Select Project Status</label>
                            <select id="status" class="form-control">
                                <option value="In Process">In Process</option>
                                <option value="Completed">Completed</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="expected_cost" class=" form-control-label">Expected Cost (PKR)</label>
                            <input type="number" id="expected_cost" placeholder="Expected Cost (PKR)" class="form-control">
                        </div>
                    </div>      
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="actual_cost" class=" form-control-label">Actual Cost (PKR)</label>
                            <input type="number" id="actual_cost" placeholder="Actual Cost (PKR)" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="depth" class=" form-control-label">Depth (ft.)</label>
                            <input type="number" id="depth" placeholder="Depth (ft.)" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="snap_surveyed" class=" form-control-label">Snaps Uploading at Surveyed Phase</label>
                            <input type="text" id="snap_surveyed" placeholder="Snaps Uploading at Surveyed Phase" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="snap_working" class=" form-control-label">Snaps Uploading at Working Progress And at Completion</label>
                            <input type="text" id="snap_working" placeholder="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="current_working" class=" form-control-label">Current Working Condition after Completion with Snaps Uploading</label>
                            <input type="text" id="current_working" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="custodian_name" class=" form-control-label">Custodian Name</label>
                            <input type="text" id="custodian_name" placeholder="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="custodian_phone" class=" form-control-label">Custodian Phone</label>
                            <input type="phone" id="custodian_phone" placeholder="" class="form-control">
                        </div>
                    </div>
                   
                </div>
                <div class="form-group">
                    <label for="comments" class=" form-control-label">Remarks/ Comments</label>
                    <textarea id="comments" class="form-control" rows="5"></textarea>
                </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="confirmButton" class="btn btn-primary" data-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
</div>
</div>