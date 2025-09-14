<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <form action="<?= site_url('/admpengaturan/updatepengaturan/' . ($pengaturan['id_pengaturan'])); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="logoLama" value="<?= $pengaturan['logo']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo">
                                    <label class="custom-file-label" for="logo"><?= $pengaturan['logo']; ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_yayasan">Nama Yayasan</label>
                                <input type="text" class="form-control" id="nama_yayasan" name="nama_yayasan" value="<?= $pengaturan['nama_yayasan']; ?>" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="alamat1">Alamat 1</label>
                                <textarea id="alamat1" class="form-control" name="alamat1"><?= $pengaturan['alamat1']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat2">Alamat 2</label>
                                <textarea id="alamat2" class="form-control" name="alamat2"><?= $pengaturan['alamat2']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $pengaturan['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No.Telpon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $pengaturan['no_telp']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No.HP/WA</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $pengaturan['no_hp']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="profil">Profil</label>
                                <textarea id="profil" class="form-control" name="profil"><?= $pengaturan['profil']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="visi">Visi</label>
                                <textarea id="visi" class="form-control" name="visi"><?= $pengaturan['visi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="misi">Misi</label>
                                <textarea id="misi" class="form-control" name="misi"><?= $pengaturan['misi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $pengaturan['instagram']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $pengaturan['facebook']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tiktok">Tiktok</label>
                                <input type="text" class="form-control" id="tiktok" name="tiktok" value="<?= $pengaturan['tiktok']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="<?= $pengaturan['youtube']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="midtrans">Midtrans Environment</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="midtrans_environment" id="sandbox" value="sandbox" <?= ($pengaturan['midtrans_environment'] == 'sandbox' ? 'checked':''); ?>>
                                    <label class="form-check-label" for="sandbox">
                                        Sandbox
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="midtrans_environment" id="production" value="production" <?= ($pengaturan['midtrans_environment'] == 'production' ? 'checked':''); ?>>
                                    <label class="form-check-label" for="production">
                                        Production
                                    </label>
                                </div>
                                <i class="fas fa-arrow-right"></i> Lihat <a href="<?= base_url('admin/Panduan_Midtrans.pdf'); ?>" target="_blank">Panduan Midtrans</a> agar dapat melakukan transaksi Donasi.
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" value="Update">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(function() {
        // Summernote
        $('#profil').summernote()
        $('#visi').summernote()
        $('#misi').summernote()
    });
</script>
<?= $this->endSection(); ?>