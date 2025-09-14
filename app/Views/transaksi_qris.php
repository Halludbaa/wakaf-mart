<?php

use App\Models\MdlPengaturan;

$MdlPengaturan = new MdlPengaturan();
$pengaturan = $MdlPengaturan->first();
?>

<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content py-4 bg-light">
    <div class="container pt-5 mt-4">
        <div class="bg-white rounded shadow-sm p-4 text-center">
            <h2 class="text-success mb-4">Pembayaran via QRIS<br />Untuk Donasi: <?= $donasi['nama_donasi']; ?></h2>

            <p>Terima kasih <strong><?= esc($data['nama_donatur']); ?></strong>.</p>
            <ul class="list-unstyled mb-4">
                <li><strong>Donasi Untuk:</strong> <?= esc($donasi['nama_donasi']); ?></li>
                <li><strong>Jumlah Donasi:</strong> Rp <?= number_format($data['jumlah_donasi'], 0, ',', '.'); ?></li>
            </ul>
            <p>Silakan scan QR di bawah ini menggunakan aplikasi e-wallet Anda:</p>

            <div class="my-4">
                <img src="<?= base_url('front/images/bank/') . $bank['file_qris']; ?>" alt="QRIS" width="400" class="shadow-sm border rounded">
            </div>

            <p class="text-muted">Setelah pembayaran, konfirmasi via WhatsApp ke:
                <a href="https://wa.me/<?= $pengaturan['no_hp']; ?>" target="_blank">
                    <strong><?= $pengaturan['no_hp']; ?></strong>
                </a>
            </p>

            <a href="<?= base_url(); ?>" class="btn btn-outline-success mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>