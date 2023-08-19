<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="<?= base_url('renstra');?>" class="btn btn-warning btn-icon-split">
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
            <?php echo form_open_multipart('renstra/edit_proses_sasaran');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Sasaran Strategis</label>
                <div class="col-sm-10">
                <input type="hidden" name="id_sasaran" value="<?= $sasaran_data['id_sasaran'];?>">
                <select name="id_jenis_sasaran" style="width: 100%" class="form-control" id="selek" required>
                <option value="<?= $sasaran_data['id_jenis_sasaran'];?>"><?= $sasaran_data['nama_jenis_sasaran'];?></option>
                <?php foreach ($jenis_sasaran as $key): ?>         
                  <option value="<?=$key['id_jenis_sasaran'];?>"><?=$key['nama_jenis_sasaran'];?></option>
                <?php endforeach ?>
              </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="indikator" class="col-sm-2 col-form-label">Indikator Kerja</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="indikator_kerja" value="<?= $sasaran_data['indikator_kerja'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="Formulasi" class="col-sm-2 col-form-label">Formulasi Indikator</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="formulasi_indikator" value="<?= $sasaran_data['formulasi_indikator'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="Satuan" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="satuan" value="<?= $sasaran_data['satuan'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_1" class="col-sm-2 col-form-label">Tahun 1</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="tahun_1" value="<?= $sasaran_data['tahun_1'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_1" class="col-sm-2 col-form-label">Target Thn 1</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="t_tahun_1" value="<?= $sasaran_data['t_tahun_1'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_2" class="col-sm-2 col-form-label">Tahun 2</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="tahun_2" value="<?= $sasaran_data['tahun_2'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_2" class="col-sm-2 col-form-label">Target Thn 2</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="t_tahun_2" value="<?= $sasaran_data['t_tahun_2'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_3" class="col-sm-2 col-form-label">Tahun 3</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="tahun_3" value="<?= $sasaran_data['tahun_3'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_3" class="col-sm-2 col-form-label">Target Thn 3</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="t_tahun_3" value="<?= $sasaran_data['t_tahun_3'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_4" class="col-sm-2 col-form-label">Tahun 4</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="tahun_4" value="<?= $sasaran_data['tahun_4'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_4" class="col-sm-2 col-form-label">Target Thn 4</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="t_tahun_4" value="<?= $sasaran_data['t_tahun_4'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_5" class="col-sm-2 col-form-label">Tahun 5</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="tahun_5" value="<?= $sasaran_data['tahun_5'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_5" class="col-sm-2 col-form-label">Target Thn 5</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="t_tahun_5" value="<?= $sasaran_data['t_tahun_5'];?>" required>
                </div>
              </div>

        
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
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
