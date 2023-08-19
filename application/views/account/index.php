
        <!-- Begin Page Content -->
        <div class="container-fluid holis" style="height: 90%">

          <!-- Page Heading -->

          <?= $this->session->flashdata('message'); ?>

          <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/profile/') . $user['foto'];?>" class="card-img">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $user['nama'] ;?></h5>
              Alamat : <?= $user['alamat'] ;?>
              <br>Kontak : <?= $user['no_hp'] ;?>
              <br>Email : <?= $user['email'] ;?>
              <p class="card-text">Anda memiliki hak akses <?= $user['role'] ;?> terhadap aplikasi ini.</p>
              <p class="card-text"><small class="text-muted">Terakhir mengubah password : <?= date('d F Y', $user['date_created']);?></small></p>
              <a href="<?= base_url('pass');?>" class="btn btn-warning mb-3 btn-icon-split"><span class="icon text-white-50">
          <i class="fas fa-fw fa-lock"></i>
      </span>
      <span class="text">Ubah Password</span></a>
            </div>
          </div>
        </div>
      </div>

      <a href="<?= base_url('account/edit/'). $user['id'];?>" class="btn btn-info mb-3 btn-icon-split"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-edit"></i>
                                </span>
                                <span class="text">Ubah Data Profil</span></a>  

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal Add Data -->

    <div class="modal fade" id="newInfoModal" tabindex="-1" role="dialog" aria-labelledby="newInfoModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newInfoModalLabel">Perbaharui</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open_multipart('account/edit');?>
          <div class="modal-body">

            <div class="form-group">
              <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Anda" required>
              <input type="hidden" class="form-control" name="id" value="<?=$user['id'];?>">
        </div>
            
        <div class="form-group">
            <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
              <label class="custom-file-label" for="gambar" name="gambar" aria-describedby="gambar">Pilih Foto</label>
            </div>
          </div>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Simpan</button>
          </div>
        </div>
      </div>
    </div>