<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-7">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="<?= base_url('rekening');?>" class="btn btn-warning btn-icon-split">
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
            <?php echo form_open_multipart('rekening/edit_proses');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">No. Rek</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="no_rek" value="<?= $rek_data['no_rek'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Rek</label>
                <div class="col-sm-9">
                  <input type="hidden" name="id_rek" value="<?= $rek_data['id_rek'];?>">
                <input type="text" class="form-control" name="nama_rek" value="<?= $rek_data['nama_rek'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Jenis Tagihan</label>
                <div class="col-sm-9">
                <select name="id_jenis_tagihan" style="width: 100%" class="form-control" id="selek" required>
                  <option value="<?= $rek_data['id_jenis_tagihan'];?>"><?= $rek_data['nama_jenis_tagihan'];?></option>
                  <?php foreach ($jenis_tagihan as $key): ?>         
                    <option value="<?=$key['id_jenis_tagihan'];?>"><?=$key['nama_jenis_tagihan'];?></option>
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
