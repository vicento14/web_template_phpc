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

$page_name = 'Dashboard';
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

      </section>
    </div>

    <?php include '../../page/admin/footer.php'; ?>

</body>

</html>