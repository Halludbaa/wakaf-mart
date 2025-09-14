<?php

use Config\Midtrans as MidtransConfig;
use App\Models\MdlPengaturan;

$Mconfig = new MidtransConfig();
$MdlPengaturan = new MdlPengaturan();
$pengaturan = $MdlPengaturan->first();
?>
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content py-5 bg-light">
    <div class="container pt-4 mt-4">
        <form id="payment-form" method="post">
            <?= csrf_field(); ?>
            <div class="row align-items-start">
                <!-- Form Donasi -->
                <div class="col-lg-6 mb-5">
                    <div class="bg-white p-4 rounded shadow-sm">
                        <h2 class="mb-4 text-success">Silakan Masukkan Data Anda</h2>

                        <input type="hidden" name="id_donasi" value="<?= $donasi['id_donasi']; ?>">

                        <!-- Judul Donasi -->
                        <div class="mb-4">
                            <h5 class="fw-bold">Donasi: <?= $donasi['nama_donasi']; ?></h5>
                        </div>

                        <!-- Jumlah Donasi -->
                        <div class="mb-3">
                            <label for="jumlah_donasi" class="form-label">Jumlah Donasi</label>
                            <input type="text" name="jumlah_donasi" id="jumlah_donasi" class="form-control" placeholder="Rp." required autofocus>
                        </div>

                        <!-- Nama Donatur -->
                        <div class="mb-3">
                            <label for="nama_donatur" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_donatur" id="nama_donatur" class="form-control" placeholder="Nama Lengkap" required>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-3">
                            <label for="no_telp_donatur" class="form-label">No Telepon (WhatsApp)</label>
                            <input type="text" name="no_telp_donatur" id="no_telp_donatur" class="form-control" placeholder="08xxxxxxxxxx" required>
                        </div>

                        <!-- Pesan Donatur -->
                        <div class="mb-4">
                            <label for="pesan_donatur" class="form-label">Pesan</label>
                            <textarea name="pesan_donatur" id="pesan_donatur" class="form-control" placeholder="Pesan untuk penerima" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Metode Pembayaran + Motivasi -->
                <div class="col-lg-6">
                    <!-- Metode Pembayaran -->
                    <div class="bg-white p-4 rounded shadow-sm mb-4">
                        <h4 class="mb-3">Pilih Metode Pembayaran</h4>
                        <div class="list-group">
                            <label class="list-group-item d-flex align-items-center">
                                <input class="form-check-input me-2" type="radio" name="metode_pembayaran" value="bank">
                                Transfer Bank
                            </label>
                            <!-- Bank Preview -->
                            <div id="bank-section" class="mt-4 d-none">
                                <ul class="list-unstyled ms-5">
                                    <?php foreach ($bank as $b) : ?>
                                        <li><input class="form-check-input me-2 mb-4" type="radio" name="id_bank_bank" value="<?= $b['id_bank']; ?>">
                                            <img src="<?= base_url('front/images/bank/') . $b['logo_bank']; ?>" width="100" title="<?= $b['nama_bank']; ?>" alt="<?= $b['nama_bank']; ?>"> <?= $b['nama_bank']; ?> (<?= $b['rekening_bank']; ?>)
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <label class="list-group-item d-flex align-items-center">
                                <input class="form-check-input me-2" type="radio" name="metode_pembayaran" value="midtrans">
                                Midtrans (Payment Gateway)
                            </label>
                            <!-- Midtrans Preview -->
                            <div id="midtrans-section" class="mt-4 d-none">
                                <ul class="list-unstyled ms-5">
                                    <?php foreach ($midtrans as $b) : ?>
                                        <li><input class="form-check-input me-2 mb-3" type="radio" name="id_bank_midtrans" value="<?= $b['id_bank']; ?>">
                                            <img src="<?= base_url('front/images/bank/') . $b['logo_bank']; ?>" width="100" title="<?= $b['nama_bank']; ?>" alt="<?= $b['nama_bank']; ?>"> <?= $b['nama_bank']; ?> (<?= $b['rekening_bank']; ?>)
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <label class="list-group-item d-flex align-items-center">
                                <input class="form-check-input me-2" type="radio" name="metode_pembayaran" value="qris">
                                QRIS
                            </label>
                            <!-- QRIS Preview -->
                            <div id="qris-section" class="mt-4 d-none">
                                <ul class="list-unstyled ms-5">
                                    <?php foreach ($qris as $b) : ?>
                                        <li><input class="form-check-input me-2 mb-3" type="radio" name="id_bank_qris" value="<?= $b['id_bank']; ?>">
                                            <img src="<?= base_url('front/images/bank/') . $b['logo_bank']; ?>" width="100" title="<?= $b['nama_bank']; ?>" alt="<?= $b['nama_bank']; ?>"> <?= $b['nama_bank']; ?> (<?= $b['rekening_bank']; ?>)
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="id_bank" id="id_bank_hidden">
                        <br />
                        <!-- Tombol -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg" id="pay-button">
                                Lanjut Donasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Motivasi -->
        <div class="text-center px-4 pt-4">
            <h1 class="fw-bold text-dark mb-3" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                Dari kita untuk kita
            </h1>
            <h3 class="text-success fw-bold mb-2" style="text-shadow: 1px 1px 1px rgba(0,0,0,0.2);">
                #ManusiaDermawan
            </h3>
            <p class="lead text-muted" style="text-shadow: 1px 1px 1px rgba(0,0,0,0.1);">
                "Sedekah akan membuka pintu rezeki dari arah yang tidak disangka sebelumnya."
            </p>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    const metodeRadios = document.querySelectorAll('input[name="metode_pembayaran"]');
    const bankSection = document.getElementById('bank-section');
    const midtransSection = document.getElementById('midtrans-section');
    const qrisSection = document.getElementById('qris-section');

    metodeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            // Sembunyikan semua section terlebih dahulu
            bankSection.classList.add('d-none');
            midtransSection.classList.add('d-none');
            qrisSection.classList.add('d-none');

            // Uncheck semua radio "id_bank" terlebih dahulu
            document.querySelectorAll('#bank-section input[name="id_bank_bank"], #midtrans-section input[name="id_bank_midtrans"], #qris-section input[name="id_bank_qris"]').forEach(el => el.checked = false);

            // Tampilkan section sesuai pilihan
            if (this.value === 'bank') {
                bankSection.classList.remove('d-none');
            } else if (this.value === 'midtrans') {
                midtransSection.classList.remove('d-none');
            } else if (this.value === 'qris') {
                qrisSection.classList.remove('d-none');
            }
        });
    });

    // Trigger default checked saat load halaman
    document.querySelector('input[name="metode_pembayaran"]:checked')?.dispatchEvent(new Event('change'));

    // Validasi saat submit
    document.getElementById('payment-form').addEventListener('submit', function(e) {
        const metode = document.querySelector('input[name="metode_pembayaran"]:checked')?.value;

        if (metode === 'bank') {
            const selectedBank = document.querySelector('#bank-section input[name="id_bank_bank"]:checked');
            if (!selectedBank) {
                e.preventDefault(); // batalkan submit
                alert('Silakan pilih salah satu bank terlebih dahulu.');
                // Highlight section (opsional)
                document.getElementById('bank-section').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        } else if (metode === 'midtrans') {
            const selectedMidtrans = document.querySelector('#midtrans-section input[name="id_bank_midtrans"]:checked');
            if (!selectedMidtrans) {
                e.preventDefault(); // batalkan submit
                alert('Silakan pilih salah satu bank Midtrans terlebih dahulu.');
                // Highlight section (opsional)
                document.getElementById('midtrans-section').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        } else if (metode === 'qris') {
            const selectedQris = document.querySelector('#qris-section input[name="id_bank_qris"]:checked');
            if (!selectedQris) {
                e.preventDefault(); // batalkan submit
                alert('Silakan pilih salah satu bank QRIS terlebih dahulu.');
                // Highlight section (opsional)
                document.getElementById('qris-section').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    });

    function syncSelectedBankId() {
        const metode = $('input[name="metode_pembayaran"]:checked').val();
        let selected = null;

        if (metode === 'bank') {
            selected = $('input[name="id_bank_bank"]:checked').val();
        } else if (metode === 'midtrans') {
            selected = $('input[name="id_bank_midtrans"]:checked').val();
        } else if (metode === 'qris') {
            selected = $('input[name="id_bank_qris"]:checked').val();
        }

        $('#id_bank_hidden').val(selected || '');
        return selected;
    }
</script>

<!-- Midtrans -->
<?php if ($pengaturan['midtrans_environment'] == 'sandbox') { ?>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $Mconfig->clientKey; ?>"></script>
<?php } else { ?>
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="<?= $Mconfig->clientKey; ?>"></script>
<?php } ?>
<!-- -->

<script>
    $(document).ready(function() {
        // Tampilkan section sesuai pilihan
        $('input[name="metode_pembayaran"]').on('change', function() {
            $('#bank-section, #midtrans-section, #qris-section').addClass('d-none');
            $('input[name^="id_bank_"]').prop('checked', false);

            if (this.value === 'bank') {
                $('#bank-section').removeClass('d-none');
            } else if (this.value === 'midtrans') {
                $('#midtrans-section').removeClass('d-none');
            } else if (this.value === 'qris') {
                $('#qris-section').removeClass('d-none');
            }

            syncSelectedBankId();
        });

        // Sinkron saat radio bank dipilih
        $('input[name^="id_bank_"]').on('change', syncSelectedBankId);

        // Default load
        $('input[name="metode_pembayaran"]:checked')?.trigger('change');

        $('#payment-form').submit(function(event) {
            event.preventDefault();

            const metode = $('input[name="metode_pembayaran"]:checked').val();
            const selectedBankId = syncSelectedBankId();

            if (!metode || !selectedBankId) {
                alert('Silakan pilih salah satu bank terlebih dahulu.');
                return;
            }

            if (metode === 'bank') {
                this.action = '<?= base_url('transaksi/bayar-bank') ?>';
                this.submit();
            } else if (metode === 'qris') {
                this.action = '<?= base_url('transaksi/bayar-qris') ?>';
                this.submit();
            } else if (metode === 'midtrans') {
                $.ajax({
                    url: '<?= base_url('transaksi/getSnapToken') ?>',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.token) {
                            snap.pay(response.token, {
                                onSuccess: function(result) {
                                    $.post('<?= base_url('transaksi/complete') ?>', {
                                        id_donasi: $('input[name="id_donasi"]').val(),
                                        nama_donatur: $('input[name="nama_donatur"]').val(),
                                        no_telp_donatur: $('input[name="no_telp_donatur"]').val(),
                                        pesan_donatur: $('textarea[name="pesan_donatur"]').val(),
                                        jumlah_donasi: $('input[name="jumlah_donasi"]').val(),
                                        metode_pembayaran: metode,
                                        id_bank: selectedBankId,
                                        order_id: result.order_id
                                    }, function() {
                                        window.location.href = '<?= base_url('/transaksi/success') ?>';
                                    });
                                }
                            });
                        } else {
                            alert('Gagal mendapatkan SnapToken');
                        }
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>