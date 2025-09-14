<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Flash message -->
    <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
      </div>
    <?php endif; ?>

    <!-- Search Input -->
    <div class="row mb-3">
      <div class="col-12">
        <div class="input-group">
          <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn search-button">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabel Transaksi -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Donasi</th>
                    <th>Donatur</th>
                    <th>Jumlah</th>
                    <th>Pesan</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php $total_donasi = 0; ?>
                  <?php foreach ($transaksi as $t) : ?>
                    <tr>
                      <td><?= $nomor++; ?></td>
                      <td><?= date('j M Y H:i', strtotime($t['created_at'])); ?></td>
                      <td><?= $t['nama_donasi']; ?></td>
                      <td>
                        <?= $t['nama_donatur']; ?><br />
                        Telp: <?= $t['no_telp_donatur']; ?>
                      </td>
                      <td><?= 'Rp' . number_format($t['jumlah_donasi'], 0, ',', '.'); ?></td>
                      <td><?= $t['pesan_donatur']; ?></td>
                      <td><?= $t['nama_bank']; ?></td>
                      <td>
                        <?php if ($t['status'] == 'pending') : ?>
                          <span class="badge badge-warning"><?= $t['status']; ?></span>
                        <?php elseif ($t['status'] == 'confirmed') : ?>
                          <span class="badge badge-success"><?= $t['status']; ?></span>
                        <?php else : ?>
                          <span class="badge badge-danger"><?= $t['status']; ?></span>
                        <?php endif; ?>
                      <td>
                        <a href="<?= base_url('/admtransaksi/edittransaksi/' . $t['id_transaksi']); ?>"><i class="fas fa-edit text-primary"></i></a> |
                        <a href="<?= base_url('/admtransaksi/deletetransaksi/' . $t['id_transaksi']); ?>" onclick="return confirm('Apakah Anda yakin?');"><i class="fas fa-trash-alt text-danger"></i></a>
                      </td>
                    </tr>
                    <?php $total_donasi += $t['jumlah_donasi']; ?>
                  <?php endforeach; ?>
                  <tr>
                    <td colspan="4" style="text-align:left;"><strong>SubTotal Donasi</strong></td>
                    <td colspan="5"><strong><?= 'Rp' . number_format($total_donasi, 0, ',', '.'); ?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:left;"><strong>Total Keselurahan Donasi</strong></td>
                    <td colspan="5"><strong><?= 'Rp' . number_format($totalJumlah, 0, ',', '.'); ?></strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <?= $pager->links('transaksi', 'bootstrap_pagination'); ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection(); ?>