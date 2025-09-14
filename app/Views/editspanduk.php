<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="card">
          <form action="<?= site_url('/admspanduk/updatespanduk/' . ($spanduk['id_spanduk'])); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="imgLama" value="<?= $spanduk['img']; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="judul_spanduk">Judul</label>
                <input type="text" class="form-control <?= (validation_show_error('judul_spanduk')) ? 'is-invalid' : ''; ?>" id="judul_spanduk" name="judul_spanduk" value="<?= $spanduk['judul_spanduk']; ?>" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('judul_spanduk'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="deskripsi_spanduk">Deskripsi</label>
                <textarea id="deskripsi_spanduk" class="form-control" name="deskripsi_spanduk"><?= $spanduk['deskripsi_spanduk']; ?></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img')) ? 'is-invalid' : ''; ?>" id="img" name="img">
                  <label class="custom-file-label" for="img"><?= $spanduk['img']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img'); ?>
                  </div>
                </div>
              </div>
              <p><em>*Format jpg,jpeg,png. saran ukuran 16:9.</em></p>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Update">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>