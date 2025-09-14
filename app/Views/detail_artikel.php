<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content py-4">
    <div class="container pt-5 mt-5" id="artikel">
        <div class="row mb-3">
            <div class="col">
                <h1 class="text-primary py-3"><?= $artikel['judul_artikel']; ?></h1>
            </div>
        </div>
        <div class="row">
            <img src="<?= base_url('/front/images/artikel/' . $artikel['img1']); ?>" class="img-fluid custom-size" alt="">
            <p class="text_artikel"><?= $artikel['isi_artikel']; ?></p>
        </div>
        <div class="row mb-4">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php if (!empty($artikel['img' . $i])) : ?>
                            <div class="carousel-item <?= $i == 1 ? 'active' : ''; ?>">
                                <img src="<?= base_url('/front/images/artikel/' . $artikel['img' . $i]); ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>