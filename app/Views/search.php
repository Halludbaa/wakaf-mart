<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content py-4 bg-light">
    <div class="container pt-5 mt-5">
        <div class="text-center">
            <h1 class="text-primary mb-3"><?= $title; ?></h1>
        </div>
        <?php if (!empty($donasiResults)) : ?>
            <h2 class="mt-5 mb-3">Hasil Pencarian Donasi dengan kata kunci: "<?= $query; ?>"</h2>
            <div class="row">
                <?php foreach ($donasiResults as $dr) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="<?= base_url('/donasi/detail/' . $dr['id_donasi']); ?>" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="<?= base_url('/front/images/donasi/' . $dr['img1']); ?>" class="card-img-top rounded-top" alt="Donasi Image" style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title mb-3"><?= $dr['nama_donasi']; ?></h5>

                                    <!-- Progress bar -->
                                    <?php
                                    $progress = ($dr['perolehan_donasi'] / $dr['target_donasi']) * 100;
                                    $progress = $progress > 100 ? 100 : $progress;
                                    ?>
                                    <div class="progress mb-2" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <p class="mb-0 text-muted" style="font-size: 14px;">Terkumpul:</p>
                                    <h6 class="text-success fw-bold">Rp <?= number_format($dr['perolehan_donasi'], 0, ',', '.'); ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($artikelResults)) : ?>
            <h2 class="mt-5 mb-3">Hasil Pencarian Artikel dengan kata kunci: "<?= $query; ?>"</h2>
            <div class="row">
                <?php foreach ($artikelResults as $ar) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="<?= base_url('/artikel/detail/' . $ar['id_artikel']); ?>" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="<?= base_url('/front/images/artikel/' . $ar['img1']); ?>" class="card-img-top rounded-top" alt="Artikel Image" style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title mb-2"><?= $ar['judul_artikel']; ?></h5>
                                    <p class="card-text text-muted"><small><?= date('j M Y', strtotime($ar['created_at'])); ?></small></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (empty($donasiResults) && empty($artikelResults)) : ?>
            <h2 class="mt-5 mb-3">Hasil Pencarian dengan kata kunci: "<?= $query; ?>"</h2>
            <div class="text-center py-5">
                <h1 class="text-muted">Tidak ada hasil yang ditemukan.</h1>
            </div>
        <?php endif; ?>

    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '+1d',
        todayHighlight: true
    });
</script>
<?= $this->endSection(); ?>