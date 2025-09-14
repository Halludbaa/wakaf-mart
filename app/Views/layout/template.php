<?php

use App\Models\MdlPengaturan;

$MdlPengaturan = new MdlPengaturan();
$pengaturan = $MdlPengaturan->first();
$auth = service('authentication');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('/front/images/') . $pengaturan['logo']; ?>" rel="shortcut icon">
    <title><?= $title; ?> - <?= $pengaturan['nama_yayasan']; ?></title>
    <?= view('layout/css'); ?>
    <style>
        .navbar-brand .yayasan-nama {
            max-width: 250px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
    </style>

    <?= $this->renderSection('style'); ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary fixed-top" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?= site_url('/'); ?>">
                <img src="<?= base_url('/front/images/') . $pengaturan['logo']; ?>" width="40" alt="Logo">
                <span class="yayasan-nama text-truncate"><?= $pengaturan['nama_yayasan']; ?></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == 'Profil' ? 'active' : ''); ?>" href="<?= site_url('/profil'); ?>">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == 'Donasi' ? 'active' : ''); ?>" href="<?= site_url('/donasi'); ?>">Donasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == 'Artikel' ? 'active' : ''); ?>" href="<?= site_url('/artikel'); ?>">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == 'Laporan' ? 'active' : ''); ?>" href="<?= site_url('/laporan'); ?>">Laporan</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="<?= site_url('/search'); ?>" method="GET">
                    <input class="form-control me-3" type="search" name="query" placeholder="Cari" aria-label="Search">
                </form>
                &nbsp;
                <ul class="navbar-nav">
                    <?php if (($auth->check())) { ?>
                        <li class="nav-item dropdown pe-3">
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                <img src="<?= base_url('front/images/profile-img.jpg'); ?>" width="20" alt="Profile" class="rounded-circle">
                                <span class="dropdown-toggle ps-2"><?= $auth->user()->toArray()['username']; ?></span>
                            </a><!-- End Profile Iamge Icon -->

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6 class="mb-0"><?= $auth->user()->toArray()['email']; ?></h6>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('/admadmin'); ?>">
                                        <i class="bi bi-grid"></i>&nbsp;
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('/logout'); ?>">
                                        <i class="bi bi-box-arrow-right"></i>&nbsp;
                                        <span>Sign Out</span>
                                    </a>
                                </li>
                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->
                    <?php } else { ?>
                        <li class="nav-item me-3"><a href="<?= base_url('login'); ?>" class="btn btn-outline-dark"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <div class="footer my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 text-md-left mb-3 mb-md-0">
                    <h4 class="fw-bold font-lg">Kontak Kami</h4>
                    <p class="font-sm font-medium"><i class="bi bi-geo-alt-fill"></i> <?= $pengaturan['alamat1']; ?></p>
                    <?php if ($pengaturan['alamat2'] != '') : ?><p class="font-sm font-medium"><i class="bi bi-geo-alt-fill"></i> <?= $pengaturan['alamat2']; ?></p><?php endif; ?>
                    <p class="font-sm font-medium"><i class="bi bi-telephone"></i> <?= $pengaturan['no_telp']; ?></p>
                    <p class="font-sm font-medium"><i class="bi bi-whatsapp"></i> <?= $pengaturan['no_hp']; ?></p>
                    <p class="font-sm font-medium"><i class="bi bi-envelope"></i> <?= $pengaturan['email']; ?></p>
                </div>
                <div class="col-12 col-md-4">
                </div>
                <div class="col-12 col-md-4 text-md-right">
                    <h4 class="fw-bold font-lg">Sosial Media Kami</h4>
                    <a href="<?= $pengaturan['instagram']; ?>" class="follow hvr-rectangle-out px-1"><i class="bi bi-instagram bi-3x text-danger" style="font-size: 36px;"></i></a>
                    <a href="<?= $pengaturan['facebook']; ?>" class="follow hvr-rectangle-out px-1"><i class="bi bi-facebook bi-3x text-primary" style="font-size: 36px;"></i></a>
                    <a href="<?= $pengaturan['tiktok']; ?>" class="follow hvr-rectangle-out px-1"><i class="bi bi-tiktok bi-3x text-dark" style="font-size: 36px;"></i></a>
                    <a href="<?= $pengaturan['youtube']; ?>" class="follow hvr-rectangle-out px-1"><i class="bi bi-youtube bi-3x text-danger" style="font-size: 36px;"></i></a>
                </div>
            </div>
        </div>
        <hr />
        <div class="text-center">
            Copyright &copy; <?= date('Y'); ?> <?= $pengaturan['nama_yayasan']; ?>
        </div>
    </div>

    <?= view('layout/js'); ?>
    <?= $this->renderSection('script'); ?>
</body>

</html>