<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="card">
          <form action="<?= site_url('/admartikel/updateartikel/' . ($artikel['id_artikel'])); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="imgLama1" value="<?= $artikel['img1']; ?>">
            <input type="hidden" name="imgLama2" value="<?= $artikel['img2']; ?>">
            <input type="hidden" name="imgLama3" value="<?= $artikel['img3']; ?>">
            <input type="hidden" name="imgLama4" value="<?= $artikel['img4']; ?>">
            <input type="hidden" name="imgLama5" value="<?= $artikel['img5']; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="judul_artikel">Judul</label>
                <input type="text" class="form-control <?= (validation_show_error('judul_artikel')) ? 'is-invalid' : ''; ?>" id="judul_artikel" placeholder="judul" name="judul_artikel" value="<?= $artikel['judul_artikel']; ?>" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('judul_artikel'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="isi_artikel">Isi</label>
                <textarea class="form-control" id="summernote" name="isi_artikel"><?= $artikel['isi_artikel']; ?></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img1')) ? 'is-invalid' : ''; ?>" id="img1" name="img1">
                  <label class="custom-file-label" for="img1"><?= $artikel['img1']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img1'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img2')) ? 'is-invalid' : ''; ?>" id="img2" name="img2">
                  <label class="custom-file-label" for="img2"><?= $artikel['img2']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img2'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img3')) ? 'is-invalid' : ''; ?>" id="img3" name="img3">
                  <label class="custom-file-label" for="img3"><?= $artikel['img3']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img3'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img4')) ? 'is-invalid' : ''; ?>" id="img4" name="img4">
                  <label class="custom-file-label" for="img4"><?= $artikel['img4']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img4'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img5')) ? 'is-invalid' : ''; ?>" id="img5" name="img5">
                  <label class="custom-file-label" for="img5"><?= $artikel['img5']; ?></label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img5'); ?>
                  </div>
                </div>
              </div>
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