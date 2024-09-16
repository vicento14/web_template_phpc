<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=htmlspecialchars($homepage)?>" class="brand-link">
    <img src="<?=htmlspecialchars($logo_link)?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">&ensp;WEB &ensp;|&ensp; <?=$role_label?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?=$homepage?>" class="d-block"><?=htmlspecialchars($_SESSION['name']);?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
          if ($_SESSION['role'] == 'admin') {
            include 'admin_bar.php';
          } else if ($_SESSION['role'] == 'user') {
            include 'user_bar.php';
          }
        ?>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#logout_modal">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Logout</p>
          </a>
        </li>
      </ul> 
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php include $root . 'modals/logout_modal.php'; ?>
