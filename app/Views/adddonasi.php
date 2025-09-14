<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="card">
          <form action="<?= site_url('/admdonasi/savedonasi'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label for="nama_donasi">Nama</label>
                <input type="text" class="form-control <?= (validation_show_error('nama_donasi')) ? 'is-invalid' : ''; ?>" id="nama_donasi" placeholder="Nama" name="nama_donasi" value="<?= old('nama_donasi') ?>" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('nama_donasi'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="target_donasi">Target</label>
                <input type="text" class="form-control <?= (validation_show_error('target_donasi')) ? 'is-invalid' : ''; ?>" id="target_donasi" placeholder="Rp." name="target_donasi" value="<?= old('target_donasi') ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('target_donasi'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="deskripsi_donasi">Deskripsi</label>
                <textarea class="form-control" id="summernote" name="deskripsi_donasi"></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img1')) ? 'is-invalid' : ''; ?>" id="img1" name="img1">
                  <label class="custom-file-label" for="img1">Pilih Gambar 1</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img1'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img2')) ? 'is-invalid' : ''; ?>" id="img2" name="img2">
                  <label class="custom-file-label" for="img2">Pilih Gambar 2</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img2'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img3')) ? 'is-invalid' : ''; ?>" id="img3" name="img3">
                  <label class="custom-file-label" for="img3">Pilih Gambar 3</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img3'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img4')) ? 'is-invalid' : ''; ?>" id="img4" name="img4">
                  <label class="custom-file-label" for="img4">Pilih Gambar 4</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img4'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img5')) ? 'is-invalid' : ''; ?>" id="img5" name="img5">
                  <label class="custom-file-label" for="img5">Pilih Gambar 5</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img5'); ?>
                  </div>
                </div>
              </div>
              <p><em>*Format jpg,jpeg,png. saran ukuran 16:9.</em></p>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>