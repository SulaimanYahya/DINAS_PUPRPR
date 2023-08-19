<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gradient-light topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <h3 class="gradient-huruf"><?=$title;?></h3>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small gradient-huruf"><?= $user['nama'];?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/'). $user['foto']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('account');?>">
                  <img style="width: 17%; height: 17%;" src="<?= base_url('assets/img/profile/icon_user.png');?>">
                  &nbsp;My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <img style="width: 17%; height: 17%;" src="<?= base_url('assets/img/profile/icon_logout.png');?>">
                  &nbsp;Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->