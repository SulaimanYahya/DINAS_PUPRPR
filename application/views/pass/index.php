
        <!-- Begin Page Content -->
        <div class="container-fluid holis" style="height: 90%">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Change Password</h1>

          <div class="row">
          	<div class="col-lg-7">
          	<?= $this->session->flashdata('message'); ?>
         			<form method="post" action="pass/edit_password">
         				<div class="form-group row">
        			    <label for="isi_info" class="col-sm-3 col-form-label">New password</label>
        				    <div class="col-sm-7">
        				    	<input type="hidden" name="id_admin" id="id_admin" value="<?= $user['id'];?>">
        				    	<input type="password" name="password_baru" id="password_baru" class="form-control" required>
        				    </div>
        				 </div>
        				  
        				  <div class="form-group row justify-content-end">
        				  	<div class="col-sm-9">
        				  		<button type="submit" class="btn btn-info btn-icon-split"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-edit"></i>
                                </span>
                                <span class="text">Perbaharui</span></button>
        				  	</div>
        				  </div>
              </div>
         			</form>
          		
          </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->