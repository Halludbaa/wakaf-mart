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
          <form action="<?= base_url('/admpengeluaran/savepengeluaran'); ?>" method="post">
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
                <label for="nama_pengeluaran">Nama Pengeluaran</label>
                <input type="text" class="form-control <?= (validation_show_error('nama_pengeluaran')) ? 'is-invalid' : ''; ?>" id="nama_pengeluaran" name="nama_pengeluaran" placeholder="Nama" value="<?= old('nama_pengeluaran') ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('nama_pengeluaran'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="perolehan_pengeluaran">Pengeluaran</label>
                <input type="text" class="form-control <?= (validation_show_error('perolehan_pengeluaran')) ? 'is-invalid' : ''; ?>" id="perolehan_pengeluaran" name="perolehan_pengeluaran" placeholder="Rp." value="<?= old('perolehan_pengeluaran') ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('perolehan_pengeluaran'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="deskripsi_pengeluaran">Keterangan</label>
                <textarea class="form-control <?= (validation_show_error('deskripsi_pengeluaran')) ? 'is-invalid' : ''; ?>" name="deskripsi_pengeluaran" rows="3" placeholder="Keterangan"><?= old('deskripsi_pengeluaran') ?></textarea>
                <div class="invalid-feedback">
                  <?= validation_show_error('deskripsi_pengeluaran'); ?>
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