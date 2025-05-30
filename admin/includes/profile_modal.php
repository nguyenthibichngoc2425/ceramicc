<!-- Profile Modal -->
<div class="modal fade" id="profile">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">
          <i class="fa fa-user-circle"></i> <b>Admin Profile</b>
        </h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" value="<?php echo $admin['password']; ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="firstname" class="col-sm-3 control-label">First name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $admin['firstname']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="lastname" class="col-sm-3 control-label">Last name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $admin['lastname']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="photo" class="col-sm-3 control-label">Photo</label>
            <div class="col-sm-9">
              <input type="file" id="photo" name="photo" accept="image/*">
              <p class="help-block">Choose a profile picture (optional)</p>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <label for="curr_password" class="col-sm-3 control-label">Current Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Enter current password to save changes" required>
            </div>
          </div>

      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
          <i class="fa fa-times"></i> Close
        </button>
        <button type="submit" class="btn btn-success btn-flat" name="save">
          <i class="fa fa-check-square-o"></i> Save
        </button>
        </form>
      </div>

    </div>
  </div>
</div>
