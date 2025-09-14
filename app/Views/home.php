<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
	<div class="pt-4 mt-5">
		<!-- wilayah spanduk -->
		<div id="carousel" class="carousel slide" data-ride="carousel" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php foreach ($spanduk as $index => $s) : ?>
					<div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
						<img src="<?= base_url('/front/images/slider/' . $s['img']); ?>" class="d-block w-100 img-fluid" alt="">
						<div class="carousel-caption d-none d-md-block">
							<h1 class="display-4 text-white"><?= $s['judul_spanduk']; ?></h1>
							<p class="lead"><?= $s['deskripsi_spanduk']; ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</a>
		</div>
		<!-- wilayah spanduk -->

		<!-- wilayah info -->
		<div class="bg-primary text-white py-5">
			<div class="container text-center">
				<div class="row justify-content-center">
					<!-- Jumlah Donasi -->
					<div class="col-md-4 mb-4 mb-md-0">
						<h2 class="fw-bold display-6"><?= $jumlahDonasi; ?></h2>
						<p class="lead mb-0 text-uppercase">Donasi</p>
					</div>

					<!-- Total Terkumpul -->
					<div class="col-md-4 mb-4 mb-md-0">
						<h2 class="fw-bold display-6"><?= 'Rp' . number_format($totalDonasi, 0, ',', '.'); ?></h2>
						<p class="lead mb-0 text-uppercase">Terkumpul</p>
					</div>

					<!-- Jumlah Transaksi -->
					<div class="col-md-4">
						<h2 class="fw-bold display-6"><?= $jumlahTransaksi; ?></h2>
						<p class="lead mb-0 text-uppercase">Transaksi</p>
					</div>
				</div>
			</div>
		</div>
		<!-- wilayah info -->

		<!-- wilayah donasi -->
		<div class="container-fluid my-5">
			<div class="djudul row mb-3 mx-3">
				<h1>BANTU <b>MEREKA</b></h1>
			</div>
			<?php if (!empty($donasi)) : ?>
				<div id="donasiCarousel" class="donasi carousel slide px-5 " data-bs-ride="carousel">
					<div class="carousel-inner">
						<?php foreach (array_chunk($donasi, 4) as $index => $donasi_chunk) : ?>
							<div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
								<div class="row">
									<?php foreach ($donasi_chunk as $d) : ?>
										<div class="col-lg-3 col-md-4 col-sm-6 col-12">
											<a href="<?= base_url('/donasi/detail/' . $d['id_donasi']); ?>">
												<div class="card">
													<img src="<?= base_url('/front/images/donasi/' . $d['img1']); ?>" class="card-img-top" alt="...">
													<div class="card-body">
														<h5 class="card-title"><?= $d['nama_donasi']; ?></h5>
														<!-- Progres Bar -->
														<div class="progress" role="progressbar" aria-label="Progress bar example">
															<div id="progress-bar" class="progress-bar bg-success" style="width: <?= ($d['perolehan_donasi'] / $d['target_donasi']) * 100 ?>%"></div>
														</div>
														<div class="row mt-2">
															<h5 class="card-text text-end">Terkumpul<br><?= 'Rp.' . number_format($d['perolehan_donasi'], 0, ',', '.'); ?></h5>
														</div>
													</div>
												</div>
											</a>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#donasiCarousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#donasiCarousel" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			<?php endif; ?>
		</div>
		<!-- wilayah donasi -->

		<!--wilayah pelayanan-->
		<div class="bg-transparent my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>LAYANAN <b>KAMI</b></h1>
            </div>
        </div>
        <div class="row text-center mt-4">
            <div class="col-lg-4 col-md-6 mb-4">
                <img src="<?= base_url('/front/images/donasi_online.png') ?>" alt="donasi_online" class="img-fluid mb-3" style="max-width: 120px;">
                <h5>DONASI ONLINE</h5>
                <p>Tidak perlu kemana-mana, anda bisa donasi online dengan banyak metode pembayaran</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <img src="<?= base_url('/front/images/jemput.png') ?>" alt="jemput" class="img-fluid mb-3" style="max-width: 120px;">
                <h5>JEMPUT DONASI</h5>
                <p>Tidak perlu kemana-mana, kami akan menjemput donasi anda. Mudah bukan?</p>
            </div>
            <div class="col-lg-4 col-md-12 mb-4">
                <img src="<?= base_url('/front/images/konsultasi.png') ?>" alt="konsultasi" class="img-fluid mb-3" style="max-width: 120px;">
                <h5>KONSULTASI</h5>
                <p>Butuh Bantuan? Konsultasikan dengan para konsultan profesional kami</p>
            </div>
        </div>
    </div>
</div>

		<!--wilayah pelayanan-->

		<!-- wilayah alasan -->
		<div class="bg-primary text-white py-5">
			<div class="container-fluid">
				<div class="row mx-3">
					<div class="col-md-12">
						<h1>MEMILIH <b>KAMI?</b></h1>
					</div>
				</div>
				<div class="aisi row mx-3 mt-3 text-center">
					<div class="col-md">
						<img class="rounded-circle border border-light bg-light" src="<?= base_url('/front/images/responsif.png') ?>" alt="responsif">
						<h5 class="font-bold font-lg mt-2">RESPONSIF</h5>
						<p>Merespon kebutuhan masyarakat dengan cepat dan tepat</p>
					</div>
					<div class="col-md">
						<img class="rounded-circle border border-light bg-light" src="<?= base_url('/front/images/suistainable.png') ?>" alt="suistainable">
						<h5 class="font-bold font-lg mt-2">SUSTAINABLE PROGRAM</h5>
						<p>Program jangka panjang untuk kemandirian umat</p>
					</div>
					<div class="col-md">
						<img class="rounded-circle border border-light bg-light" src="<?= base_url('/front/images/kredibilitas.png') ?>" alt="kredibilitas">
						<h5 class="font-bold font-lg mt-2">CREDIBILITY</h5>
						<p>Bertanggung jawab penuh menjalankan amanah programi</p>
					</div>
				</div>
			</div>
		</div>
		<!-- wilayah alasan -->

		<!-- wilayah artikel -->
		<div class="container-fluid my-5">
			<div class="djudul row mb-3 mx-3">
				<h1>KISAH <b>KAMI</b></h1>
			</div>
			<?php if (!empty($artikel)) : ?>
				<div id="artikelCarousel" class="artikel carousel slide px-5" data-bs-ride="carousel">
					<div class="carousel-inner">
						<?php foreach (array_chunk($artikel, 4) as $index => $artikel_chunk) : ?>
							<div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
								<div class="row">
									<?php foreach ($artikel_chunk as $a) : ?>
										<div class="col-lg-3 col-md-4 col-sm-6 col-12">
											<a href="<?= base_url('/artikel/detail/' . $a['id_artikel']); ?>">
												<div class="card" id="card">
													<img src="<?= base_url('/front/images/artikel/' . $a['img1']); ?>" class="card-img-top" alt="...">
													<div class="card-body">
														<h5 class="card-title"><?= $a['judul_artikel']; ?></h5>
														<p class="card-text"><small class="text-body-secondary"><?= date('j M Y', strtotime($a['created_at'])); ?></small></p>
													</div>
												</div>
											</a>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#artikelCarousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#artikelCarousel" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			<?php endif; ?>
		</div>
		<!-- wilayah artikel -->
	</div>

	<div class="bg-primary text-white">
		<div class="container-fluid">
			<div class="row py-5">
				<div class="section">
					<div class="col-md-12 text-center">
						<h1 class="font-lg font-purple font-bold ">INGIN BERDONASI TAPI BINGUNG YANG MANA?</h1>
						<p class="font-medium font-md">Bisa Konsultasi Dengan Kami Melalui Whatsapp</p>
						<a href="http://wa.me/<?= $pengaturan['no_hp']; ?>" class="btn btn-success">Whatsapp</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection(); ?>