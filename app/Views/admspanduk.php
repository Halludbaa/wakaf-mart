<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
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
        <?= form_open('admspanduk', array('method' => 'get')); ?>
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
              <table id="spanduk" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach ($spanduk as $item) : ?>
                    <tr>
                      <td><?= $item['id_spanduk']; ?></td>
                      <td><?= $item['judul_spanduk']; ?></td>
                      <td><?= $item['deskripsi_spanduk']; ?></td>
                      <td>
                        <a href="<?= base_url('/admspanduk/editspanduk/' . $item['id_spanduk']); ?>"><i class="fas fa-edit text-primary"></i></a> |
                        <a href="<?= base_url('/admspanduk/deletespanduk/' . $item['id_spanduk']); ?>" onclick="return confirm('apakah anda yakin?');"><i class="fas fa-trash-alt text-danger"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <?= $pager->links('spanduk', 'bootstrap_pagination'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>