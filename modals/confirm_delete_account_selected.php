<div class="modal fade bd-example-modal-xl" id="confirm_delete_account_selected" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <b>Delete Selected</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="mb-0" action="<?=htmlspecialchars(svr_host() . 'process/delete_account_selected_p.php');?>" method="POST">
        <input type="hidden" id="id_account_delete_arr" name="id_account_delete_arr" class="form-control">
        <div class="modal-body">
          <input type="hidden" id="confirm_delete_account_selected_current_page" name="confirm_delete_account_selected_current_page" class="form-control" value="<?=htmlspecialchars($url_components['path']);?>">
          <div class="row">
            <div class="col-12">
              <h5>Are you sure to delete selected rows?</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <span id="count_delete_account_selected"></span>
            </div>
          </div>
          <br>
          <hr>
          <div class="row">
            <div class="col-12">
              <div class="float-right">
                <button type="submit" class="btn btn-danger" id="btnDeleteAccountSelected" name="btn_delete_account_selected" value="1">Delete Selected</button>
              </div>
            </div>
          </div>
        <!-- /.card-body -->
        </div>
      </form>
    <!-- /.card -->
    </div>
  </div>
</div>