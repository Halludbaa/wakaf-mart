<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
      </div>
    <?php endif; ?>
    <!-- Search Input -->
    <div class="row mb-3">
      <div class="col-12">
        <?= form_open('admartikel', array('method' => 'get')); ?>
        <div class="input-group">
          <input name="keyword" class="form-control" type="search" placeholder="Search" aria-label="Search" value="<?= $keyword ?? ""; ?>">
          <div class="input-group-append">
            <button type="submit" class="btn search-button">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="artikel" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach ($artikel as $a) : ?>
                    <tr>
                      <td><?= $a['id_artikel']; ?></td>
                      <td><?= date('j M Y', strtotime($a['created_at'])); ?></td>
                      <td><?= $a['judul_artikel']; ?></td>
                      <td><?= substr($a['isi_artikel'], 0, 100); ?></td>
                      <td>
                        <a href="<?= base_url('/admartikel/editartikel/' . $a['id_artikel']); ?>"><i class="fas fa-edit text-primary"></i></a> |
                        <a href="<?= base_url('/admartikel/deleteartikel/' . $a['id_artikel']); ?>" onclick="return confirm('apakah anda yakin?');"><i class="fas fa-trash-alt text-danger"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <?= $pager->links('artikel', 'bootstrap_pagination'); ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>