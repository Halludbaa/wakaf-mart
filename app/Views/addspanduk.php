<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="card">
          <form action="<?= base_url('/admspanduk/savespanduk'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label for="judul_spanduk">Judul</label>
                <input type="text" class="form-control <?= (validation_show_error('judul_spanduk')) ? 'is-invalid' : ''; ?>" id="judul_spanduk" placeholder="Judul" name="judul_spanduk" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('judul_spanduk'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="deskripsi_spanduk">Isi</label>
                <textarea name="deskripsi_spanduk" class="form-control" rows="3" placeholder="Isi"></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img')) ? 'is-invalid' : ''; ?>" id="img" name="img">
                  <label class="custom-file-label" for="img">Pilih Gambar</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img'); ?>
                  </div>
                </div>
              </div>
              <p><em>*Format jpg,jpeg,png. saran ukuran 16:9.</em></p>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>