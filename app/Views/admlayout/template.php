<?php

use App\Models\MdlPengaturan;

$MdlPengaturan = new MdlPengaturan();
$pengaturan = $MdlPengaturan->first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?= base_url('/front/images/') . $pengaturan['logo']; ?>" rel="shortcut icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <base href="<?= base_url(); ?>">
    <?= view('admlayout/css'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('front/images/')  . $pengaturan['logo']; ?>" alt="Logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-primary fixed-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-light mx-3" href="<?= site_url('/'); ?>" role="button">Beranda</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= site_url('/admadmin'); ?>" class="brand-link">
                <img src="<?= base_url('front/images/')  . $pengaturan['logo']; ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DASHBOARD</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- SidebarSearch Form -->
                <div class="form-inline mt-2">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Tambahkan ikon ke tautan menggunakan kelas .nav-icon
             dengan font-awesome atau pustaka ikon lainnya -->

                        <li class="nav-item <?= in_array($activeMenu, ['dashboard']) ? 'menu-open' : '' ?>">
                            <a href="<?= site_url('/admadmin'); ?>" class="nav-link <?= in_array($activeMenu, ['dashboard']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['data_spanduk', 'tambah_spanduk', 'edit_spanduk']) ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= in_array($activeMenu, ['data_spanduk', 'tambah_spanduk', 'edit_spanduk']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Spanduk
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('/admspanduk'); ?>" class="nav-link <?= $activeMenu == 'data_spanduk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Spanduk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/admspanduk/addspanduk'); ?>" class="nav-link <?= $activeMenu == 'tambah_spanduk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Spanduk</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['data_donasi', 'tambah_donasi', 'edit_donasi']) ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= in_array($activeMenu, ['data_donasi', 'tambah_donasi', 'edit_donasi']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Donasi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('/admdonasi'); ?>" class="nav-link <?= $activeMenu == 'data_donasi' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Donasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/admdonasi/adddonasi'); ?>" class="nav-link <?= $activeMenu == 'tambah_donasi' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Donasi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['data_artikel', 'tambah_artikel', 'edit_artikel']) ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= in_array($activeMenu, ['data_artikel', 'tambah_artikel', 'edit_artikel']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Artikel
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('/admartikel'); ?>" class="nav-link <?= $activeMenu == 'data_artikel' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Artikel</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/admartikel/addartikel'); ?>" class="nav-link <?= $activeMenu == 'tambah_artikel' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Artikel</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['data_transaksi', 'tambah_transaksi', 'edit_transaksi']) ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= in_array($activeMenu, ['data_transaksi', 'tambah_transaksi', 'edit_transaksi']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('/admtransaksi'); ?>" class="nav-link <?= $activeMenu == 'data_transaksi' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Transaksi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/admtransaksi/addtransaksi'); ?>" class="nav-link <?= $activeMenu == 'tambah_transaksi' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Transaksi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['data_pengeluaran', 'tambah_pengeluaran', 'edit_pengeluaran']) ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= in_array($activeMenu, ['data_pengeluaran', 'tambah_pengeluaran', 'edit_pengeluaran']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pengeluaran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('/admpengeluaran'); ?>" class="nav-link <?= $activeMenu == 'data_pengeluaran' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pengeluaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/admpengeluaran/addpengeluaran'); ?>" class="nav-link <?= $activeMenu == 'tambah_pengeluaran' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Pengeluaran</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['data_bank', 'add_bank', 'edit_bank']) ? 'menu-open' : '' ?>">
                            <a href="<?= site_url('/admbank'); ?>" class="nav-link <?= in_array($activeMenu, ['data_bank', 'add_bank', 'edit_bank']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Bank
                                </p>
                            </a>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['laporan']) ? 'menu-open' : '' ?>">
                            <a href="<?= site_url('/admlaporan'); ?>" class="nav-link <?= in_array($activeMenu, ['laporan']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['data_user']) ? 'menu-open' : '' ?>">
                            <a href="<?= site_url('/admuser'); ?>" class="nav-link <?= in_array($activeMenu, ['data_user']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Pengguna
                                </p>
                            </a>
                        </li>

                        <li class="nav-item <?= in_array($activeMenu, ['pengaturan']) ? 'menu-open' : '' ?>">
                            <a href="<?= site_url('/admpengaturan'); ?>" class="nav-link <?= in_array($activeMenu, ['pengaturan']) ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Pengaturan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/admadmin/backupdb'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Backup DB
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/logout'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Keluar
                                </p>
                            </a>
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
                <div class="container-fluid mt-5 pt-4">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('/admadmin') ?>">Home</a></li>

                                <!-- Pengkondisian Breadcrumb Aktif -->
                                <?php if ($activeMenu == 'dashboard') : ?>
                                    <li class="breadcrumb-item active">Dashboard</li>

                                <?php elseif (in_array($activeMenu, ['data_spanduk', 'tambah_spanduk', 'edit_spanduk'])) : ?>
                                    <li class="breadcrumb-item"><a href="<?= site_url('/admspanduk') ?>">Spanduk</a></li>
                                    <?php if ($activeMenu == 'data_spanduk') : ?>
                                        <li class="breadcrumb-item active">Data Spanduk</li>
                                    <?php elseif ($activeMenu == 'tambah_spanduk') : ?>
                                        <li class="breadcrumb-item active">Tambah Spanduk</li>
                                    <?php elseif ($activeMenu == 'edit_spanduk') : ?>
                                        <li class="breadcrumb-item active">Edit Spanduk</li>
                                    <?php endif; ?>

                                <?php elseif (in_array($activeMenu, ['data_donasi', 'tambah_donasi', 'edit_donasi'])) : ?>
                                    <li class="breadcrumb-item"><a href="<?= site_url('/admdonasi') ?>">Donasi</a></li>
                                    <?php if ($activeMenu == 'data_donasi') : ?>
                                        <li class="breadcrumb-item active">Data Donasi</li>
                                    <?php elseif ($activeMenu == 'tambah_donasi') : ?>
                                        <li class="breadcrumb-item active">Tambah Donasi</li>
                                    <?php elseif ($activeMenu == 'edit_donasi') : ?>
                                        <li class="breadcrumb-item active">Edit Donasi</li>
                                    <?php endif; ?>

                                <?php elseif (in_array($activeMenu, ['data_artikel', 'tambah_artikel', 'edit_artikel'])) : ?>
                                    <li class="breadcrumb-item"><a href="<?= site_url('/admartikel') ?>">Artikel</a></li>
                                    <?php if ($activeMenu == 'data_artikel') : ?>
                                        <li class="breadcrumb-item active">Data Artikel</li>
                                    <?php elseif ($activeMenu == 'tambah_artikel') : ?>
                                        <li class="breadcrumb-item active">Tambah Artikel</li>
                                    <?php elseif ($activeMenu == 'edit_artikel') : ?>
                                        <li class="breadcrumb-item active">Edit Artikel</li>
                                    <?php endif; ?>

                                <?php elseif (in_array($activeMenu, ['data_transaksi', 'tambah_transaksi', 'edit_transaksi'])) : ?>
                                    <li class="breadcrumb-item"><a href="<?= site_url('/admtransaksi') ?>">Transaksi</a></li>
                                    <?php if ($activeMenu == 'data_transaksi') : ?>
                                        <li class="breadcrumb-item active">Data Transaksi</li>
                                    <?php elseif ($activeMenu == 'tambah_transaksi') : ?>
                                        <li class="breadcrumb-item active">Tambah Transaksi</li>
                                    <?php elseif ($activeMenu == 'edit_transaksi') : ?>
                                        <li class="breadcrumb-item active">Edit Transaksi</li>
                                    <?php endif; ?>


                                <?php elseif (in_array($activeMenu, ['data_pengeluaran', 'tambah_pengeluaran', 'edit_pengeluaran'])) : ?>
                                    <li class="breadcrumb-item"><a href="<?= site_url('/admpengeluaran') ?>">Pengeluaran</a></li>
                                    <?php if ($activeMenu == 'data_pengeluaran') : ?>
                                        <li class="breadcrumb-item active">Data Pengeluaran</li>
                                    <?php elseif ($activeMenu == 'tambah_pengeluaran') : ?>
                                        <li class="breadcrumb-item active">Tambah Pengeluaran</li>
                                    <?php elseif ($activeMenu == 'edit_pengeluaran') : ?>
                                        <li class="breadcrumb-item active">Edit Pengeluaran</li>
                                    <?php endif; ?>

                                <?php elseif (in_array($activeMenu, ['data_user', 'tambah_user', 'edit_user'])) : ?>
                                    <li class="breadcrumb-item"><a href="<?= site_url('/admuser') ?>">Pengguna</a></li>
                                    <?php if ($activeMenu == 'data_user') : ?>
                                        <li class="breadcrumb-item active">Data Pengguna</li>
                                    <?php elseif ($activeMenu == 'tambah_user') : ?>
                                        <li class="breadcrumb-item active">Tambah Pengguna</li>
                                    <?php elseif ($activeMenu == 'edit_user') : ?>
                                        <li class="breadcrumb-item active">Edit Pengguna</li>
                                    <?php endif; ?>

                                <?php elseif (in_array($activeMenu, ['data_bank', 'add_bank', 'edit_bank'])) : ?>
                                    <li class="breadcrumb-item"><a href="<?= site_url('/admbank') ?>">Bank</a></li>
                                    <?php if ($activeMenu == 'data_bank') : ?>
                                        <li class="breadcrumb-item active">Data Bank</li>
                                    <?php elseif ($activeMenu == 'add_bank') : ?>
                                        <li class="breadcrumb-item active">Tambah Bank</li>
                                    <?php elseif ($activeMenu == 'edit_bank') : ?>
                                        <li class="breadcrumb-item active">Edit Bank</li>
                                    <?php endif; ?>

                                <?php elseif ($activeMenu == 'pengaturan') : ?>
                                    <li class="breadcrumb-item active">Pengaturan</li>

                                <?php elseif ($activeMenu == 'laporan') : ?>
                                    <li class="breadcrumb-item active">Laporan</li>
                                <?php endif; ?>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <?= $this->renderSection('content'); ?>
            <br /><br /><br />
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer" style="width: 100% !important;left: 0;bottom: 0; position: fixed;z-index: 999;">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.1
            </div>
            <strong>Copyright &copy; <?= date('Y'); ?> <?= $pengaturan['nama_yayasan']; ?>.</strong>
            All rights reserved.&nbsp;
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?= view('admlayout/js'); ?>
    <?= $this->renderSection('script'); ?>
</body>

</html>