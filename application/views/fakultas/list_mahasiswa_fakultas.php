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
            <?php if ($this->session->flashdata('success')) { ?>
              <div class="alert alert-success" role="alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            <?php } else if($this->session->flashdata('error')){ ?>  
              <div class="alert alert-danger">  
                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
              </div>  
            <?php } else if($this->session->flashdata('warning')){ ?>  
              <div class="alert alert-warning">  
                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>  
              </div>  
            <?php } else if($this->session->flashdata('info')){ ?>  
              <div class="alert alert-info">  
                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>  
              </div>  
            <?php } ?>
            <div class="x_panel">
              <div class="x_title">
                <h2>Data Mahasiswa <?php echo $nama_fakultas->nama_fakultas ?></h2>
                <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Mahasiswa</a></ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                     <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>Fakultas</th>
                          <th>Program Studi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $j = 1; ?>
                        <?php foreach ($mhs_fakultas as $data_mahasiswa): ?>
                          <tr>
                            <td align="center" width="10"><?php echo $j ?></td>
                            <td><?php echo $data_mahasiswa->NIM ?></td>
                            <td><?php echo $data_mahasiswa->nama_mhs ?></td>
                            <td><?php echo $data_mahasiswa->nama_fakultas ?></td>
                            <td><?php echo $data_mahasiswa->nama_prodi ?></td>
                            
                            <td align="center">
                              <a href="<?php echo site_url('fakultas/detail/'.$data_mahasiswa->NIM) ?>" style="margin-right: 10px"><i class="fa fa-edit"></i> Detail</a>
                              <a onclick="deleteConfirm('<?php echo site_url('fakultas/delete/'.$data_mahasiswa->NIM) ?>')" href="#!" ><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                          </tr>
                          <?php $j++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /DataTables -->
      </div>
      <br />
    </div>
    <!-- /page content -->
    <!-- footer content -->
    <?php $this->load->view("fakultas/_partials/footer.php") ?>
    <!-- /footer content -->
  </div>
</div>

<!-- Modal Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Tambah Mahasiswa <?php echo $nama_fakultas->nama_fakultas ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-md-12 col-sm-12">  
          <form action="<?php echo site_url('fakultas/add') ?>" method="post" enctype="multipart/form-data" >
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="NIM">NIM</label>
              <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="NIM" placeholder="Nomor Induk Siswa" required />
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_mahassiswa">Nama Mahasiswa</label>
              <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="nama_mahasiswa" placeholder="Nama Mahasiswa" required/>
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="prodi">Program Studi</label>
              <div class="col-md-6 col-sm-6 ">
                <select class="select2_single form-control" name="prodi" tabindex="-1">
                  <?php foreach ($prodi as $prodi): ?>
                    <option value="<?php echo $prodi->id_prodi ?>"><?php echo $prodi->nama_prodi ?></option>';
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
              <div class="col-md-6 col-sm-6 ">
                <textarea class="form-control" name="alamat" required></textarea>
              </div>
            </div>


            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_lahir">Tanggal Lahir</label>
              <div class="col-md-6 col-sm-6 ">
                <div class='input-group date myDatepicker2' >
                  <input type="text" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required/>
                  <span class="input-group-addon" style="padding-top: 10px">
                    <span class="fa fa-calendar-o"></span>
                  </span>
                </div>
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Gender</label>
              <div class="col-md-6 col-sm-6 ">
                <input type="radio" id="gender" name="gender" value="P" selected>
                <label for="pria">Pria</label><br>
                <input type="radio" id="gender" name="gender" value="W">
                <label for="wanita">Wanita</label><br>

              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Agama</label>
              <div class="col-md-6 col-sm-6 ">
                <select class="select2_single form-control" name="agama" tabindex="-1" required>
                  <option value="Islam" selected>Islam</option>
                  <option value="Kristen">Krister</option>
                  <option value="Katholik">Katholik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Kepercayaan Lain">Kepercayaan Lain</option>
                </select>
              </div>
            </div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <input class="btn btn-success" type="submit" name="btn" value="Save" />
              </div>
            </div>
          </form>
        </div> 
      </div>
      <div class="modal-footer">
        <div class="col-md-12 col-sm-12">  
          <div class="col-md-12">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- js -->


<!-- jQuery -->
<script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/iCheck/icheck.min.js') ?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url('assets/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
<script src="<?php echo base_url('assets/jszip/dist/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/pdfmake/build/vfs_fonts.js') ?>"></script>
</script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('js/custom.min.js') ?>"></script>
<!-- uang --> 
<script src="<?php echo base_url('https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js') ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?php echo base_url().'js/jquery-ui.js'?>" type="text/javascript"></script>
<!-- bootstrap-datetimepicker -->    
<script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>

<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>

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
<script>
  function myFunction() {
    var x = document.getElementById("gender").required;
    document.getElementById("demo").innerHTML = x;
  }</script>
</body>
</html>
