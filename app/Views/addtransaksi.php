<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- right column -->
      <div class="col-md">
        <!-- Form Element sizes -->
        <div class="card">
          <form action="<?= base_url('/admtransaksi/savetransaksi'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label for="nama_donasi">Nama Donasi</label>
                <select class="form-control select2 <?= (validation_show_error('nama_donasi')) ? 'is-invalid' : ''; ?>" id="nama_donasi" name="nama_donasi" autofocus>
                  <option value="">-- Pilih Nama Donasi --</option>
                  <?php foreach ($donasi as $ds) : ?>
                    <option value="<?= $ds['id_donasi']; ?>"><?= $ds['nama_donasi']; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= validation_show_error('nama_donasi'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="nama_donatur">Nama Donatur</label>
                <input type="text" class="form-control <?= (validation_show_error('nama_donatur')) ? 'is-invalid' : ''; ?>" id="nama_donatur" name="nama_donatur" placeholder="Nama" value="<?= old('nama_donatur') ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('nama_donatur'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="no_telp_donatur">Nomor Telepon Donatur</label>
                <input type="text" class="form-control <?= (validation_show_error('no_telp_donatur')) ? 'is-invalid' : ''; ?>" id="no_telp_donatur" name="no_telp_donatur" placeholder="Nama" value="<?= old('no_telp_donatur') ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('no_telp_donatur'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="jumlah_donasi">Jumlah Donasi</label>
                <input type="text" class="form-control <?= (validation_show_error('jumlah_donasi')) ? 'is-invalid' : ''; ?>" id="jumlah_donasi" name="jumlah_donasi" placeholder="Rp." value="<?= old('jumlah_donasi') ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('jumlah_donasi'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="pesan_donatur">Pesan</label>
                <textarea class="form-control" id="summernote" name="pesan_donatur" rows="3" placeholder="Keterangan"><?= old('pesan_donatur') ?></textarea>
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
                      <?= old('metode_pembayaran') == 'bank' ? 'checked' : '' ?>>
                    Transfer Bank
                  </label>
                  <ul class="list-unstyled ml-5 mt-3">
                    <?php foreach ($bank as $b) : ?>
                      <li>
                        <input
                          class="form-check-input me-2 mb-4 <?= validation_show_error('id_bank') ? 'is-invalid' : ''; ?>"
                          type="radio"
                          name="id_bank"
                          value="<?= $b['id_bank']; ?>"
                          <?= old('id_bank') == $b['id_bank'] ? 'checked' : '' ?>>
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
                      <?= old('metode_pembayaran') == 'midtrans' ? 'checked' : '' ?>>
                    Midtrans (Payment Gateway)
                  </label>
                  <ul class="list-unstyled ml-5 mt-3">
                    <?php foreach ($midtrans as $b) : ?>
                      <li>
                        <input
                          class="form-check-input me-2 mb-3 <?= validation_show_error('id_bank') ? 'is-invalid' : ''; ?>"
                          type="radio"
                          name="id_bank"
                          value="<?= $b['id_bank']; ?>"
                          <?= old('id_bank') == $b['id_bank'] ? 'checked' : '' ?>>
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
                      <?= old('metode_pembayaran') == 'qris' ? 'checked' : '' ?>>
                    QRIS
                  </label>
                  <ul class="list-unstyled ml-5 mt-3">
                    <?php foreach ($qris as $b) : ?>
                      <li>
                        <input
                          class="form-check-input me-2 mb-3 <?= validation_show_error('id_bank') ? 'is-invalid' : ''; ?>"
                          type="radio"
                          name="id_bank"
                          value="<?= $b['id_bank']; ?>"
                          <?= old('id_bank') == $b['id_bank'] ? 'checked' : '' ?>>
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
                  <option value="pending">Pending</option>
                  <option value="confirmed">Confirmed</option>
                  <option value="canceled">Canceled</option>
                </select>
                <div class="invalid-feedback">
                  <?= validation_show_error('status'); ?>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>