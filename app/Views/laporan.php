<?= $this->extend('layout/template'); ?>
<?= $this->section('style'); ?>
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url(); ?>admin/plugins/fontawesome-free/css/all.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus-bootstrap-4/5.39.0/css/tempus-dominus-bootstrap-4.min.css" />
<!-- Daterange picker -->
<link rel="stylesheet" href="<?= base_url(); ?>admin/plugins/daterangepicker/daterangepicker.css">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content py-4">
    <div class="container pt-5 mt-5">
        <div class="row" id="city">
            <div class="col-md-12 text-center">
                <h1 class="text-primary font-bold font-xl">Kepercayaan Adalah Kebanggaan Kami</h1>
                <p class="font-medium font-md">"Kami transparan terhadap kegiatan yang kami lakukan"</p>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Transaksi</h3>
                    </div>
                    <form action="<?= site_url('laporan/laportransaksi/transaksi') ?>" method="get">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="transaksi" name="transaksi">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Donasi</h3>
                    </div>
                    <form action="<?= site_url('laporan/lapordonasi/donasi') ?>" method="get">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="donasi" name="donasi">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Pengeluaran</h3>
                    </div>
                    <form action="<?= site_url('laporan/laporpengeluaran/pengeluaran') ?>" method="get">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="pengeluaran" name="pengeluaran">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Full</h3>
                    </div>
                    <form action="<?= site_url('laporan/laporfull/full') ?>" method="get">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="full" name="full">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus-core/5.39.0/js/tempus-dominus-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus-bootstrap-4/5.39.0/js/tempus-dominus-bootstrap-4.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>admin/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/daterangepicker/daterangepicker.js"></script>
<script>
    $(function() {
        //Date range picker
        $('#transaksi').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
        $('#donasi').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
        $('#pengeluaran').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
        $('#full').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
    })
</script>
<?= $this->endSection(); ?>