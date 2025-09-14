<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <!-- Form Element sizes -->
        <div class="card">
          <form action="<?= site_url('/admartikel/saveartikel'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label for="judul_artikel">Judul</label>
                <input type="text" class="form-control <?= (validation_show_error('judul_artikel')) ? 'is-invalid' : ''; ?>" id="judul_artikel" placeholder="Judul" name="judul_artikel" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('judul_artikel'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="isi_artikel">Isi</label>
                <textarea id="summernote" class="form-control" name="isi_artikel"></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img1')) ? 'is-invalid' : ''; ?>" id="img1" name="img1">
                  <label class="custom-file-label" for="customFile">Pilih Gambar 1</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img1'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img2')) ? 'is-invalid' : ''; ?>" id="img2" name="img2">
                  <label class="custom-file-label" for="customFile">Pilih Gambar 2</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img2'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img3')) ? 'is-invalid' : ''; ?>" id="img3" name="img3">
                  <label class="custom-file-label" for="customFile">Pilih Gambar 3</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img3'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img4')) ? 'is-invalid' : ''; ?>" id="img4" name="img4">
                  <label class="custom-file-label" for="customFile">Pilih Gambar 4</label>
                  <div class="invalid-feedback">
                    <?= validation_show_error('img4'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= (validation_show_error('img5')) ? 'is-invalid' : ''; ?>" id="img5" name="img5">
                  <label class="custom-file-label" for="customFile">Pilih Gambar 5</label>
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
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>