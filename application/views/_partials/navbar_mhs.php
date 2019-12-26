
<nav class="navbar navbar-expand navbar-dark static-top">

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  <a href="<?= site_url() ?>">
    <h3 class="text-white float-left m-1">E-Learning - <small><i>Mahasiswa</i></small></h3>
  </a>


  <!-- Navbar Search -->
  <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 text-white">
    Welcome, <?= $nim ?>!
  </div>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= site_url('login/logout') ?>">Logout</a>
      </div>
    </li>
  </ul>

</nav>