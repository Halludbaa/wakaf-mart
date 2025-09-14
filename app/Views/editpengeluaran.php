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
          <form action="<?= base_url('/admpengeluaran/updatepengeluaran/' . ($pengeluaran['id_pengeluaran'])); ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="id_donasi" value="<?= $pengeluaran['id_donasi']; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="nama_donasi">Nama Donasi</label>
                <select class="form-control <?= (validation_show_error('nama_donasi')) ? 'is-invalid' : ''; ?>" id="nama_donasi" name="nama_donasi" disabled>
                  <option value="">-- Pilih Nama Donasi --</option>
                  <?php foreach ($donasi as $ds) : ?>
                    <option value="<?= $ds['id_donasi']; ?>" <?= $ds['id_donasi'] == $pengeluaran['id_donasi'] ? 'selected' : '' ?>><?= $ds['nama_donasi']; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= validation_show_error('nama_donasi'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="nama_pengeluaran">Nama Pengeluaran</label>
                <input type="text" class="form-control <?= (validation_show_error('nama_pengeluaran')) ? 'is-invalid' : ''; ?>" id="nama_pengeluaran" name="nama_pengeluaran" placeholder="Nama" value="<?= $pengeluaran['nama_pengeluaran']; ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('nama_pengeluaran'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="perolehan_pengeluaran">Pengeluaran</label>
                <input type="text" class="form-control <?= (validation_show_error('perolehan_pengeluaran')) ? 'is-invalid' : ''; ?>" id="perolehan_pengeluaran" name="perolehan_pengeluaran" placeholder="Rp." value="<?= $pengeluaran['perolehan_pengeluaran']; ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('perolehan_pengeluaran'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="deskripsi_pengeluaran">Keterangan</label>
                <textarea class="form-control <?= (validation_show_error('deskripsi_pengeluaran')) ? 'is-invalid' : ''; ?>" name="deskripsi_pengeluaran" rows="3" placeholder="Keterangan"><?= $pengeluaran['deskripsi_pengeluaran']; ?></textarea>
                <div class="invalid-feedback">
                  <?= validation_show_error('deskripsi_pengeluaran'); ?>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Update">Update</button>
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