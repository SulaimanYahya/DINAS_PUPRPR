<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-7">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="<?= base_url('program');?>" class="btn btn-warning btn-icon-split">
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
            <?php echo form_open_multipart('program/edit_proses');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Program</label>
                <div class="col-sm-9">
                  <input type="hidden" name="id_jenis_program" value="<?= $program_data['id_jenis_program'];?>">
                <textarea type="text" class="form-control" name="nama_jenis_program" required><?= $program_data['nama_jenis_program'];?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Bidang</label>
                <div class="col-sm-9">
                <select name="id_bidang" style="width: 100%" class="form-control" id="selek" required>
                  <option value="<?= $program_data['id_bidang'];?>"><?= $program_data['nama_bidang'];?></option>
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
