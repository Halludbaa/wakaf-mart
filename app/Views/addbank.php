<?= $this->extend('admlayout/template'); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <form action="<?= site_url('/admbank/savebank'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="logo_bank">Logo Bank</label>
                                <input type="file" class="form-control <?= (validation_show_error('logo_bank')) ? 'is-invalid' : ''; ?>" id="logo_bank" name="logo_bank" onchange="readLogo(event)">
                                <div class="text-muted">Format Logo: jpg/jpeg/png</div>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('logo_bank'); ?>
                                </div>
                                <img id='output' class="mt-3 mb-2" style="width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="bank">
                                    <label class="form-check-label" for="inlineRadio1">Bank</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio2" value="midtrans" disabled>
                                    <label class="form-check-label" for="inlineRadio2">Midtrans</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio3" value="qris">
                                    <label class="form-check-label" for="inlineRadio3">QRIS</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_bank">Nama Bank</label>
                                <input type="text" class="form-control <?= (validation_show_error('nama_bank')) ? 'is-invalid' : ''; ?>" id="nama_bank" placeholder="Nama Bank" name="nama_bank" value="<?= old('nama_bank'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('nama_bank'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rekening_bank">Nomor Rekening</label>
                                <input type="text" class="form-control <?= (validation_show_error('rekening_bank')) ? 'is-invalid' : ''; ?>" id="rekening_bank" placeholder="Nomor Rekening" name="rekening_bank" value="<?= old('rekening_bank'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('rekening_bank'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pemilik_bank">Pemilik/Atas Nama Bank</label>
                                <input type="text" class="form-control <?= (validation_show_error('pemilik_bank')) ? 'is-invalid' : ''; ?>" id="pemilik_bank" placeholder="Pemilik/Atas Nama Bank" name="pemilik_bank" value="<?= old('pemilik_bank'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('pemilik_bank'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file_qris">Gambar QRIS (Hanya untuk QRIS)</label>
                                <input type="file" class="form-control <?= (validation_show_error('file_qris')) ? 'is-invalid' : ''; ?>" id="file_qris" name="file_qris">
                                <div class="text-muted">Format Gambar: jpg/jpeg/png</div>
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