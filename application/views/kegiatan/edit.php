<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-7">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="<?= base_url('kegiatan');?>" class="btn btn-warning btn-icon-split">
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
            <?php echo form_open_multipart('kegiatan/edit_proses');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-9">
                  <input type="hidden" name="id_jenis_kegiatan" value="<?= $kegiatan_data['id_jenis_kegiatan'];?>">
                <textarea type="text" class="form-control" name="nama_jenis_kegiatan" required><?= $kegiatan_data['nama_jenis_kegiatan'];?></textarea>
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
