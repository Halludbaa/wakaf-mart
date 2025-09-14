<?php

namespace App\Controllers;

use App\Models\MdlTransaksi;
use App\Models\MdlDonasi;
use App\Models\MdlBank;

class AdmTransaksi extends BaseController
{
    protected $MdlTransaksi;
    protected $MdlDonasi;
    protected $MdlBank;


    public function __construct()
    {
        $this->MdlTransaksi = new MdlTransaksi();
        $this->MdlDonasi = new MdlDonasi();
        $this->MdlBank = new MdlBank();
    }

    public function index()
    {
        $transaksi = $this->MdlTransaksi->getTransaksiWithDonasi();

        $data = [
            'transaksi' => $transaksi,
            'title' => 'Data Transaksi',
            'activeMenu' => 'data_transaksi',
            'pager' => $this->MdlTransaksi->pager,
            'nomor' => nomor($this->request->getVar('page_transaksi'), 10),
            'totalJumlah' => $this->MdlTransaksi->getTotalDonasi()
        ];

        return view('admtransaksi', $data);
    }

    public function addTransaksi()
    {
        $data = [
            'title' => 'Tambah Transaksi',
            'donasi' => $this->MdlTransaksi->getDonasi(),
            'bank' => $this->MdlBank->where(['jenis' => 'bank', 'active' => 1])->findAll(),
            'midtrans' => $this->MdlBank->where(['jenis' => 'midtrans', 'active' => 1])->findAll(),
            'qris' => $this->MdlBank->where(['jenis' => 'qris', 'active' => 1])->findAll(),
            'activeMenu' => 'tambah_transaksi'
        ];
        return view('addtransaksi', $data);
    }

    public function saveTransaksi()
    {
        // validasi
        if (!$this->validate([
            'nama_donasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'nama_donatur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'no_telp_donatur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'jumlah_donasi' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'metode_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'id_bank' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
        ])) {
            return redirect()->to('/admtransaksi/addtransaksi')->withInput();
        }

        // Ambil nilai donasi
        $id_donasi = $this->request->getVar('nama_donasi');
        $jumlah_donasi = $this->request->getVar('jumlah_donasi');

        // Simpan data transaksi baru
        $this->MdlTransaksi->save([
            'id_donasi' => $id_donasi,
            'nama_donatur' => $this->request->getVar('nama_donatur'),
            'no_telp_donatur' => $this->request->getVar('no_telp_donatur'),
            'pesan_donatur' => $this->request->getVar('pesan_donatur'),
            'jumlah_donasi' => $jumlah_donasi,
            'metode_pembayaran' => $this->request->getVar('metode_pembayaran'),
            'id_bank' => $this->request->getVar('id_bank'),
            'status' => $this->request->getVar('status'),
        ]);

        // Ambil total perolehan donasi saat ini
        $perolehan_donasi = $this->MdlDonasi->find($id_donasi)['perolehan_donasi'];

        // Update perolehan_donasi di data_donasi
        $perolehan_donasi += $jumlah_donasi;
        $this->MdlDonasi->save([
            'id_donasi' => $id_donasi,
            'perolehan_donasi' => $perolehan_donasi,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admtransaksi');
    }

    public function editTransaksi($id_transaksi)
    {
        $transaksi = $this->MdlTransaksi->find($id_transaksi);

        $data = [
            'transaksi' => $transaksi,
            'title' => 'Edit Transaksi',
            'bank' => $this->MdlBank->where(['jenis' => 'bank', 'active' => 1])->findAll(),
            'midtrans' => $this->MdlBank->where(['jenis' => 'midtrans', 'active' => 1])->findAll(),
            'qris' => $this->MdlBank->where(['jenis' => 'qris', 'active' => 1])->findAll(),
            'activeMenu' => 'edit_transaksi'
        ];

        return view('edittransaksi', $data);
    }

    public function updateTransaksi($id_transaksi)
    {
        // validasi
        if (!$this->validate([
            'nama_donatur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'no_telp_donatur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
        ])) {
            return redirect()->to('/admtransaksi/edittransaksi/' . $id_transaksi)->withInput();
        }

        // Ambil data transaksi berdasarkan id_transaksi
        $transaksi = $this->MdlTransaksi->find($id_transaksi);

        // Ambil data donasi berdasarkan id_donasi dari transaksi
        $donasi = $this->MdlDonasi->find($transaksi['id_donasi']);

        // Ambil nilai tambah_donasi dan kurang_donasi dari input form
        $tambah_donasi = $this->request->getVar('tambah_donasi');
        $kurang_donasi = $this->request->getVar('kurang_donasi');

        // Hitung jumlah_donasi yang baru
        $jumlah_donasi_baru = $transaksi['jumlah_donasi'];

        if ($tambah_donasi) {
            $jumlah_donasi_baru += $tambah_donasi;
        }

        if ($kurang_donasi) {
            $jumlah_donasi_baru -= $kurang_donasi;
        }

        // Update data transaksi
        $this->MdlTransaksi->update($id_transaksi, [
            'id_donasi' => $donasi['id_donasi'],
            'nama_donatur' => $this->request->getVar('nama_donatur'),
            'no_telp_donatur' => $this->request->getVar('no_telp_donatur'),
            'jumlah_donasi' => $jumlah_donasi_baru,
            'pesan_donatur' => $this->request->getVar('pesan_donatur'),
            'metode_pembayaran' => $this->request->getVar('metode_pembayaran'),
            'id_bank' => $this->request->getVar('id_bank'),
            'status' => $this->request->getVar('status'),
        ]);

        // Update perolehan_donasi di data_donasi
        $perolehan_donasi_baru = $donasi['perolehan_donasi'] + ($jumlah_donasi_baru - $transaksi['jumlah_donasi']);
        $this->MdlDonasi->update($donasi['id_donasi'], [
            'perolehan_donasi' => $perolehan_donasi_baru,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate.');

        return redirect()->to('/admtransaksi');
    }


    public function deleteTransaksi($id_transaksi)
    {
        // Ambil data transaksi yang akan dihapus
        $transaksi = $this->MdlTransaksi->find($id_transaksi);

        // Ambil data donasi berdasarkan id_donasi dari transaksi
        $donasi = $this->MdlDonasi->find($transaksi['id_donasi']);

        // Hitung jumlah_donasi yang baru setelah pengurangan transaksi
        $jumlah_donasi_baru = $donasi['perolehan_donasi'] - $transaksi['jumlah_donasi'];

        // Update perolehan_donasi di data_donasi
        $this->MdlDonasi->save([
            'id_donasi' => $donasi['id_donasi'],
            'perolehan_donasi' => $jumlah_donasi_baru,
        ]);

        // Hapus data transaksi
        $this->MdlTransaksi->delete($id_transaksi);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admtransaksi');
    }
}
