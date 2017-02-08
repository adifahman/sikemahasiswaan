    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url('assets'); ?>/dist/img/user.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php if($this->session->userdata('logged_in') != null){echo $this->session->userdata('name');}else{echo 'Guest';}?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Mahasiswa</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <?php if($this->session->userdata('logged_in') != null){?>
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php if($page == 'adm'){echo 'active';} ?>"><a href="<?php echo base_url('mahasiswa'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class="<?php if($page == 'bsw'){echo 'active';} ?>"><a href="<?php echo base_url('mahasiswa/beasiswa'); ?>"><i class="fa fa-graduation-cap"></i> <span>Lihat Beasiswa</span></a></li>
                    <li class="<?php if($page == 'dft'){echo 'active';} ?>"><a href="<?php echo base_url('mahasiswa/daftarbeasiswa'); ?>"><i class="fa fa-graduation-cap"></i> <span>Registrasi Beasiswa</span></a></li>
                <?php } ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>