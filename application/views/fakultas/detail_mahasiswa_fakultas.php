<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("fakultas/_partials/head.php") ?>
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php $this->load->view("fakultas/_partials/sidebar.php") ?>
      <!-- top navigation -->
      <?php $this->load->view("fakultas/_partials/navbar.php") ?>
      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <!-- form Edit -->
            <div class="card mb-3">
              <div class="card-header">
                <a href="<?php echo site_url('fakultas') ?>"><i class="fa fa-arrow-left"></i> Back</a>
              </div>
              <div class="card-body x_content">
                <div class="x_title">
                  <h2 class="col-md-12 col-sm-12" style="text-align: center;"> Detail Mahasiswa </h2>
                  <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#editModal" class="btn btn-success"><i class="fa fa-plus"></i> Edit Mahasiswa</a></ul>
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
      <?php $this->load->view("fakultas/_partials/footer.php") ?>
      <!-- /footer content -->
    </div>
  </div>

<!-- Edit -->
<div class="modal fade" id="editModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Edit No. <?php echo $mahasiswa->id_mahasiswa ?> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?php echo site_url('fakultas/edit/'.$mahasiswa->id_mahasiswa) ?>" method="post">
          <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="NIM">NIM</label>
              <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="NIM" placeholder="Nomor Induk Siswa" required value="<?php echo $mahasiswa->NIM ?>" />
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_mahassiswa">Nama Mahasiswa</label>
              <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="nama_mahasiswa" placeholder="Nama Mahasiswa" required value="<?php echo $mahasiswa->nama_mhs ?>" />
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="prodi">Program Studi</label>
              <div class="col-md-6 col-sm-6 ">
                <select class="select2_single form-control" name="prodi" tabindex="-1">
                  <?php foreach ($prodi as $prodi): ?>
                    <?php 
                      if ($prodi->id_prodi == $mahasiswa->prodi){
                        echo "<option value=".$prodi->id_prodi."selected >".$prodi->nama_prodi."</option>;" ;   
                      }
                    ?>
                    <option value="<?php echo $prodi->id_prodi ?>"><?php echo $prodi->nama_prodi ?></option>';
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
              <div class="col-md-6 col-sm-6 ">
                <textarea class="form-control" name="alamat" required ><?php echo $mahasiswa->alamat ?></textarea>
              </div>
            </div>


            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_lahir">Tanggal Lahir</label>
              <div class="col-md-6 col-sm-6 ">
                <div class='input-group date myDatepicker2' >
                  <input type="text" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required value="<?php echo $mahasiswa->tgl_lahir?>" />
                  <span class="input-group-addon" style="padding-top: 10px">
                    <span class="fa fa-calendar-o"></span>
                  </span>
                </div>
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Gender</label>
              <div class="col-md-6 col-sm-6 ">
                <input type="radio" id="gender" name="gender" value="P" <?php 
                      if ($mahasiswa->gender == "P"){
                        echo "checked" ;   
                      }
                    ?>>
                <label for="pria">Pria</label><br>
                <input type="radio" id="gender" name="gender" value="W" <?php 
                      if ($mahasiswa->gender == "W"){
                        echo "checked" ;   
                      }
                    ?>>
                <label for="wanita">Wanita</label><br>

              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Agama</label>
              <div class="col-md-6 col-sm-6 ">
                <select class="select2_single form-control" name="agama" tabindex="-1" required>
                  
                  <option value="Islam" <?php 
                      if ($mahasiswa->agama == "Islam"){
                        echo "selected" ;   
                      }
                    ?>>Islam</option>
                  <option value="Kristen" <?php 
                      if ($mahasiswa->agama == "Kristen"){
                        echo "selected" ;   
                      }
                    ?>>Kristen</option>
                  <option value="Katholik <?php 
                      if ($mahasiswa->agama == "Katholik"){
                        echo "selected" ;   
                      }
                    ?>">Katholik</option>
                  <option value="Hindu" <?php 
                      if ($mahasiswa->agama == "Hindu"){
                        echo "selected" ;   
                      }
                    ?>>Hindu</option>
                  <option value="Budha" <?php 
                      if ($mahasiswa->agama == "Budha"){
                        echo "selected" ;   
                      }
                    ?>>Budha</option>
                  <option value="Kepercayaan Lain" <?php 
                      if ($mahasiswa->agama == "Kepercayaan Lain"){
                        echo "selected" ;   
                      }
                    ?>>Kepercayaan Lain</option>
                </select>
              </div>
            </div>
          
          <br>
          <div class="modal-footer">  
            <button type="submit" class="btn btn-success">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- jQuery -->
  <?php $this->load->view("fakultas/_partials/js.php") ?>
  <!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?php echo base_url().'js/jquery-ui.js'?>" type="text/javascript"></script>
<!-- bootstrap-datetimepicker -->    
<script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
<!-- Initialize datetimepicker -->
<script  type="text/javascript"> 
  $('.myDatepicker2').datetimepicker({
    format: 'DD/MM/YYYY'
  });
  $('#myDatepicker3').datetimepicker({
    format: 'YYYY'
  });  
</script>

</body>
</html>