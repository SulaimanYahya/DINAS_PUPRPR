
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 gradient-card-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-light mb-1">
                                    Total Renstra</div>
                                <div class="h3 mb-0 font-weight-bold text-light"><?=$jum_mhs;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-3x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">

                <div class="card shadow h-100 py-2 gradient-card-success">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-light mb-1">
                                    Total Renja Awal</div>
                                <div class="h3 mb-0 font-weight-bold text-light"><?=$jum_akun;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-3x text-light"></i>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 gradient-card-danger">
                 
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-light mb-1">
                                    Total Renja</div>
                                <div class="h3 mb-0 font-weight-bold text-light"><?=$jum_syarat;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-contract fa-3x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

             <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 gradient-card-warning">
                 
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-light mb-1">
                                    Total RKA</div>
                                <div class="h3 mb-0 font-weight-bold text-light"><?=$jum_syarat;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-invoice fa-3x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

        </div>

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold gradient-huruf">Data Tagihan Berdasarkan Tanggal</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Option:</div>   
                                <a class="dropdown-item" href="#">No Available</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold gradient-huruf">Status Program</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Option:</div>
                                <a class="dropdown-item" href="#">No Available</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-dark"></i> Sentuh Chart Untuk Melihat Data
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->