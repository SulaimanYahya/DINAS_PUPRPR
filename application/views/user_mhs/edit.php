
        <!-- Begin Page Content -->
        <div class="container-fluid holis" style="height: 90%">

          <!-- Page Heading -->
          <div class="row">
          	<div class="col-sm-2"><a href="<?= base_url('user_mhs');?>" class="btn btn-warning btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
                      </span>
                      <span class="text small">Kembali</span>
                  </a></div>
          	<div class="col-sm-9"><h1 class="h3 mb-4 text-gray-800"><?=$user['nim'];?></h1></div>
          </div>

          <div class="row">
          	<div class="col-lg-7">
          	<?php echo form_open_multipart('user_mhs/edit_proses');?>
	          	<div class="form-group row">
				    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
				    <div class="col-sm-9">
				    <input type="hidden" name="nim" value="<?= $user['nim'];?>">
				    <input type="text" class="form-control" name="nama" value="<?= $user['nama'];?>" required>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
				    <div class="col-sm-9">
				    <input type="text" maxlength="16" class="form-control" name="nik" value="<?= $user['nik'];?>" required>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tmpt Lhr</label>
				    <div class="col-sm-9">
				    <input type="text" class="form-control" name="tempat_lahir" value="<?= $user['tempat_lahir'];?>" required>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tggl Lhr</label>
				    <div class="col-sm-9">
				    <input placeholder="Tanggal Lahir" type="text" class="form-control datepicker" name="tanggal_lahir" value="<?= $user['tanggal_lahir'];?>" required>
				    </div>
				</div>

				<div class="form-group row">
                <label for="jen_kel" class="col-sm-3 col-form-label">Jenkel</label>
                <div class="col-sm-9">
                  <select class="form-control form-control-sm" name="jen_kel" required>
                    <option value="<?= $user['jen_kel'];?>"><?= $user['jen_kel'];?></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

				<div class="form-group row">
				    <label for="no_wa" class="col-sm-3 col-form-label">Whatsapp</label>
				    <div class="col-sm-9">
				    <input type="text" maxlength="12" class="form-control" name="no_wa" value="<?= $user['no_wa'];?>" required>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="email" class="col-sm-3 col-form-label">Email</label>
				    <div class="col-sm-9">
				    <input type="text" class="form-control" name="email" value="<?= $user['email'];?>" required>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="npwp" class="col-sm-3 col-form-label">NPWP</label>
				    <div class="col-sm-9">
				    <input type="text" maxlength="30" class="form-control" name="npwp" value="<?= $user['npwp'];?>" required>
				    </div>
				</div>

				<div class="form-group row">
				    <div class="col-sm-3">Gambar</div>
				    <div class="col-sm-9">
				    <div class="row">
				    	<div class="col-sm-3">
				    		<img src="<?= base_url('assets/img/gambar/'). $user['foto_mhs'];?>" class="img-thumbnail">
				    	</div>
				    	<div class="col-sm-9">
				    		<div class="custom-file">
				    		<input type="hidden" name="gambar_lama" id="gambar_lama" value="<?= $user['foto_mhs'];?>">
						    	<input type="file" class="custom-file-input" id="gambar" name="gambar">
						    	<label class="custom-file-label" for="gambar" aria-describedby="gambar">Pilih Gambar</label>
						  </div>
				    	</div>
				    </div>			    	
				    </div>
				</div>
			  <div class="form-group row justify-content-end">
			  	<div class="col-sm-9">
			  		<button type="submit" class="btn btn-info btn-icon-split"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">Perbaharui</span></button>
			  	</div>
			  </div>
          	</div>
          </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->