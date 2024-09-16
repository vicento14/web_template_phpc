<!-- Modal -->
<form action="<?=htmlspecialchars(svr_host() . 'process/logout_p.php');?>" method="POST">
  <div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 style="text-align:center;">Confirm Logout</h5>
        </div>
        <div class="modal-footer">
         <input type="submit" value="logout" class="btn btn-danger col-sm-12" name="logout">
        </div>
      </div>
    </div>
  </div>
</form>