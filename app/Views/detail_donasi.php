<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container pt-5 mt-5">
        <div class="detail row mt-inner">
            <h1 class="font-bold py-4">Donasi: <?= $donasi['nama_donasi']; ?></h1>
        </div>
        <div class="detail row">
            <div class="col-md-5 thumbnail mb-3">
                <div id="carousel" class="carousel carousel-dark slide" data-ride="carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php if (!empty($donasi['img' . $i])) : ?>
                                <div class="carousel-item <?= $i == 1 ? 'active' : ''; ?>">
                                    <img src="<?= base_url('/front/images/donasi/' . $donasi['img' . $i]); ?>" class="d-block w-100" alt="Slider Image <?= $i; ?>">
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
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
                <!-- Progres Bar -->
                <div class="progress mt-3" role="progressbar" aria-label="Progress bar example">
                    <div id="progress-bar" class="progress-bar bg-success" style="width: <?= ($donasi['perolehan_donasi'] / $donasi['target_donasi']) * 100 ?>%"></div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <h5 class="eclip mt-inner" align="left">Tercapai: <br> <b><?= 'Rp ' . number_format($donasi['perolehan_donasi'], 0, ',', '.'); ?></b></h5>
                    </div>
                    <div class="col">
                        <h5 class="eclip mt-inner" align="right">Target: <br> <?= 'Rp ' . number_format($donasi['target_donasi'], 0, ',', '.'); ?></h5>
                    </div>
                </div>
                <br>
                <div class="col-md">
                    <a href="<?= site_url('/transaksi/register/' . $donasi['id_donasi']); ?>" class="btn btn-success btn-lg btn-block w-100" type="button">Donasi Sekarang</a>
                </div>
            </div>

            <div class="col-md-7">
                <ul class="nav nav-tabs" id="navtabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="deskripsi-tab" data-bs-toggle="tab" href="#deskripsi_donasi">Deskripsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pengeluaran-tab" data-bs-toggle="tab" href="#pengeluaran_donasi">Pengeluaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pesan-tab" data-bs-toggle="tab" href="#pesan_donatur">Pesan</a>
                    </li>
                </ul>

                <div class="tab-content mb-5">
                    <div class="tab-pane fade show active" id="deskripsi_donasi">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="font-bold mb-3">Deskripsi Donasi</h5>
                                <p class="eclip text-left mt-inner"><?= $donasi['deskripsi_donasi']; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pengeluaran_donasi">
                        <div class="card">
                            <div class="card-body">
                                <?php if (!empty($pengeluaran) && is_array($pengeluaran)) : ?>
                                    <h5 class="font-bold mb-3">Detail Pengeluaran</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Nama</th>
                                                    <th>Pengeluaran</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total_pengeluaran = 0;
                                                foreach ($pengeluaran as $r) :
                                                    $total_pengeluaran += $r['perolehan_pengeluaran'];
                                                ?>
                                                    <tr>
                                                        <td><?= date('j M Y', strtotime($r['created_at'])); ?></td>
                                                        <td><?= htmlspecialchars($r['nama_pengeluaran']); ?></td>
                                                        <td><?= 'Rp ' . number_format($r['perolehan_pengeluaran'], 0, ',', '.'); ?></td>
                                                        <td><?= htmlspecialchars($r['deskripsi_pengeluaran']); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="2" class="text-right"><strong>Total Pengeluaran</strong></td>
                                                    <td><strong><?= 'Rp ' . number_format($total_pengeluaran, 0, ',', '.'); ?></strong></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else : ?>
                                    <p>Data pengeluaran tidak tersedia.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pesan_donatur">
                        <div class="card">
                            <div class="card-body">
                                <?php if (!empty($transaksi) && is_array($transaksi)) : ?>
                                    <div class="comments-container">
                                        <h5 class="text-left mb-3">Pesan dari Para Donatur</h5>
                                        <?php foreach ($transaksi as $t) : ?>
                                            <div class="comment">
                                                <div class="comment-header">
                                                    <div class="comment-user-info">
                                                        <strong><?= htmlspecialchars($t['nama_donatur']); ?></strong>
                                                        <span class="comment-time"><?= date('j M Y', strtotime($t['created_at'])); ?></span>
                                                    </div>
                                                </div>
                                                <div class="comment-body">
                                                    <p><?= htmlspecialchars($t['pesan_donatur']); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else : ?>
                                    <p>Pesan Dari Donatur Tidak Ada.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
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