<div class="col-2">
  <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#new_account"><i
      class="fas fa-plus-circle mr-2"></i>Register Account</a>
</div>
<div class="modal fade bd-example-modal-xl" id="new_account" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">
          <b>Register Account</b>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="mb-0" id="new_account_form" action="<?=htmlspecialchars(svr_host() . 'process/add_account_p.php');?>" method="POST">
        <input type="hidden" id="new_account_current_page" name="new_account_current_page" class="form-control" value="<?=htmlspecialchars($url_components['path']);?>">
        <div class="modal-body">
          <div class="row mb-2">
            <div class="col-4">
              <label>Employee No:</label><label style="color: red;">*</label>
              <input type="text" id="employee_no" name="employee_no" maxlength="20" class="form-control" autocomplete="off" required>
            </div>
            <div class="col-4">
              <label>Full Name:</label><label style="color: red;">*</label>
              <input type="text" id="full_name" name="full_name" maxlength="50" class="form-control" autocomplete="off" required>
            </div>
            <div class="col-4">
              <label>Username:</label><label style="color: red;">*</label>
              <input type="text" id="username" name="username" maxlength="50" class="form-control" autocomplete="off" required>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <label>Password:</label><label style="color: red;">*</label>
              <input type="password" id="password" name="password" maxlength="50" class="form-control" autocomplete="off" required>
            </div>
            <div class="col-4">
              <label>Section:</label><label style="color: red;">*</label>
              <input type="text" id="section" name="section" maxlength="50" class="form-control" autocomplete="off" required>
            </div>
            <div class="col-4">
              <label>User Type:</label><label style="color: red;">*</label>
              <select id="user_type" name="user_type" class="form-control" required>
                <option value="">Select User Type</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnAddAccount" name="btn_add_account" value="1" class="btn btn-success">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>