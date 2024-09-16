<div class="col-2">
  <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#import_accounts"><i
      class="fas fa-upload mr-2"></i>Import Account</a>
</div>
<div class="modal fade" id="import_accounts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Import Accounts</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="mb-0" action="<?=htmlspecialchars(svr_host() . 'process/imp_accounts_p.php');?>" enctype="multipart/form-data" method="POST">
        <div class="modal-body">
          <input type="hidden" id="import_accounts_current_page" name="import_accounts_current_page" class="form-control" value="<?=htmlspecialchars($url_components['path']);?>">
          <label>File:</label>
          <input type="file" name="file" class="form-control-lg" accept=".csv">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="download_template" value="Download Template">
          <input type="submit" class="btn btn-primary" name="upload" value="Upload CSV">
        </div>
      </form>
    </div>
  </div>
</div>