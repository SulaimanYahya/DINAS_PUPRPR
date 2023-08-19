
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 my-4">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block holis"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Registrasi Anggota</h1>
              </div>
              <form class="user" method="post" enctype="multipart/form-data" action="<?= base_url('auth/registration'); ?>">
                <?php echo form_open_multipart('auth/registration');?>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <input type="text" maxlength="16" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan NIK Anda" value="<?= set_value('nik');?>">
                      <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap Anda" value="<?= set_value('name');?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Alamat" value="<?= set_value('address');?>">
                  <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" maxlength="12" id="no_telpon" name="no_telpon" placeholder="No. Telepon" value="<?= set_value('no_telpon');?>">
                  <?= form_error('no_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <select name="jen_kel" class="form-control form-control-sm" required>
                    <option value="">--Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="row">
                  <div class="col-6">
                    <input type="text" class="form-control form-control-user" placeholder="Tempat Lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir');?>">
                  </div>
                  <div class="col-6">
                    <div class="input-group mb-3 input-group">
                           <div class="input-group-prepend">
                             <span class="input-group-text"><i class="fas fa-fw fa-calendar"></i></span>
                          </div>
                          <input placeholder="Tanggal Lahir" type="text" class="form-control form-control-user datepicker" name="tanggal_lahir" value="<?= set_value('tanggal_lahir');?>">
                        </div>
                  </div>
                </div>
                <div class="form-group small">
                  <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                    <label class="custom-file-label" for="gambar" name="gambar" aria-describedby="gambar">Masukkan Foto</label>
                  </div>
                </div>
              </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar
                </button>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      </div>

    </div>

  </div>