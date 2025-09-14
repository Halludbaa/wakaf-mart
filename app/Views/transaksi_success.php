<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content py-5 bg-light">
    <div class="container pt-5">
        <div class="bg-white rounded shadow-sm p-4 text-center">
            <div class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#28a745" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.07 0l4.243-4.242a.75.75 0 1 0-1.06-1.06L7.5 9.44 5.78 7.72a.75.75 0 0 0-1.06 1.06l2.25 2.25z"/>
                </svg>
            </div>
            <h2 class="text-success fw-bold mb-3">Transaksi Berhasil</h2>
            <p class="lead fw-normal">Terima kasih, <strong><?= esc($nama_donatur); ?></strong> 🙏</p>

            <div class="mt-4 text-start mx-auto" style="max-width: 500px;">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Donasi Untuk</span>
                        <strong><?= esc($nama_donasi); ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Jumlah Donasi</span>
                        <strong>Rp <?= number_format($jumlah_donasi, 0, ',', '.'); ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>No. Telepon</span>
                        <strong><?= esc($no_telp_donatur); ?></strong>
                    </li>
                    <?php if (!empty($pesan_donatur)) : ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Pesan</span>
                            <strong><?= esc($pesan_donatur); ?></strong>
                        </li>
                    <?php endif; ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Metode Pembayaran:</span>
                        <strong>Midtrans (Payment Gateway)</strong>
                    </li>
                </ul>
            </div>

            <div class="mt-4">
                <a href="<?= base_url(); ?>" class="btn btn-outline-success">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
