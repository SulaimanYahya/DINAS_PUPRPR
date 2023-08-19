<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-7">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="<?= base_url('akun');?>" class="btn btn-warning btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
                      </span>
                      <span class="text small">Kembali</span>
                  </a>
                    </div>
                    <div class="card-body">
                        
                     <?= $this->session->flashdata('message'); ?>

                    <div class="row">
            <div class="col-lg-12">
            <?php echo form_open_multipart('akun/edit_proses');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                <input type="hidden" name="id" value="<?= $akun_data['id'];?>">
                <input type="text" class="form-control" name="nama" value="<?= $akun_data['nama'];?>" required>
                </div>
              </div>


              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="username" value="<?= $akun_data['username'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="Role" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                  <select name="id_role" style="width: 100%" class="form-control" id="selek" required>
                  <option value="<?= $akun_data['id_role'];?>"><?= $akun_data['role'];?></option>
                  <?php foreach ($role as $key): ?>         
                    <option value="<?=$key['id_role'];?>"><?=$key['role'];?></option>
                  <?php endforeach ?>
                </select>
                </div>
            </div>

        
        <div class="form-group row justify-content-end">
          <div class="col-sm-9">
            <button type="submit" class="btn btn-info btn-icon-split"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">Simpan Perubahan</span></button>
          </div>
        </div>
            </div>
          </div>

            	</div>
          </div>
        </div>
      </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
