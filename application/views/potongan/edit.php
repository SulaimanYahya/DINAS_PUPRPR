<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-7">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="<?= base_url('potongan');?>" class="btn btn-warning btn-icon-split">
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
            <?php echo form_open_multipart('potongan/edit_proses');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Potongan</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_potongan" value="<?= $potongan_data['nama_potongan'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="persentase" class="col-sm-3 col-form-label">Pembagi</label>
                <div class="col-sm-9">
                  <input type="hidden" name="id_potongan" value="<?= $potongan_data['id_potongan'];?>">
                <input type="text" class="form-control" name="persentase" value="<?= $potongan_data['persentase'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="ket_pot" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="ket_pot" value="<?= $potongan_data['ket_pot'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="kd_pot" class="col-sm-3 col-form-label">Kode Level</label>
                <div class="col-sm-9">
                  <select class="form-control" name="kd_pot" required>
                    <option value="<?= $potongan_data['kd_pot'];?>"><?= $potongan_data['kd_pot'];?></option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
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
