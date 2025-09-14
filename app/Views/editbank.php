<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <form action="<?= site_url('/admbank/updatebank/' . ($bank['id_bank'])); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="logo_bank_lama" value="<?= $bank['logo_bank']; ?>">
                        <input type="hidden" name="file_qris_lama" value="<?= $bank['file_qris']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="logo_bank">Logo Bank</label><br />
                                <?php if (file_exists(FCPATH . 'front/images/bank/') . $bank['logo_bank']): ?>
                                <img src="<?= base_url('front/images/bank/') . $bank['logo_bank'] ?>" width="150" alt="Logo" class="mb-3">
                                <?php endif; ?>
                                <input type="file" class="form-control <?= (validation_show_error('logo_bank')) ? 'is-invalid' : ''; ?>" id="logo_bank" name="logo_bank" onchange="readLogo(event)">
                                <div class="text-muted">Silahkan pilih Logo baru untuk mengganti logo yang lama, Format Logo: jpg/jpeg/png</div>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('logo_bank'); ?>
                                </div>
                                <img id='output' class="mt-3 mb-2" style="width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="bank" <?= ($bank['jenis'] == 'bank' ? 'checked':''); ?> <?= ($bank['jenis'] != 'midtrans' ? '':'disabled'); ?>>
                                    <label class="form-check-label" for="inlineRadio1">Bank</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio2" value="midtrans" <?= ($bank['jenis'] == 'midtrans' ? 'checked':''); ?> <?= ($bank['jenis'] == 'midtrans' ? '':'disabled'); ?>>
                                    <label class="form-check-label" for="inlineRadio2">Midtrans</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio3" value="qris" <?= ($bank['jenis'] == 'qris' ? 'checked':''); ?> <?= ($bank['jenis'] != 'midtrans' ? '':'disabled'); ?>>
                                    <label class="form-check-label" for="inlineRadio3">QRIS</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_bank">Nama Bank</label>
                                <input type="text" class="form-control <?= (validation_show_error('nama_bank')) ? 'is-invalid' : ''; ?>" id="nama_bank" placeholder="Nama Bank" name="nama_bank" value="<?= $bank['nama_bank']; ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('nama_bank'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rekening_bank">Nomor Rekening</label>
                                <input type="text" class="form-control <?= (validation_show_error('rekening_bank')) ? 'is-invalid' : ''; ?>" id="rekening_bank" placeholder="Nomor Rekening" name="rekening_bank" value="<?= $bank['rekening_bank']; ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('rekening_bank'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pemilik_bank">Pemilik/Atas Nama Bank</label>
                                <input type="text" class="form-control <?= (validation_show_error('pemilik_bank')) ? 'is-invalid' : ''; ?>" id="pemilik_bank" placeholder="Pemilik/Atas Nama Bank" name="pemilik_bank" value="<?= $bank['pemilik_bank']; ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('pemilik_bank'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file_qris">Gambar QRIS (Hanya untuk QRIS)</label><br />
                                <?php if ($bank['file_qris'] != '' && file_exists(FCPATH . 'front/images/bank/') . $bank['file_qris']): ?>
                                <img src="<?= base_url('front/images/bank/') . $bank['file_qris'] ?>" width="150" alt="Logo" class="mb-3">
                                <?php endif; ?>
                                <input type="file" class="form-control <?= (validation_show_error('file_qris')) ? 'is-invalid' : ''; ?>" id="file_qris" name="file_qris">
                                <div class="text-muted">Silahkan pilih Gambar baru untuk mengganti gambar yang lama, Format Logo: jpg/jpeg/png</div>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('file_qris'); ?>
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
<?= $this->section('script'); ?>
<script type="text/javascript">
    var readLogo = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('output');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    };
</script>
<?= $this->endSection(); ?>