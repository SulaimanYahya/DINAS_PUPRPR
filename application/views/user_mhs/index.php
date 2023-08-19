
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <?= $this->session->flashdata('message'); ?>

          <div class="card mb-3">
            <div class="card-header gradient-card-warning">
                        <span class="h5 text-gray-900">Selamat Datang <?= $user['nama'];?></span>
                    </div>
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/gambar/') . $user['foto_mhs'];?>" class="card-img">
          </div>
          <div class="col-md-8 gradient-status">
            <div class="card-body">
              <table>   
                <tr>
                    <td><strong class="gradient-huruf">NIM</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['nim'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">NIK</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['nik'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Tmpt Lhr</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['tempat_lahir'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Tggl Lhr</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['tanggal_lahir'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Jenkel</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['jen_kel'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Masuk</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['tahun_masuk'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Jenjang</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['jenjang'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Fakultas</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['nama_fakultas'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Prodi</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['nama_prodi'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">IPK</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['ipk'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Total SKS</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['total_sks'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Pendaftar</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['jenis_pendaftar'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Whatsapp</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['no_wa'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Email</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['email'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">NPWP</strong></td>
                    <td><strong class="col-sm-9 col-form-label text-gray-900">: <?= $user['npwp'];?></strong></td>
                </tr>
                <tr>
                    <td><strong class="gradient-huruf">Ujian</strong></td>
                    <td><strong class="col-sm-9 col-form-label <?php if ($user['status_mhs']=='tunggu') {
                                  echo "text-danger";
                                }else {
                                  echo "text-success";
                                }
                            ?>">: <?= $user['status_mhs'];?></strong></td>
                </tr>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <div><a href="<?= base_url('user_mhs/edit/').$user['nim'];?>" class="btn btn-success mb-3 btn-icon-split"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-edit"></i>
                                </span>
                                <span class="text">Update Biodata</span></a></div>
        <div>&nbsp;<a href="<?= base_url('user_mhs/pass/').$user['nim'];?>" class="btn btn-danger mb-3 btn-icon-split"><span class="icon text-white-50">
          <i class="fas fa-fw fa-lock"></i>
      </span>
      <span class="text">Ubah Password</span></a>&nbsp;</div>
        <div><form target="<?php
          if ($user['status_mhs']=='tunggu' || $user['status_mhs']=='selesai') {
                        echo "";
                      }else {
                        echo "blank";
                      }

      ?>" class="form-inline" method="post" action="<?php
          if ($user['status_mhs']=='tunggu' || $user['status_mhs']=='selesai') {
                        echo "user_mhs/notif_tunggu";
                      }else {
                        echo "kartupdf";
                      }

      ?>">
        <input type="hidden" name="nim" value="<?= $user['nim'];?>">
        <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-fw fa-qrcode"></i>&nbsp; Cetak Kartu Ujian</button>
      </form></div>
          
      </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->