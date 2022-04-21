<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>src/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href=" <?php echo base_url(); ?>src/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link href="<?php echo base_url(); ?>src/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?> https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" <?php echo base_url(); ?>src/css/sb-admin-2.min.css" rel="stylesheet">
    <link href=" <?php echo base_url(); ?>src/css/style.css" rel="stylesheet">
    <link href=" <?php echo base_url(); ?>src/css/sweetalert.min.css" rel="stylesheet">
    <link href=" <?php echo base_url(); ?>src/css/wadah.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>src/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>leaflet/leaflet.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>leaflet/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= base_url('src/assets/js/bootstrap.min.js'); ?>"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?= base_url('src/assets/js/jquery.metisMenu.js'); ?>"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?= base_url('src/assets/js/custom.js'); ?>"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/index'); ?>">
                    <i class="fas fa-house-user"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php if ($users['level_user'] == "Admin") : ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Data
                </div>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengguna" aria-expanded="true" aria-controls="pengguna">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User</span>
                    </a>
                    <div id="pengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo base_url('user/admin'); ?>">Admin</a>
                            <a class="collapse-item" href="<?php echo base_url('walikelas/index'); ?>">Wali Kelas</a>
                            <a class="collapse-item" href="<?php echo base_url('siswa/index'); ?>">Siswa</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->

                <!-- Heading -->


                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-address-book"></i>
                        <span>Unit</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo base_url('perusahaan/index'); ?>">Perusahaan</a>
                            <a class="collapse-item" href="<?php echo base_url('sekolah/index'); ?>">Sekolah</a>
                            <a class="collapse-item" href="<?php echo base_url('jurusan/index'); ?>">Jurusan</a>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider my-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('user/riwayat'); ?>">
                        <i class="fas fa-fw fa-history"></i>
                        <span>History</span></a>
                </li>

            <?php endif; ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if ($users['level_user'] == "Wali Kelas") : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('walikelas/riwayat_data'); ?>">
                        <i class="fas fa-fw fa-history"></i>
                        <span>History</span></a>
                </li>

            <?php endif; ?>
            <!-- Divider -->



            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->


        <!-- Begin Page Content -->



        <!-- End of Main Content -->

        <!-- Footer -->