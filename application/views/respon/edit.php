<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-7">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="<?= base_url('respon');?>" class="btn btn-warning btn-icon-split">
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
            <?php echo form_open_multipart('respon/edit_proses');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_respon" value="<?= $respon_data['nama_respon'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-9">
                  <input type="hidden" name="id_respon" value="<?= $respon_data['id_respon'];?>">
                <input type="text" class="form-control" name="nip" value="<?= $respon_data['nip'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="Role" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                <select name="id_role_respon" style="width: 100%" class="form-control" id="selek" required>
                <option value="<?= $respon_data['id_role_respon'];?>"><?= $respon_data['nama_role'];?></option>
                <?php foreach ($role_respon as $key): ?>         
                  <option value="<?=$key['id_role_respon'];?>"><?=$key['nama_role'];?></option>
                <?php endforeach ?>
              </select>
              </div>
            </div>

            <div class="form-group row">
                <label for="Bidang" class="col-sm-3 col-form-label">Bidang</label>
                <div class="col-sm-9">
                <select name="id_bidang" style="width: 100%" class="form-control" id="seleke" required>
                <option value="<?= $respon_data['id_bidang'];?>"><?= $respon_data['nama_bidang'];?></option>
                <?php foreach ($bidang as $key): ?>         
                  <option value="<?=$key['id_bidang'];?>"><?=$key['nama_bidang'];?></option>
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
