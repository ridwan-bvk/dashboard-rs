<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <?php
            if ($status == 'rekap') {
            ?>
                <ul class="navbar-nav">
                    <!-- button push menu -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li> -->
                    <!--  -->
                    <!-- <ul class="nav nav-pills h5" id="pills-tab" role="tablist" style="fon">
                        <li class="nav-item ">
                            <a class="nav-link active " id="" data-toggle="pill" href="<?= base_url('DashboardRekap') ?>" role="tab" aria-controls="pills-home" aria-selected="<?= ($status == 'rekap') ? true : false ?>">Rekap Pertanggal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Rekap Perbulan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Detail</a>
                        </li>
                    </ul> -->
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="<?= base_url('DashboardRekap') ?>" class="nav-link  ">
                            <button class="btn btn-sm btn-success" type="button">Pertanggal</button></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">

                        <a href="<?= base_url('DashboardRekap/rekap_perbulan') ?>" class="nav-link ">
                            <button class="btn btn-sm btn-success" type="button" aria-disabled="<?= ($status == 'rekap') ? false : true ?>">Perbulan</button>

                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">

                        <a href="<?= base_url('DashboardRekap/rekap_persentase_sep') ?>" class="nav-link ">
                            <button class="btn btn-sm btn-success" type="button" aria-disabled="<?= ($status == 'rekap') ? false : true ?>">Persentase SEP</button>

                        </a>
                    </li>
                </ul>
            <?php } elseif ($status == 'detail') { ?>
                <!-- <h5><?= $title ?></h5> -->
            <?php
            };
            ?>

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

            <!-- Right navbar links -->
            <!-- <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
                </li>
            </ul> -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="false" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="<?= base_url('assets') ?>/img/logo-kota-banjar.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1.8">
                <span class="brand-text font-weight-light">RSUD KOTA BANJAR</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Monitoring Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('DashboardRekap') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>Rekap</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('DashboardDetail') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Detail</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </nav>
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark col-sm-8"><?= $title ?></h5>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">