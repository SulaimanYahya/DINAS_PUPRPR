

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block holis"></div>
                <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img style="height: 23%; width: 23%" src="<?= base_url('assets/img/profile/logo_bonbol.png');?>" class="img-fluid" alt="Responsive image">
                    <h5 class="mt-4 mb-4 gradient-huruf">Sistem Informasi Dashboard PUPRPR</h5>    
                  </div>

                  <?= $this->session->flashdata('message'); ?>

                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username');?>">
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                      <select name="level" class="form-control" required>
                        <option value="">--Level Login--</option>
                        <?php foreach ($level as $key): ?>         
                          <option value="<?=$key['role'];?>"><?=$key['role'];?></option>
                        <?php endforeach ?>
                      </select>
                  </div>
                    
                    <button type="submit" class="btn btn-primary mb-4 btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registration'); ?>">Buat Akun Anggota</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      
    </div>

  </div>

  