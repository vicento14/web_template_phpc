<!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
<li class="nav-item">
  <?php if ($url_components['path'] == "/web_template_phpc/user/pagination/" || 
            $url_components['path'] == "/web_template_phpc/user/pagination/index.php") { ?>
    <a href="/web_template_phpc/user/pagination/" class="nav-link active">
    <?php } else { ?>
      <a href="/web_template_phpc/user/pagination/" class="nav-link">
      <?php } ?>
      <i class="nav-icon far fa-file-alt"></i>
      <p>
        Pagination
      </p>
    </a>
</li>