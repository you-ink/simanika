<!-- Main Sidebar -->
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
      <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
        <div class="d-table m-auto">
          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?php echo base_url() ?>assets/img/icon.png" alt="simanika">
          <span class="d-none d-md-inline ml-1">SIMANIKA</span>
        </div>
      </a>
      <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
      </a>
    </nav>
  </div>
  <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
    <div class="input-group input-group-seamless ml-3">
      <div class="input-group-prepend">
        <!-- <div class="input-group-text">
          <i class="fas fa-search"></i>
        </div> -->
      </div>
      <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
  </form>
  <div class="nav-wrapper">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?php echo ($this->uri->segment(2) == 'index' || empty($this->uri->segment(2)))?'active':'' ?>" href="<?php echo base_url('dashboard') ?>">
          <i class="material-icons">home</i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo ($this->uri->segment(2) == 'member')?'active':'' ?>" href="<?php echo base_url('dashboard/member') ?>">
          <i class="material-icons">table_chart</i>
          <span>Data Anggota</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo ($this->uri->segment(2) == 'profile')?'active':'' ?>" href="<?php echo base_url('dashboard/profile') ?>">
          <i class="material-icons">person</i>
          <span>User Profile</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
<!-- End Main Sidebar -->