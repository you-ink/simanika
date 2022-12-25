<?php 
  $user_profile = $this->Func->get_profile();
?>
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
  <div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
      <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
        <div class="input-group input-group-seamless ml-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <!-- <i class="fas fa-search"></i> -->
            </div>
          </div>
          <div class="navbar-search" type="text" placeholder="" aria-label="Search"></div>
        </div>
      </form>
      <ul class="navbar-nav border-left flex-row ">
        <!-- <li class="nav-item border-right dropdown notifications">
          <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="nav-link-icon__wrapper">
              <i class="material-icons">&#xE7F4;</i>
              <span class="badge badge-pill badge-danger">2</span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">
              <div class="notification__icon-wrapper">
                <div class="notification__icon">
                  <i class="material-icons">&#xE6E1;</i>
                </div>
              </div>
              <div class="notification__content">
                <span class="notification__category">Analytics</span>
                <p>Your website’s active users count increased by
                  <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
              </div>
            </a>
            <a class="dropdown-item" href="#">
              <div class="notification__icon-wrapper">
                <div class="notification__icon">
                  <i class="material-icons">&#xE8D1;</i>
                </div>
              </div>
              <div class="notification__content">
                <span class="notification__category">Sales</span>
                <p>Last week your store’s sales count decreased by
                  <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
              </div>
            </a>
            <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
          </div>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="user-avatar rounded-circle mr-2" src="<?php echo base_url().$user_profile['foto'] ?>" alt="User Avatar" style="width: 2.5rem !important; height: 2.5rem !important;">
            <span class="d-none d-md-inline-block"><?php echo $user_profile['nama'] ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-small">
            <a class="dropdown-item" href="<?php echo base_url('dashboard/profile') ?>">
              <i class="material-icons">&#xE7FD;</i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger btn-logout" href="javascript:void(0)">
              <i class="material-icons text-danger">&#xE879;</i> Logout 
            </a>
          </div>
        </li>
      </ul>
      <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
          <i class="material-icons">&#xE5D2;</i>
        </a>
      </nav>
    </nav>
  </div>
  <!-- / .main-navbar -->