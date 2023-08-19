<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-5">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="<?= base_url('hasil/validasi/').$syarat_data['nim'];?>" class="btn btn-warning btn-icon-split">
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
            <?php echo form_open_multipart('hasil/valid_proses2');?>

            <h6 class="text-gray-800">Silahkan pilih keterangan tambah untuk validasi!</h6>
            <br>
              <div class="form-group row">
                <label for="Keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                	<input type="hidden" name="id_validasi" value="<?=$syarat_data['id_validasi'];?>">
                  <select name="keterangan" class="form-control" required>
                  <option value="Lulus Bersyarat">Lulus Bersyarat</option>
                  <option value="Lulus Murni">Lulus Murni</option>
                </select>
                </div>
            </div>
        
        <div class="form-group row justify-content-end">
          <div class="col-sm-9">
            <button type="submit" class="btn btn-success btn-icon-split" onclick="return confirm('yakin validasi syarat?');"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-check"></i>
                                </span>
                                <span class="text">Validasi</span></button>
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
