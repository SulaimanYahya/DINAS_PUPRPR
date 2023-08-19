</div>


<!-- Popup Modal -->

<div class="modal fade" id="<?= $this->session->flashdata('kode_berhasil'); ?>" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-success" style="border-radius: 20px;">
          <div class="modal-header">
            <h3 class="modal-title text-white" id="newDataModalLabel">Berhasil!</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="text-white">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">

        <div class="form-group">
            <i class="fas fa-check-circle fa-6x text-white mt-4"></i>
        </div>
        <div class="form-group">
            <h4 class="modal-title text-white mb-4" id="newDataModalLabel"><?= $this->session->flashdata('pesan_berhasil'); ?></h4>
        </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i>&nbsp;Tutup</button>
          </div>

        </div>
      </div>
    </div>


    <div class="modal fade" id="<?= $this->session->flashdata('kode_gagal'); ?>" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger" style="border-radius: 20px;">
          <div class="modal-header">
            <h3 class="modal-title text-white" id="newDataModalLabel">Gagal!</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="text-white">&times;</span>
            </button>
          </div>

          <div class="modal-body text-center">

        <div class="form-group">
            <i class="fas fa-times-circle fa-6x text-white mt-4"></i>
        </div>
        <div class="form-group">
            <h4 class="modal-title text-white mb-4" id="newDataModalLabel"><?= $this->session->flashdata('pesan_gagal'); ?></h4>
        </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i>&nbsp;Tutup</button>
          </div>

        </div>
      </div>
    </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-gradient-light">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class="text-white">Copyright &copy; STMIK Ichsan Gorontalo <?= date('Y')?> Beta Version</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout/').$user['id_user']; ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">

  function convertToRupiah(objek) {
    separator = ",";
    a = objek.value;
    b = a.replace(/[^\d]/g,"");
    c = "";
    panjang = b.length; 
    j = 0; 
    for (i = panjang; i > 0; i--) {
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)) {
        c = b.substr(i-1,1) + separator + c;
      } else {
        c = b.substr(i-1,1) + c;
      }
    }
    objek.value = c;

  }       

  function convertToAngka()
  { var nominal= document.getElementById("nominal").value;
    var angka = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
    document.getElementById("angka").innerHTML= angka;
  }       

  function convertToAngka()
  { var nominal1= document.getElementById("nominal1").value;
    var angka1 = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
    document.getElementById("angka1").innerHTML= angka;
  }


  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script type="text/javascript">
    function cek_database(){
        var id = $("#id").val();
        $.ajax({
            url: '<?= base_url();?>ajax.php',
            data:"id="+id ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama').val(obj.nama);
            $('#jen_kel').val(obj.jen_kel);
            $('#no_kamar').val(obj.no_kamar);
            $('#jenis_kamar').val(obj.jenis_kamar);
            $('#angsuran').val(obj.angsuran);
 
        
        });
    }
</script>

</body>

</html>
