<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-dark bg-gray-dark text-light border-bottom-0">
  <a href="<?=htmlspecialchars($homepage)?>" class="navbar-brand ml-2">
    <img src="<?=htmlspecialchars($logo_link)?>" alt="Web Template Logo" class="brand-image elevation-3 bg-light p-1" style="opacity: .8">
    <span class="brand-text font-weight-light text-light"><b>WEB</b> Template</span>
  </a>

  <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse order-3" id="navbarCollapse">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="<?=htmlspecialchars($homepage)?>" class="nav-link active"><i class="fas fa-home"></i> Homepage</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><i class="fas fa-plus"></i> Menu</a>
      </li>
      <li class="nav-item">
        <a href="/web_template_phpc/" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
    </ul>
  </div>

  <!-- Right navbar links -->
  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->