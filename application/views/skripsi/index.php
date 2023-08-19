<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                    <div class="card-header text-primary gradient-status">
                        <h5>Klik Cek Untuk Melakukan Validasi Syarat</h5>
                    </div>
                    <div class="card-body">
                        
                        <?= $this->session->flashdata('message'); ?>

                       <table class="table table-hover table-responsive" id="table">
                        <thead class="gradient-card">
                          <tr>
                            <th scope="col" class="text-light">#</th>
                            <th scope="col" class="text-light">NIM</th>
                            <th scope="col" class="text-light">Nama</th>
                            <th scope="col" class="text-light">NIK</th>
                            <th scope="col" class="text-light">Tempat Lahir</th>
                            <th scope="col" class="text-light">Tanggal Lahir</th>
                            <th scope="col" class="text-light">Masuk</th>
                            <th scope="col" class="text-light">Jenjang</th>
                            <th scope="col" class="text-primary">Prodi</th>
                            <th scope="col" class="text-primary">IPK</th>
                            <th scope="col" class="text-primary">SKS</th>
                            <th scope="col" class="text-primary">Jenis Pendaftar</th>
                            <!-- <th scope="col" class="text-primary">Whatsapp</th>
                            <th scope="col" class="text-primary">Email</th>
                            <th scope="col" class="text-primary">NPWP</th>
                            <th scope="col" class="text-primary">Foto</th> -->
                            <th scope="col" class="text-primary">Progress</th>
                            <th scope="col" class="text-primary">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1;?>
                          <?php foreach ($mahasiswa as $i) : ?>

                          <tr>
                            <th scope="row"><?= $no;?></th>
                            <td><?= $i['nim'];?></td>
                            <td><?= $i['nama'];?></td>
                            <td><?= $i['nik'];?></td>
                            <td><?= $i['tempat_lahir'];?></td>
                            <td><?= $i['tanggal_lahir'];?></td>
                            <td><?= $i['tahun_masuk'];?></td>
                            <td><?= $i['jenjang'];?></td>
                            <td><?= $i['nama_prodi'];?></td>
                            <td><?= $i['ipk'];?></td>
                            <td><?= $i['total_sks'];?></td>
                            <td><?= $i['jenis_pendaftar'];?></td>
                            <!-- <td><?= $i['no_wa'];?></td>
                            <td><?= $i['email'];?></td>
                            <td><?= $i['npwp'];?></td>
                            <td><a href="<?= base_url('mahasiswa/edit_foto/'). $i['nim'];?>"><img src="<?= base_url('assets/img/gambar/').$i['foto_mhs'];?>" width="50" height="60"></a></td> -->
                            <td><a href="" class="badge <?php if ($i['status_mhs']=='tunggu') {
                                                echo "badge-danger";
                                              }else {
                                                echo "badge-success";
                                              }
                                          ?>"><?= $i['status_mhs'];?></a></td>
                            <td>
                                <a href="<?= base_url('skripsi/validasi/'). $i['nim'];?>" class="btn btn-warning btn-sm btn-icon-split"><span class="icon text-white-50">
                                                  <i class="fas fa-fw fa-user-check"></i>
                                              </span></a>
                            </td>
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