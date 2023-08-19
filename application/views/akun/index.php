<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#newDataModal"><span class="icon text-white-50">
                                                  <i class="fas fa-fw fa-plus"></i>
                                              </span>
                                              <span class="text">Tambah Akun</span></a> 
                    </div>
                    <div class="card-body">
                        
                        <?= $this->session->flashdata('message'); ?>

                       <table class="table table-hover small" id="table">
          <thead class="">
            <tr>
              <th scope="col" class="gradient-huruf">#</th>
              <th scope="col" class="gradient-huruf">Nama</th>
              <th scope="col" class="gradient-huruf">Role</th>
              <th scope="col" class="gradient-huruf">Bidang</th>
              <th scope="col" class="gradient-huruf">Username</th>
              <th scope="col" class="gradient-huruf">Password</th>
              <th scope="col" class="gradient-huruf">Foto</th>
              <th scope="col" class="gradient-huruf">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;?>
            <?php foreach ($akun as $i) : ?>

            <tr>
              <th scope="row"><?= $no;?></th>
              <td><?= $i['nama'];?></td>
              <td><?= $i['role'];?></td>
              <td><?= $i['nama_bidang'];?></td>
              <td><?= $i['username'];?></td>
              <td>**********</td>
              <td><img src="<?= base_url('assets/img/profile/').$i['foto'];?>" width="60" height="70"></td>
              <td>
                  <a href="<?= base_url('akun/edit/'). $i['id'];?>" class="btn btn-warning btn-sm btn-icon-split"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-edit"></i>
                                </span></a>
                  <a href="<?= base_url('akun/hapus/'). $i['id'];?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-trash"></i>
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

      <!-- Modal Add Data -->

    <div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newDataModalLabel">Tambah Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open_multipart('akun/input');?>
          <div class="modal-body">

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nama Pemilik Akun" name="nama">
            </div>

            <div class="form-group">
              <select name="id_bidang" style="width: 100%" class="form-control" id="selek" required>
                <option value="">--Pilih Bidang--</option>
                <?php foreach ($bidang as $key): ?>         
                  <option value="<?=$key['id_bidang'];?>"><?=$key['nama_bidang'];?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" placeholder="New Username" name="username">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" placeholder="New Password" name="password">
            </div>

          	<div class="form-group">
              <select name="id_role" style="width: 100%" class="form-control" id="selek" required>
              	<option value="">--Pilih Role--</option>
              	<?php foreach ($role as $key): ?>         
                  <option value="<?=$key['id_role'];?>"><?=$key['role'];?></option>
                <?php endforeach ?>
              </select>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i>&nbsp;Batal</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-save"></i>&nbsp;Simpan</button>
          </div>
        </div>
      </div>
    </div>
</div>