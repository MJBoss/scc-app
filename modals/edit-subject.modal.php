<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['sbj_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label class="control-label" style="position:relative; top:7px;">Student ID:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['sbj_id']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label class="control-label" style="position:relative; top:7px;">Name:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['sbj_desc']; ?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label class="control-label" style="position:relative; top:7px;">Name:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['lab_units']; ?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label class="control-label" style="position:relative; top:7px;">Name:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['lec_units']; ?>">
                        </div>
                    </div>
                </div>
                <!-- End of Modal Body -->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../includes/logout.inc.php">Save</a>
                </div>
            </div>
        </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['firstName'].' '.$row['lastName']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $row['user_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>