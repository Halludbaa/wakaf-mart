<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="card">
          <form action="<?= site_url('/admuser/saveuser'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" value="<?= old('email'); ?>" autofocus>
                <div class="invalid-feedback">
                  <?= validation_show_error('email'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="Username" name="username" value="<?= old('username'); ?>">
                <div class="invalid-feedback">
                  <?= validation_show_error('username'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
                <div class="invalid-feedback">
                  <?= validation_show_error('password'); ?>
                </div>
              </div>
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