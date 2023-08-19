<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                    <div class="card-header text-primary gradient-status">
                        <h5><?= $user['nim'];?> - <?= $user['nama'];?></h5>
                    </div>
                    <div class="card-body">
                        
                        <?= $this->session->flashdata('message'); ?>

                       <table class="table table-hover" id="table">
                        <thead class="gradient-card">
                          <tr>
                            <th scope="col" class="text-light">#</th>
                            <th scope="col" class="text-light">Syarat</th>
                            <th scope="col" class="text-primary">Status</th>
                            <th scope="col" class="text-primary">Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1;?>
                          <?php foreach ($validasi as $i) : ?>

                          <tr>
                            <th scope="row"><?= $no;?></th>
                            <td><?= $i['nama_syarat'];?></td>
                            <td><i class="fas fa-fw <?php if ($i['status']=='tunggu') {
                                            echo "fa-exclamation-triangle fa-2x text-danger";
                                          }else if ($i['status']=='hampir') {
                                            echo "fa-check-circle fa-2x text-warning";
                                          }else {
                                            echo "fa-check-circle fa-2x text-success";
                                          }
                                  ?>"></i></td>
                            <td><?= $i['keterangan'];?></td>
                          </tr>

                          <?php $no++; ?>
                          <?php endforeach?>

                        </tbody>
                      </table>

            </div>
          </div>
        </div>
      </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->