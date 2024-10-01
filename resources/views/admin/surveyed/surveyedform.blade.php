<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="mediumModalLabel">Add New Surveyed</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="setup" class=" form-control-label">Select Setup</label>
                    <select name="setup" id="setup" class="form-control">
                        <option value="New Well">New Well</option>
                        <option value="Old Repair Well">Old Repair Well</option>
                        <option value="Hand Pump">Hand Pump</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="select" class=" form-control-label">Select Project Status</label>
                    <select name="select" id="select_status" class="form-control">
                        <option value="2">Surveyed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="area" class=" form-control-label">Area</label>
                    
                    <input type="text" id="area" placeholder="Enter Area" class="form-control">
                </div>
                <div class="form-group">
                    <label for="village_name" class=" form-control-label">Village Name</label>
                    <input type="text" id="village_name" placeholder="Enter Village name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="region" class=" form-control-label">Region</label>
                    {{-- <input type="text" id="region" placeholder="Enter Region" class="form-control"> --}}
                    <select id="region" name="region" class="form-control">
                        <option value="Balochistan">Balochistan</option>
                        <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Sindh">Sindh</option>
                    </select>
                </div>
                <div class="row form-group">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="appro_h_f" class=" form-control-label">Approximate Households/Families</label>
                            <input type="number" id="appro_h_f" placeholder="Enter your Approximate Households/Families" class="form-control">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="appro_residents" class=" form-control-label">Approximate Residents</label>
                            <input type="number" id="appro_residents" placeholder="Approximate Residents" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="expected_cost" class=" form-control-label">Expected Cost (PKR)</label>
                    <input type="number" id="expected_cost" placeholder="Expected Cost (PKR)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="expected_cost" class=" form-control-label">Snap Upload at working progress and at completion</label>
                    <input type="file" id="image" class="form-control" required multiple>
                </div>
                <div class="form-group">
                    <label for="remarks" class=" form-control-label">Remarks</label>
                    <textarea id="remarks" class="form-control"></textarea>
                </div>
                        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="confirmButton" class="btn btn-primary" data-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
 </div>
</div>