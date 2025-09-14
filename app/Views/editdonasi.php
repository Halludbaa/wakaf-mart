<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="card">
          <form action="<?= site_url('/admdonasi/updatedonasi/' . ($donasi['id_donasi'])); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="imgLama1" value="<?= $donasi['img1']; ?>">
            <input type="hidden" name="imgLama2" value="<?= $donasi['img2']; ?>">
            <input type="hidden" name="imgLama3" value="<?= $donasi['img3']; ?>">
            <input type="hidden" name="imgLama4" value="<?= $donasi['img4']; ?>">
            <input type="hidden" name="imgLama5" value="<?= $donasi['img5']; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="nama_donasi">Nama</label>
                <input type="text" class="form-control <?= (validation_show_error('nama_donasi')) ? 'is-invalid' : ''; ?>" id="nama_donasi" placeholder="Nama" name="nama_donasi" value="<?= $donasi['nama_donasi']; ?>" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('nama_donasi'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="target_donasi">Target</label>
                <input type="text" class="form-control <?= (validation_show_error('target_donasi')) ? 'is-invalid' : ''; ?>" id="target_donasi" placeholder="Rp." name="target_donasi" value="<?= $donasi['target_donasi']; ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('target_donasi'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="deskripsi_donasi">Deskripsi</label>
                <textarea class="form-control" id="summernote" name="deskripsi_donasi"><?= $donasi['deskripsi_donasi']; ?></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img1')) ? 'is-invalid' : ''; ?>" id="img1" name="img1">
                  <label class="custom-file-label" for="img1"><?= $donasi['img1']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img1'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img2')) ? 'is-invalid' : ''; ?>" id="img2" name="img2">
                  <label class="custom-file-label" for="img2"><?= $donasi['img2']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img2'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img3')) ? 'is-invalid' : ''; ?>" id="img3" name="img3">
                  <label class="custom-file-label" for="img3"><?= $donasi['img3']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img3'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img4')) ? 'is-invalid' : ''; ?>" id="img4" name="img4">
                  <label class="custom-file-label" for="img4"><?= $donasi['img4']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img4'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img5')) ? 'is-invalid' : ''; ?>" id="img5" name="img5">
                  <label class="custom-file-label" for="img5"><?= $donasi['img5']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img5'); ?>
                  </div>
                </div>
              </div>
              <p><em>*Format jpg,jpeg,png. saran ukuran 16:9.</em></p>
              <br>
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