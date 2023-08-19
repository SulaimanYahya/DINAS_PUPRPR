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
            <?php echo form_open_multipart('renstra/edit_proses_program');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Program</label>
                <div class="col-sm-9">
                <input type="hidden" name="id_program" value="<?= $program_data['id_program'];?>">
                <input type="hidden" name="id_sasaran" value="<?= $program_data['id_sasaran'];?>">
                <select name="id_jenis_program" style="width: 100%" class="form-control" id="selek" required>
                <option value="<?= $program_data['id_jenis_program'];?>"><?= $program_data['nama_jenis_program'];?></option>
                <?php foreach ($jenis_program as $key): ?>         
                  <option value="<?=$key['id_jenis_program'];?>"><?=$key['nama_jenis_program'];?></option>
                <?php endforeach ?>
              </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="sasaran" class="col-sm-3 col-form-label">Sasaran Program</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="sasaran_program" value="<?= $program_data['sasaran_program'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="indikator" class="col-sm-3 col-form-label">Indikator Kinerja</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="indikator_kinerja_program" value="<?= $program_data['indikator_kinerja_program'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="Formulasi" class="col-sm-3 col-form-label">Formulasi Indikator</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="formulasi_indikator_program" value="<?= $program_data['formulasi_indikator_program'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="Satuan" class="col-sm-3 col-form-label">Satuan Program</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="satuan_program" value="<?= $program_data['satuan_program'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_1" class="col-sm-3 col-form-label">Targ-Fis Tahun 1 (<?= $program_data['tahun_1'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="f_tahun_1" value="<?= $program_data['f_tahun_1'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_1" class="col-sm-3 col-form-label">Targ-Ang Tahun 1 (<?= $program_data['tahun_1'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="a_tahun_1" value="<?= $program_data['a_tahun_1'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_2" class="col-sm-3 col-form-label">Targ-Fis Tahun 2 (<?= $program_data['tahun_2'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="f_tahun_2" value="<?= $program_data['f_tahun_2'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_2" class="col-sm-3 col-form-label">Targ-Ang Tahun 2 (<?= $program_data['tahun_2'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="a_tahun_2" value="<?= $program_data['a_tahun_2'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_3" class="col-sm-3 col-form-label">Targ-Fis Tahun 3 (<?= $program_data['tahun_3'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="f_tahun_3" value="<?= $program_data['f_tahun_3'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_3" class="col-sm-3 col-form-label">Targ-Ang Tahun 3 (<?= $program_data['tahun_3'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="a_tahun_3" value="<?= $program_data['a_tahun_3'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_4" class="col-sm-3 col-form-label">Targ-Fis Tahun 4 (<?= $program_data['tahun_4'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="f_tahun_4" value="<?= $program_data['f_tahun_4'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_4" class="col-sm-3 col-form-label">Targ-Ang Tahun 4 (<?= $program_data['tahun_4'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="a_tahun_4" value="<?= $program_data['a_tahun_4'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_5" class="col-sm-3 col-form-label">Targ-Fis Tahun 5 (<?= $program_data['tahun_5'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="f_tahun_5" value="<?= $program_data['f_tahun_5'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_5" class="col-sm-3 col-form-label">Targ-Ang Tahun 5 (<?= $program_data['tahun_5'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="a_tahun_5" value="<?= $program_data['a_tahun_5'];?>" required>
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
