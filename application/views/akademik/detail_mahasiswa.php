<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("akademik/_partials/head.php") ?>
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php $this->load->view("akademik/_partials/sidebar.php") ?>
      <!-- top navigation -->
      <?php $this->load->view("akademik/_partials/navbar.php") ?>
      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <!-- form Edit -->
            <div class="card mb-3">
              <div class="card-header">
                <a href="<?php echo site_url('akademik') ?>"><i class="fa fa-arrow-left"></i> Back</a>
              </div>
              <div class="card-body x_content">
                <div class="x_title">
                  <h2 class="col-md-12 col-sm-12" style="text-align: center;"> Detail Mahasiswa </h2>
                  <div class="clearfix"></div>  
                </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-6 col-sm-6 label-align" for="nama_siswa">NIM </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label label-align" for="nama_siswa"><?php echo $mahasiswa->NIM ?></label>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-6 col-sm-6 label-align" for="nama_siswa">Nama : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label label-align" for="nama_siswa"><?php echo $mahasiswa->nama_mhs ?></label>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-6 col-sm-6 label-align" for="nama_siswa">Alamat : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label label-align" for="nama_siswa"><?php echo $mahasiswa->alamat ?></label>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-6 col-sm-6 label-align" for="nama_siswa">Tanggal Lahir : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label label-align" for="nama_siswa"><?php echo $mahasiswa->tgl_lahir ?></label>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-6 col-sm-6 label-align" for="nama_siswa">Gender : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label 6label-align" for="nama_siswa"><?php 
                      if ($mahasiswa->gender == "P"){
                        echo "Pria";
                      }else{
                        echo "Wanita";
                      }
                     ?></label>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-6 col-sm-6 label-align" for="nama_siswa">Agama : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label label-align" for="nama_siswa"><?php echo $mahasiswa->agama ?></label>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-6 col-sm-6 label-align" for="nama_siswa">Fakultas : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label label-align" for="nama_siswa"><?php echo $mahasiswa->nama_fakultas ?></label>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-6 col-sm-6 label-align" for="nama_siswa">Program Studi : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label label-align" for="nama_siswa"><?php echo $mahasiswa->nama_prodi ?></label>
                    </div>
                  </div>
                  
              </div>
            </div>
            <!-- /form Tambah -->
          </div>
        </div>
        <br />
      </div>
      <!-- /page content -->
      <!-- footer content -->
      <?php $this->load->view("akademik/_partials/footer.php") ?>
      <!-- /footer content -->
    </div>
  </div>
  <!-- MODAL -->
  <?php $this->load->view("akademik/_partials/modal.php") ?>
  <!-- jQuery -->
  <?php $this->load->view("akademik/_partials/js.php") ?>
</body>
</html>