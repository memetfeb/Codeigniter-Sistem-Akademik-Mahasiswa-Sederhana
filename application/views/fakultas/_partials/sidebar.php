<!-- sidebar -->
<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?php echo site_url('akademik') ?>" class="site_title"><i class="fa fa-futbol-o"></i> <span>Data Fakultas</span></a>
    </div>

    <div class="clearfix"></div>
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section" style="margin-top: 20px">
        <!-- menu sidebar -->
        <ul class="nav side-menu">
          <li><a href="<?php echo site_url('fakultas') ?>"><i class="fa fa-home"></i> Data Mahasiswa <span class="fa fa-chevron"></span></a>
          </li>

        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= site_url('login/logout') ?>" style="width: 100%">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</div>

