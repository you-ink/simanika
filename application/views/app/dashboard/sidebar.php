<?php 
  $user = $this->Func->get_profile();
?>
<!-- Main Sidebar -->
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
      <a class="navbar-brand w-100 mr-0" href="<?php echo base_url('dashboard') ?>" style="line-height: 25px;">
        <div class="d-table m-auto">
          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?php echo base_url() ?>assets/img/logo2-himanika.png" alt="simanika">
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
      <?php if ($user['status'] == 1): ?>
        <li class="nav-item">
          <a class="nav-link <?php echo ($this->uri->segment(2) == 'meeting')?'active':'' ?>" href="<?php echo base_url('dashboard/meeting') ?>">
            <i class="material-icons">groups</i>
            <span>Rapat</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($this->uri->segment(2) == 'program')?'active':'' ?>" href="<?php echo base_url('dashboard/program') ?>">
            <i class="material-icons">analytics</i>
            <span>Program Kerja</span>
          </a>
        </li>
        <?php if ($user['level_id'] == 1): ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($this->uri->segment(2) == 'division')?'active':'' ?>" href="<?php echo base_url('dashboard/division') ?>">
              <i class="material-icons">toc</i>
              <span>Data Divisi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($this->uri->segment(2) == 'position')?'active':'' ?>" href="<?php echo base_url('dashboard/position') ?>">
              <i class="material-icons">toc</i>
              <span>Data Jabatan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($this->uri->segment(2) == 'member')?'active':'' ?>" href="<?php echo base_url('dashboard/member') ?>">
              <i class="material-icons">table_chart</i>
              <span>Data Anggota</span>
            </a>
          </li>
        <?php endif ?>
      <?php endif ?>
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