<?php

use App\Models\MdlPengaturan;

$MdlPengaturan = new MdlPengaturan();
$pengaturan = $MdlPengaturan->first();
?>

<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content py-4 bg-light">
    <div class="container pt-5 mt-4">
        <div class="bg-white rounded shadow-sm p-4">
            <h2 class="text-success mb-4">Konfirmasi Transfer Bank</h2>

            <p>Terima kasih <strong><?= esc($data['nama_donatur']); ?></strong>, berikut detail donasi Anda:</p>

            <ul class="list-unstyled mb-4">
                <li><strong>Donasi Untuk:</strong> <?= esc($donasi['nama_donasi']); ?></li>
                <li><strong>Jumlah Donasi:</strong> Rp <?= number_format($data['jumlah_donasi'], 0, ',', '.'); ?></li>
            </ul>

            <h5 class="mb-3">Silakan transfer ke rekening berikut:</h5>
            <div class="border rounded p-3 bg-light">
                <div class="d-flex align-items-center mb-2">
                    <img src="<?= base_url('front/images/bank/' . $bank['logo_bank']); ?>" alt="<?= $bank['nama_bank']; ?>" width="100" class="me-3">
                    <div>
                        <div><strong><?= $bank['nama_bank']; ?></strong></div>
                        <div>Nomor Rekening: <strong><?= $bank['rekening_bank']; ?></strong></div>
                        <div>Atas Nama: <strong><?= $bank['pemilik_bank']; ?></strong></div>
                    </div>
                </div>
            </div>

            <div class="alert alert-info mt-4">
                Setelah transfer, silakan konfirmasi pembayaran Anda melalui WhatsApp:
                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $pengaturan['no_hp']); ?>" target="_blank">
                    <strong><?= $pengaturan['no_hp']; ?></strong>
                </a>
            </div>

            <a href="<?= base_url(); ?>" class="btn btn-outline-success mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>