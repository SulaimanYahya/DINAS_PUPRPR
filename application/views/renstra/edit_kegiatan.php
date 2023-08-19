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
            <?php echo form_open_multipart('renstra/edit_proses_kegiatan');?>

              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-9">
                <input type="hidden" name="id_kegiatan" value="<?= $kegiatan_data['id_kegiatan'];?>">
                <input type="hidden" name="id_program" value="<?= $kegiatan_data['id_program'];?>">
                <select name="id_jenis_kegiatan" style="width: 100%" class="form-control" id="selek" required>
                <option value="<?= $kegiatan_data['id_jenis_kegiatan'];?>"><?= $kegiatan_data['nama_jenis_kegiatan'];?></option>
                <?php foreach ($jenis_kegiatan as $key): ?>         
                  <option value="<?=$key['id_jenis_kegiatan'];?>"><?=$key['nama_jenis_kegiatan'];?></option>
                <?php endforeach ?>
              </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="sasaran" class="col-sm-3 col-form-label">Sasaran kegiatan</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="sasaran_kegiatan" value="<?= $kegiatan_data['sasaran_kegiatan'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="indikator" class="col-sm-3 col-form-label">Indikator Kinerja</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="indikator_kinerja_kegiatan" value="<?= $kegiatan_data['indikator_kinerja_kegiatan'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="Satuan" class="col-sm-3 col-form-label">Satuan kegiatan</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="satuan_kegiatan" value="<?= $kegiatan_data['satuan_kegiatan'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_1" class="col-sm-3 col-form-label">Targ-Fis Tahun 1 (<?= $kegiatan_data['tahun_1'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="kf_tahun_1" value="<?= $kegiatan_data['kf_tahun_1'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_1" class="col-sm-3 col-form-label">Targ-Ang Tahun 1 (<?= $kegiatan_data['tahun_1'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="ka_tahun_1" value="<?= $kegiatan_data['ka_tahun_1'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_2" class="col-sm-3 col-form-label">Targ-Fis Tahun 2 (<?= $kegiatan_data['tahun_2'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="kf_tahun_2" value="<?= $kegiatan_data['kf_tahun_2'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_2" class="col-sm-3 col-form-label">Targ-Ang Tahun 2 (<?= $kegiatan_data['tahun_2'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="ka_tahun_2" value="<?= $kegiatan_data['ka_tahun_2'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_3" class="col-sm-3 col-form-label">Targ-Fis Tahun 3 (<?= $kegiatan_data['tahun_3'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="kf_tahun_3" value="<?= $kegiatan_data['kf_tahun_3'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_3" class="col-sm-3 col-form-label">Targ-Ang Tahun 3 (<?= $kegiatan_data['tahun_3'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="ka_tahun_3" value="<?= $kegiatan_data['ka_tahun_3'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_4" class="col-sm-3 col-form-label">Targ-Fis Tahun 4 (<?= $kegiatan_data['tahun_4'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="kf_tahun_4" value="<?= $kegiatan_data['kf_tahun_4'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_4" class="col-sm-3 col-form-label">Targ-Ang Tahun 4 (<?= $kegiatan_data['tahun_4'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="ka_tahun_4" value="<?= $kegiatan_data['ka_tahun_4'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_5" class="col-sm-3 col-form-label">Targ-Fis Tahun 5 (<?= $kegiatan_data['tahun_5'];?>)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="kf_tahun_5" value="<?= $kegiatan_data['kf_tahun_5'];?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tahun_5" class="col-sm-3 col-form-label">Targ-Ang Tahun 5 (<?= $kegiatan_data['tahun_5'];?>)</label>
                <div class="col-sm-9">
                <input type="text" onkeyup="convertToRupiah(this);" class="form-control form-control-sm" name="ka_tahun_5" value="<?= $kegiatan_data['ka_tahun_5'];?>" required>
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
