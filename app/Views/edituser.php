<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="card">
          <form action="<?= site_url('/admuser/updateuser/' . ($users['id'])); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <input type="hidden" name="id" value="<?= $users['id']; ?>">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" value="<?= $users['email']; ?>" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('email'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" placeholder="Password Baru" name="password">
                <small>Kosongkan jika tidak ingin diganti</small>
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