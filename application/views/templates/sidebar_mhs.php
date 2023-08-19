<!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion gradient-vertical" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img style="width: 80%; height: 80%;" src="<?= base_url('assets/img/profile/logo_umgo.png');?>">
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Informasi</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading mb-3">
        Menu Mahasiswa
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php
          if ($title=='Biodata') {
            echo "active";
          }
        ?>">
        <a class="nav-link <?php if($title=='Biodata'){
          echo "bghover";
        } ?>" href="<?= base_url('user_mhs');?>">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Biodata</span></a>
      </li>

      <li class="nav-item <?php
          if ($title=='Status Syarat') {
            echo "active";
          }
        ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-book"></i>
          <span>Status Syarat</span>
        </a>
       <!--  langsung show taru di clas colapse -->
        <div id="collapsePages2" class="collapse <?php
          if ($title=='Proposal' || $title=='Hasil' || $title=='Skripsi' || $title=='Wisuda' || $title=='Setting') {
            echo "show";
          }
        ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if($title=='Proposal'){
          echo "bghover";
        } ?>" href="<?= base_url('proposal_mhs');?>"><i class="fas fa-fw fa-file-alt"></i>&nbsp;Proposal</a>
            <a class="collapse-item <?php if($title=='Hasil'){
          echo "bghover";
        } ?>" href="<?= base_url('hasil_mhs');?>"><i class="fas fa-fw fa-file-alt"></i>&nbsp;Hasil</a>
            <a class="collapse-item <?php if($title=='Skripsi'){
          echo "bghover";
        } ?>" href="<?= base_url('skripsi_mhs');?>"><i class="fas fa-fw fa-file-alt"></i>&nbsp;Skripsi</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->