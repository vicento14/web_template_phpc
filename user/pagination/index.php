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

$page_name = 'Pagination';
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

    <div class="content-wrapper">
      <?php include '../../page/admin/content_header.php'; ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-gray-dark card-outline">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-file-alt"></i> Accounts Table</h3>
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
                  </form>
                  <?php
                  // Pagination Table
                  include $root . 'process/pagination_g_p.php';
                  ?>
                  <div class="table-responsive" style="height: 400px; overflow: auto; display:inline-block;">
                    <table id="accounts_table" class="table table-sm table-head-fixed text-nowrap table-hover">
                      <thead style="text-align: center;">
                        <tr>
                          <th id="c_th" style="cursor: pointer;" onclick="th_order_by(1)"> # <i
                              class="fas fa-sort-numeric-up ml-2"></i></th>
                          <th id="employee_no_th" style="cursor: pointer;" onclick="th_order_by(2)"> Employee No. </th>
                          <th id="username_th" style="cursor: pointer;" onclick="th_order_by(4)"> Username </th>
                          <th id="fullname_th" style="cursor: pointer;" onclick="th_order_by(6)"> Full Name </th>
                          <th id="section_th" style="cursor: pointer;" onclick="th_order_by(8)"> Section </th>
                          <th id="role_th" style="cursor: pointer;" onclick="th_order_by(10)"> User Type </th>
                        </tr>
                      </thead>
                      <tbody id="list_of_accounts" style="text-align: center;"><?= $data ?></tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="dataTables_info" id="accounts_table_info" role="status" aria-live="polite">
                        <?= 'Total: ' . $number_of_result ?></div>
                      <input type="hidden" id="count_rows">
                    </div>
                  </div>
                  <?php
                  $url_components = parse_url($_SERVER['REQUEST_URI']);
                  $prev_query_params = [];
                  $next_query_params = [];

                  if (isset($url_components['query'])) {
                    parse_str($url_components['query'], $prev_query_params);
                    parse_str($url_components['query'], $next_query_params);
                  }

                  $prev_page = $current_page - 1;
                  $next_page = $current_page + 1;
                  $last_page = $number_of_page;
                  $prev_url = $_SERVER['REQUEST_URI'];
                  $next_url = $_SERVER['REQUEST_URI'];

                  if ($number_of_result > 0) {
                    if ($prev_page > 0) {
                      $prev_query_params['search_account'] = 1;
                      $prev_query_params['page'] = $prev_page;
                      $prev_query_string = http_build_query($prev_query_params);
                      $prev_url = $url_components['path'] . '?' . $prev_query_string;
                    }
                    if ($next_page <= $last_page) {
                      $next_query_params['search_account'] = 1;
                      $next_query_params['page'] = $next_page;
                      $next_query_string = http_build_query($next_query_params);
                      $next_url = $url_components['path'] . '?' . $next_query_string;
                    }
                  }
                  ?>
                  <div class="d-flex justify-content-between float-right">
                    <a href="<?= htmlspecialchars($prev_url) ?>" type="button" id="btnPrevPage"
                      class="btn bg-gray-dark btn-block mr-2"><</a>
                    <?= $pages ?>
                    <a href="<?= htmlspecialchars($next_url) ?>" type="button" id="btnNextPage"
                          class="btn bg-gray-dark btn-block">></a>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </section>
    </div>

    <?php include '../../page/admin/footer.php'; ?>

</body>

</html>