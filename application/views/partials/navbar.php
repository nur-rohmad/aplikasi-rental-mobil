<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= "bianca rentcar" ?> - <?= $judul ?></title>
    <link rel="icon" href="<?= base_url('assets/sb-admin-2') ?>/img/logo_biancarentcar.png">
    <link href="<?= base_url('assets/sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin-2') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin-2') ?>/vendor/fullcalendar/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/sb-admin-2/'); ?>vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/sb-admin-2/'); ?>vendor/datatables-buttons/css/buttons.bootstrap4.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-car"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Rental Mobil</div>
            </a>

            <?php if ($_SESSION['user']['role'] == 'admin') : ?>
                <hr class="sidebar-divider my-0">
                <li class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Master Mobil
                </div>

                <li class="nav-item <?= $this->uri->segment(1) == 'merk' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('merk') ?>">
                        <i class="fas fa-fw fa-columns"></i>
                        <span>Data Merk</span>
                    </a>
                </li>
                <li class="nav-item <?= $this->uri->segment(1) == 'mobil' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('mobil') ?>">
                        <i class="fas fa-fw fa-car-alt"></i>
                        <span>Data Mobil</span>
                    </a>
                </li>

                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Master Sopir
                </div>

                <li class="nav-item <?= $this->uri->segment(1) == 'sopir' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('sopir') ?>">
                        <i class="fas fa-id-card"></i>
                        <span>Data Sopir</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Master Pemesan
                </div>

                <li class="nav-item <?= $this->uri->segment(1) == 'pemesan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('pemesan') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pemesan</span>
                    </a>
                </li>


                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Master Pesanan
                </div>


                <li class="nav-item <?= $this->uri->segment(1) == 'pesanan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('pesanan') ?>">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span>Data Pesanan</span>
                    </a>
                </li>

                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Master Laporan
                </div>

                <li class="nav-item <?= $this->uri->segment(1) == 'laporan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('laporan') ?>">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Pengaturan
                </div>

                <li class="nav-item <?= $this->uri->segment(1) == 'akun' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('akun') ?>">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Manajemen Akun</span>
                    </a>
                </li>
            <?php elseif ($_SESSION['user']['role'] == 'pengguna') : ?>
                <hr class="sidebar-divider my-0">
                <li class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Master Pemesan
                </div>

                <li class="nav-item <?= $this->uri->segment(1) == 'pemesan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('pemesan') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pemesan</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Master Pesanan
                </div>

                <li class="nav-item <?= $this->uri->segment(1) == 'pesanan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('pesanan') ?>">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span>Data Pesanan</span>
                    </a>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Master Mobil
                </div>


                <li class="nav-item <?= $this->uri->segment(1) == 'mobil' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('mobil') ?>">
                        <i class="fas fa-fw fa-car-alt"></i>
                        <span>Data Mobil</span>
                    </a>
                </li>

            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>