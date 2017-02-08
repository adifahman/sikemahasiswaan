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
                    <p><?php echo $this->session->userdata('name'); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata('privilege'); ?></a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php if($page == 'adm'){echo 'active';} ?>"><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li class="treeview <?php if($page == 'prf'){echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-building"></i> <span>Pemberi Beasiswa</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($page == 'prf'){echo 'active';} ?>"><a href="<?php echo base_url('admin/profile'); ?>"><i class="fa fa-user"></i> Profil</a></li>
                    </ul>
                </li>  
                <li class="<?php if($page == 'bsw' || $page == 'dbs' || $page == 'dft' || $page == 'pen'){echo 'active';} ?> treeview">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i> <span>Beasiswa</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    
                    <ul class="treeview-menu">
                        <li class="<?php if($page == 'bsw'){echo 'active';} ?>"><a href="<?php echo base_url('admin/beasiswa'); ?>"><i class="fa fa-graduation-cap"></i> Beasiswa</a></li>
                        <li class="<?php if($page == 'dbs'){echo 'active';} ?>"><a href="<?php echo base_url('admin/detailbeasiswa'); ?>"><i class="fa fa-graduation-cap"></i> Detail Beasiswa</a></li>
                        <li class="<?php if($page == 'dft'){echo 'active';} ?>"><a href="<?php echo base_url('admin/pendaftar'); ?>"><i class="fa fa-graduation-cap"></i> Pendaftar Beasiswa</a></li>
                        <li class="<?php if($page == 'pen'){echo 'active';} ?>"><a href="<?php echo base_url('admin/penerima'); ?>"><i class="fa fa-graduation-cap"></i> Penerima Beasiswa</a></li>
                    </ul>
                </li>  
<!--                <li class="<?php if($page == 'bsw' || $page == 'dbs'){echo 'active';} ?> treeview">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i> <span>Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    
                    <ul class="treeview-menu">
                        <li class="<?php if($page == 'bsw'){echo 'active';} ?>"><a href="<?php echo base_url(''); ?>"><i class="fa fa-graduation-cap"></i> Rekap Beasiswa</a></li>
                        <li class="<?php if($page == 'dbs'){echo 'active';} ?>"><a href="<?php echo base_url(''); ?>"><i class="fa fa-graduation-cap"></i> Rekap Penerima Beasiswa</a></li>
                    </ul>
                </li>  -->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>