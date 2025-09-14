<?php

use Config\Midtrans as MidtransConfig;
use App\Models\MdlPengaturan;

$Mconfig = new MidtransConfig();
$MdlPengaturan = new MdlPengaturan();
$pengaturan = $MdlPengaturan->first();
?>
<!doctype html>
<html lang="en">

<head>
    <link href="<?= base_url('/front/images/') . $pengaturan['logo']; ?>" rel="shortcut icon">
    <?= view('layout/meta'); ?>
    <title>Payment - <?= $pengaturan['nama_yayasan']; ?></title>
    <?= view('layout/css'); ?>
    <?php if ($pengaturan['midtrans_environment'] == 'sandbox') { ?>
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $Mconfig->clientKey; ?>"></script>
    <?php } else { ?>
        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="<?= $Mconfig->clientKey; ?>"></script>
    <?php } ?>
    <script type="text/javascript" src="<?= base_url(); ?>front/js/jquery-3.7.1.min.js"></script>
</head>

<body>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '<?= base_url('midtrans/token') ?>',
                method: 'post',
                data: {
                    id_transaksi: '<?= $id_transaksi ?>',
                    nama_donatur: '<?= $nama_donatur ?>',
                    no_telp_donatur: '<?= $no_telp_donatur ?>',
                    jumlah_donasi: '<?= $jumlah_donasi ?>'
                },
                success: function(data) {
                    snap.pay(data.token, {
                        onSuccess: function(result) {
                            console.log(result);
                            window.location.href = '<?= base_url('/transaksi/complete/' . $id_transaksi) ?>';
                        },
                        onPending: function(result) {
                            console.log(result);
                        },
                        onError: function(result) {
                            console.log(result);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        });
    </script>
</body>

</html>