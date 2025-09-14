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
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
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
                        <a href="<?= base_url('admbank/addbank'); ?>" class="btn btn-primary mb-3">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bank</th>
                                        <th>Rekening</th>
                                        <th>Diperbarui</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bank as $b) : ?>
                                        <tr>
                                            <td><?= $b['id_bank']; ?></td>
                                            <td><img src="<?= base_url('front/images/bank/') . $b['logo_bank']; ?>" width="100"><br /><strong><?= $b['nama_bank']; ?></strong></td>
                                            <td><?= $b['rekening_bank']; ?><br /><?= $b['pemilik_bank']; ?></td>
                                            <td><?= $b['updated_at']; ?></td>
                                            <td>
                                                <a href="<?= site_url('/admbank/editbank/' . $b['id_bank']); ?>"><i class="fas fa-edit text-primary"></i></a> |
                                                <?php if ($b['id_bank'] == 1) { ?>
                                                    <a href="javascript:void(0)"><i class="fas fa-trash-alt text-dark"></i></a>
                                                <?php } else { ?>
                                                    <a href="<?= site_url('/admbank/deletebank/' . $b['id_bank']); ?>" onclick="return confirm('Apakah Anda yakin?');"><i class="fas fa-trash-alt text-danger"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?= $pager->links('bank', 'bootstrap_pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>