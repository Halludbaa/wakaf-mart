<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <!-- Menampilkan pesan flashdata jika ada -->
    <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <!-- Tabel Pengguna -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="<?= base_url('admuser/adduser'); ?>" class="btn btn-primary mb-3">Tambah</a>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Diperbarui</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 1;
                  ?>
                  <?php foreach ($users as $u) : ?>
                    <tr>
                      <td><?= $u['id']; ?></td>
                      <td><?= $u['email']; ?></td>
                      <td><?= $u['username']; ?></td>
                      <td><?= $u['updated_at']; ?></td>
                      <td>
                        <a href="<?= site_url('/admuser/edituser/' . $u['id']); ?>"><i class="fas fa-edit text-primary"></i></a> |
                        <?php if ($u['id'] == 1) { ?>
                          <a href="javascript:void(0)"><i class="fas fa-trash-alt text-dark"></i></a>
                        <?php } else { ?>
                          <a href="<?= site_url('/admuser/deleteuser/' . $u['id']); ?>" onclick="return confirm('Apakah Anda yakin?');"><i class="fas fa-trash-alt text-danger"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <?= $pager->links('user', 'bootstrap_pagination'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>