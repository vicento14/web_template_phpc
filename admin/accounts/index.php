<?php
include '../../page/session.php';

// Server Host
require '../../process/svr_host_f.php';

$root = svr_host_header();

$url_components = parse_url($_SERVER['REQUEST_URI']);

include '../../page/admin/login_session.php';

include '../../page/message.php';

include '../../page/icon_logo_link.php';

include '../../page/admin/homepage.php';

$page_name = 'Account Management';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="<?= $page_title ?>" />
  <meta name="keywords" content="<?= $page_title ?>" />

  <title><?= $page_title ?></title>

  <?php include '../../page/admin/header.php'; ?>

  <link rel="icon" href="<?= htmlspecialchars($icon_link) ?>" type="image/x-icon" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <noscript>
      <br>
      <span>We are facing <strong>Script</strong> issues. Kindly enable <strong>JavaScript</strong>!!!</span>
      <br>
      <span>Call IT Personnel Immediately!!! They will fix it right away.</span>
    </noscript>

    <?php
    include '../../page/admin/navbar.php';
    include '../../page/admin/sidebar/bar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php include '../../page/admin/content_header.php'; ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row mb-4">
            <?php include $root . 'modals/new_account.php'; ?>
            <?php include $root . 'modals/import_accounts.php'; ?>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card card-gray-dark card-outline">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-user"></i> Accounts Table</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form class="mb-0" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                    <div class="row mb-4">
                      <div class="col-sm-3">
                        <label>Employee No:</label>
                        <input type="text" id="employee_no_search" name="employee_no_search" class="form-control"
                          autocomplete="off">
                      </div>
                      <div class="col-sm-3">
                        <label>Full Name:</label>
                        <input type="text" id="full_name_search" name="full_name_search" class="form-control"
                          autocomplete="off">
                      </div>
                      <div class="col-sm-3">
                        <label>User Type:</label>
                        <select id="user_type_search" name="user_type_search" class="form-control">
                          <option value="">Select User Type</option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-block btn-primary" id="btnSearchAccount"
                          name="search_account" value="1"><i class="fas fa-search mr-2"></i>Search</button>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-sm-3">
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                          data-target="#confirm_delete_account_selected" id="checkbox_control" disabled><i
                            class="fas fa-trash mr-2"></i>Delete Checked</button>
                      </div>
                      <div class="col-sm-3">
                        <a href="#" class="btn btn-info btn-block" id="export_csv"><i
                            class="fas fa-download mr-2"></i>Export Account
                          2</a>
                      </div>
                      <div class="col-sm-3">
                        <a href="#" class="btn btn-secondary btn-block" onclick="export_employees()"><i
                            class="fas fa-download mr-2"></i>Export Account</a>
                      </div>
                      <div class="col-sm-3">
                        <a href="#" class="btn btn-primary btn-block" onclick="export_employees3()"><i
                            class="fas fa-download mr-2"></i>Export Account 3</a>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-sm-3 offset-sm-9">
                        <a href="#" class="btn btn-info btn-block" onclick="popup1()"><i
                            class="fas fa-download mr-2"></i>Export
                          Account 3 Popup</a>
                      </div>
                    </div>
                  </form>
                  <?php
                  include $root . 'process/accounts_g_p.php';
                  include $root . 'modals/update_account.php';
                  include $root . 'modals/confirm_delete_account_selected.php';
                  ?>
                  <div class="table-responsive" style="height: 500px; overflow: auto; display:inline-block;">
                    <table class="table table-head-fixed text-nowrap table-hover" id="accounts_table">
                      <thead style="text-align:center;">
                        <th>
                          <input type="checkbox" name="" id="check_all" onclick="select_all_func()">
                        </th>
                        <th> # </th>
                        <th> Employee No. </th>
                        <th> Username </th>
                        <th> Full Name </th>
                        <th> Section </th>
                        <th> User Type </th>
                      </thead>
                      <tbody id="list_of_accounts" style="text-align:center;"><?= $data ?></tbody>
                    </table>
                  </div>
                  <script>
                    const get_accounts_details = (param) => {
                      var string = param.split('~!~');
                      var id = string[0];
                      var id_number = string[1];
                      var username = string[2];
                      var full_name = string[3];
                      var section = string[4];
                      var role = string[5];

                      document.getElementById('id_account_update').value = id;
                      document.getElementById('employee_no_update').value = id_number;
                      document.getElementById('username_update').value = username;
                      document.getElementById('full_name_update').value = full_name;
                      document.getElementById('password_update').value = '';
                      document.getElementById('section_update').value = section;
                      document.getElementById('user_type_update').value = role;
                    }

                    // uncheck all
                    const uncheck_all = () => {
                      var select_all = document.getElementById('check_all');
                      select_all.checked = false;
                      document.querySelectorAll(".singleCheck").forEach((el, i) => {
                        el.checked = false;
                      });
                      get_checked_length();
                    }
                    // check all
                    const select_all_func = () => {
                      var select_all = document.getElementById('check_all');
                      if (select_all.checked == true) {
                        console.log('check');
                        document.querySelectorAll(".singleCheck").forEach((el, i) => {
                          el.checked = true;
                        });
                      } else {
                        console.log('uncheck');
                        document.querySelectorAll(".singleCheck").forEach((el, i) => {
                          el.checked = false;
                        });
                      }
                      get_checked_length();
                    }
                    // GET THE LENGTH OF CHECKED CHECKBOXES
                    const get_checked_length = () => {
                      var arr = [];
                      document.querySelectorAll("input.singleCheck[type='checkbox']:checked").forEach((el, i) => {
                        arr.push(el.value);
                      });
                      console.log(arr);
                      var numberOfChecked = arr.length;
                      console.log(numberOfChecked);
                      if (numberOfChecked > 0) {
                        document.getElementById("id_account_delete_arr").value = JSON.stringify(arr);
                        document.getElementById("count_delete_account_selected").innerHTML = `${numberOfChecked} Account Row/s Selected`;
                        document.getElementById("checkbox_control").removeAttribute('disabled');
                      } else {
                        document.getElementById("checkbox_control").setAttribute('disabled', true);
                      }
                    }

                    // Export CSV
                    document.getElementById("export_csv").addEventListener("click", e => {
                      e.preventDefault();
                      let table_id = "accounts_table";
                      let filename = 'Export-Accounts' + '_' + new Date().toLocaleDateString() + '.csv';
                      export_csv(table_id, filename);
                    });

                    const export_employees = () => {
                      var employee_no = document.getElementById('employee_no_search').value;
                      var full_name = document.getElementById('full_name_search').value;
                      window.open('<?= svr_host() ?>process/exp_accounts_g_p.php?employee_no=' + employee_no + "&full_name=" + full_name, '_blank');
                    }

                    const export_employees3 = () => {
                      var employee_no = document.getElementById('employee_no_search').value;
                      var full_name = document.getElementById('full_name_search').value;
                      window.open('<?= svr_host() ?>process/exp_accounts3_g_p.php?employee_no=' + employee_no + "&full_name=" + full_name, '_blank');
                    }

                    const popup1 = () => {
                      var employee_no = document.getElementById('employee_no_search').value;
                      var full_name = document.getElementById('full_name_search').value;
                      PopupCenter('<?= svr_host() ?>process/exp_accounts3_g_p.php?employee_no=' + employee_no + "&full_name=" + full_name, 'Popup Export Accounts 3', '1190', '600');
                    }
                  </script>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div>
      </section>
    </div>

    <?php include '../../page/admin/footer.php'; ?>

</body>

</html>