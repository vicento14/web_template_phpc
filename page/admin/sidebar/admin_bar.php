<!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
<li class="nav-item">
  <?php if ($url_components['path'] == "/web_template_phpc/admin/dashboard/" || 
            $url_components['path'] == "/web_template_phpc/admin/dashboard/index.php") { ?>
    <a href="/web_template_phpc/admin/dashboard/" class="nav-link active">
    <?php } else { ?>
      <a href="/web_template_phpc/admin/dashboard/" class="nav-link">
      <?php } ?>
      <i class="nav-icon fas fa-bus"></i>
      <p>
        Dashboard
      </p>
    </a>
</li>
<li class="nav-item">
  <?php if ($url_components['path'] == "/web_template_phpc/admin/accounts/" || 
            $url_components['path'] == "/web_template_phpc/admin/accounts/index.php") { ?>
    <a href="/web_template_phpc/admin/accounts/" class="nav-link active">
    <?php } else { ?>
      <a href="/web_template_phpc/admin/accounts/" class="nav-link">
      <?php } ?>
      <i class="nav-icon fas fa-user-cog"></i>
      <p>
        Account Management
      </p>
    </a>
</li>