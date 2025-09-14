<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content py-4">
    <div class="container pt-5 mt-5" id="profil">
        <!-- wilayah profil -->
        <div class="text-center">
            <h1>TENTANG KAMI</h1>
        </div>
        <div class="row mt-3">
            <?= $pengaturan['profil']; ?>
        </div>
        <!-- wilayah profil -->

        <!-- wilayah visimisi -->
        <div class="row my-5 text-center px-5 py-2" id="visimisi">
            <div class="row ">
                <h1 class="font-bold font-xl pt-2">VISI</h1>
                <hr>
                <?= $pengaturan['visi']; ?>
            </div>
            <div class="row">
                <h1 class="font-bold font-xl pt-2">MISI</h1>
                <hr>
                <div class="col-md">
                    <?= $pengaturan['misi']; ?>
                </div>
            </div>
        </div>
        <!-- wilayah visimisi -->

        <!-- wilayah program -->
        <div class="row my-5">
            <h1 class="font-bold text-center font-xl pb-2">SEMUA DONASI</h1>
            <div id="programCarousel" class="carousel slide px-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach (array_chunk($program, 4) as $index => $program_chunk) : ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                            <div class="row">
                                <?php foreach ($program_chunk as $p) : ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="program card" id="card">
                                            <img src="<?= base_url('/front/images/program/' . $p['img']); ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $p['nama_program']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#programCarousel" role="button" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</a>
					<a class="carousel-control-next" href="#programCarousel" role="button" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</a>
            </div>
        </div>
        <!-- wilayah program -->
    </div>
</section>
<?= $this->endSection(); ?>