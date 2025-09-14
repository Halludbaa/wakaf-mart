<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="card">
          <form action="<?= site_url('/admtransaksi/updatetransaksi/' . ($transaksi['id_transaksi'])); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <input type="hidden" name="id_donasi" value="<?= $transaksi['id_donasi']; ?>">
              <div class="form-group">
                <label for="nama_donatur">Nama Donatur</label>
                <input type="text" class="form-control <?= (validation_show_error('nama_donatur')) ? 'is-invalid' : ''; ?>" id="nama_donatur" name="nama_donatur" value="<?= $transaksi['nama_donatur']; ?>" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('nama_donatur'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="no_telp_donatur">No Telp Donatur</label>
                <input type="text" class="form-control <?= (validation_show_error('no_telp_donatur')) ? 'is-invalid' : ''; ?>" id="no_telp_donatur" name="no_telp_donatur" value="<?= $transaksi['no_telp_donatur']; ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('no_telp_donatur'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="jumlah_donasi">Jumlah Donasi</label>
                <input type="text" class="form-control" id="jumlah_donasi" placeholder="Rp." name="jumlah_donasi" value="<?= 'Rp.' . $transaksi['jumlah_donasi']; ?>" disabled>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="tambah_donasi">Tambah Donasi</label>
                    <input type="text" class="form-control" id="tambah_donasi" placeholder="Rp." name="tambah_donasi">
                  </div>
                  <div class="col">
                    <label for="kurang_donasi">Kurang Donasi</label>
                    <input type="text" class="form-control" id="kurang_donasi" placeholder="Rp." name="kurang_donasi">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="pesan_donatur">Pesan</label>
                <textarea class="form-control" id="summernote" name="pesan_donatur"><?= $transaksi['pesan_donatur']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran</label>
                <div class="list-group">

                  <!-- Transfer Bank -->
                  <label class="list-group-item d-flex align-items-center px-4">
                    <input
                      class="form-check-input mr-2 <?= validation_show_error('metode_pembayaran') ? 'is-invalid' : ''; ?>"
                      type="radio"
                      name="metode_pembayaran"
                      value="bank"
                      <?= ($transaksi['metode_pembayaran'] == 'bank' ? 'checked' : ''); ?>>
                    Transfer Bank
                  </label>
                  <ul class="list-unstyled ml-5 mt-2">
                    <?php foreach ($bank as $b) : ?>
                      <li>
                        <input
                          class="form-check-input me-2 mb-4 <?= validation_show_error('id_bank') ? 'is-invalid' : ''; ?>"
                          type="radio"
                          name="id_bank"
                          value="<?= $b['id_bank']; ?>"
                          <?= ($transaksi['id_bank'] == $b['id_bank'] ? 'checked' : ''); ?>>
                        <img src="<?= base_url('front/images/bank/' . $b['logo_bank']); ?>" width="100" title="<?= $b['nama_bank']; ?>" alt="<?= $b['nama_bank']; ?>">
                        <?= $b['nama_bank']; ?> (<?= $b['rekening_bank']; ?>)
                      </li>
                    <?php endforeach; ?>
                  </ul>
                  <?php if (validation_show_error('id_bank')) : ?>
                    <div class="invalid-feedback d-block">
                      <?= validation_show_error('id_bank'); ?>
                    </div>
                  <?php endif; ?>

                  <!-- Midtrans -->
                  <label class="list-group-item d-flex align-items-center px-4">
                    <input
                      class="form-check-input mr-2 <?= validation_show_error('metode_pembayaran') ? 'is-invalid' : ''; ?>"
                      type="radio"
                      name="metode_pembayaran"
                      value="midtrans"
                      <?= ($transaksi['metode_pembayaran'] == 'midtrans' ? 'checked' : ''); ?>>
                    Midtrans (Payment Gateway)
                  </label>
                  <ul class="list-unstyled ml-5 mt-2">
                    <?php foreach ($midtrans as $b) : ?>
                      <li>
                        <input
                          class="form-check-input me-2 mb-3 <?= validation_show_error('id_bank') ? 'is-invalid' : ''; ?>"
                          type="radio"
                          name="id_bank"
                          value="<?= $b['id_bank']; ?>"
                          <?= ($transaksi['id_bank'] == $b['id_bank'] ? 'checked' : ''); ?>>
                        <img src="<?= base_url('front/images/bank/' . $b['logo_bank']); ?>" width="100" title="<?= $b['nama_bank']; ?>" alt="<?= $b['nama_bank']; ?>">
                        <?= $b['nama_bank']; ?> (<?= $b['rekening_bank']; ?>)
                      </li>
                    <?php endforeach; ?>
                  </ul>
                  <?php if (validation_show_error('id_bank')) : ?>
                    <div class="invalid-feedback d-block">
                      <?= validation_show_error('id_bank'); ?>
                    </div>
                  <?php endif; ?>

                  <!-- QRIS -->
                  <label class="list-group-item d-flex align-items-center px-4">
                    <input
                      class="form-check-input mr-2 <?= validation_show_error('metode_pembayaran') ? 'is-invalid' : ''; ?>"
                      type="radio"
                      name="metode_pembayaran"
                      value="qris"
                      <?= ($transaksi['metode_pembayaran'] == 'qris' ? 'checked' : ''); ?>>
                    QRIS
                  </label>
                  <ul class="list-unstyled ml-5 mt-2">
                    <?php foreach ($qris as $b) : ?>
                      <li>
                        <input
                          class="form-check-input me-2 mb-3 <?= validation_show_error('id_bank') ? 'is-invalid' : ''; ?>"
                          type="radio"
                          name="id_bank"
                          value="<?= $b['id_bank']; ?>"
                          <?= ($transaksi['id_bank'] == $b['id_bank'] ? 'checked' : ''); ?>>
                        <img src="<?= base_url('front/images/bank/' . $b['logo_bank']); ?>" width="100" title="<?= $b['nama_bank']; ?>" alt="<?= $b['nama_bank']; ?>">
                        <?= $b['nama_bank']; ?> (<?= $b['rekening_bank']; ?>)
                      </li>
                    <?php endforeach; ?>
                  </ul>
                  <?php if (validation_show_error('id_bank')) : ?>
                    <div class="invalid-feedback d-block">
                      <?= validation_show_error('id_bank'); ?>
                    </div>
                  <?php endif; ?>
                </div>
                <?php if (validation_show_error('metode_pembayaran')) : ?>
                  <div class="invalid-feedback d-block">
                    <?= validation_show_error('metode_pembayaran'); ?>
                  </div>
                <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control select2 <?= (validation_show_error('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" autofocus>
                  <option value="">-- Pilih Status --</option>
                  <option value="pending" <?= ($transaksi['status'] == 'pending' ? 'selected' : ''); ?>>Pending</option>
                  <option value="confirmed" <?= ($transaksi['status'] == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                  <option value="canceled" <?= ($transaksi['status'] == 'canceled' ? 'selected' : ''); ?>>Canceled</option>
                </select>
                <div class="invalid-feedback">
                  <?= validation_show_error('status'); ?>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Update">Update</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>