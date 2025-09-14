<?php

namespace App\Controllers;

use App\Models\MdlBank;

class AdmBank extends BaseController
{
    protected $MdlBank;

    public function __construct()
    {
        $this->MdlBank = new MdlBank();
    }

    public function index()
    {
        $bank = $this->MdlBank->paginate(10, 'bank');

        $data = [
            'bank' => $bank,
            'title' => 'Data Bank',
            'activeMenu' => 'data_bank',
            'pager' => $this->MdlBank->pager,
            'nomor' => nomor($this->request->getVar('page_bank'), 10),
        ];

        return view('admbank', $data);
    }

    public function addBank()
    {
        $data = [
            'title' => 'Tambah Bank',
            'activeMenu' => 'add_bank'
        ];
        return view('addbank', $data);
    }

    public function saveBank()
    {
        // validasi
        if (!$this->validate([
            'logo_bank' => [
                'rules' => 'uploaded[logo_bank]|is_image[logo_bank]|mime_in[logo_bank,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    'uploaded' => 'Pilih file logo dahulu',
                    'is_image' => 'File yg anda pilih bukan logo',
                    'mime_in' => 'File yg anda pilih bukan logo'
                ]
            ],
            'nama_bank' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'rekening_bank' => [
                'rules' => 'required|is_unique[data_bank.rekening_bank]',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                    'is_unique' => 'Field {field} sudah terdaftar.'
                ]
            ],
            'pemilik_bank' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'file_qris' => [
                'rules' => 'is_image[file_qris]|mime_in[file_qris,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    'is_image' => 'File yg anda pilih bukan gambar',
                    'mime_in' => 'File yg anda pilih bukan gambar'
                ]
            ],
        ])) {
            return redirect()->to('/admbank/addbank')->withInput();
        }

        // ambil file logo
        $fileLogo = $this->request->getFile('logo_bank');
        // generate nama logo random
        $namaLogo = $fileLogo->getRandomName();
        // pindahkan file ke folder images
        $fileLogo->move('front/images/bank/', $namaLogo);

        // ambil file qris
        $fileQris = $this->request->getFile('file_qris');
        // generate nama qris random
        $namaQris = $fileQris->getRandomName();
        // pindahkan file ke folder images
        $fileQris->move('front/images/bank/', $namaQris);

        $this->MdlBank->save([
            'logo_bank' => $namaLogo,
            'nama_bank' => $this->request->getVar('nama_bank'),
            'rekening_bank' => $this->request->getVar('rekening_bank'),
            'pemilik_bank' => $this->request->getVar('pemilik_bank'),
            'jenis' => $this->request->getVar('jenis'),
            'file_qris' => $namaQris,
            'active' => 1
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admbank');
    }

    public function editBank($id_bank)
    {
        $bank = $this->MdlBank->find($id_bank);

        $data = [
            'bank' => $bank,
            'title' => 'Edit Bank',
            'activeMenu' => 'edit_bank'
        ];

        return view('editbank', $data);
    }

    public function updateBank($id_bank)
    {
        // validasi
        if (!$this->validate([
            'logo_bank' => [
                'rules' => 'is_image[logo_bank]|mime_in[logo_bank,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    'is_image' => 'File yg anda pilih bukan logo',
                    'mime_in' => 'File yg anda pilih bukan logo'
                ]
            ],
            'nama_bank' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'rekening_bank' => [
                'rules' => 'required|is_unique[data_bank.rekening_bank,id_bank,' . $id_bank . ']',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                    'is_unique' => 'Field {field} sudah terdaftar.'
                ]
            ],
            'pemilik_bank' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'file_qris' => [
                'rules' => 'is_image[file_qris]|mime_in[file_qris,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    'is_image' => 'File yg anda pilih bukan gambar',
                    'mime_in' => 'File yg anda pilih bukan gambar'
                ]
            ],
        ])) {
            return redirect()->to('/admbank/editbank/' . $id_bank)->withInput();
        }

        $fileLogo = $this->request->getFile('logo_bank');
        if ($fileLogo->getError() == 4) {
            $namaLogo = $this->request->getVar('logo_bank_lama');
        } else {
            $namaLogo = $fileLogo->getRandomName();
            $fileLogo->move('front/images/bank/', $namaLogo);
            if (file_exists('front/images/bank/' . $this->request->getVar('logo_bank_lama'))) {
                unlink('front/images/bank/' . $this->request->getVar('logo_bank_lama'));
            }
        }

        $fileQris = $this->request->getFile('file_qris');
        if ($fileQris->getError() == 4) {
            $namaQris = $this->request->getVar('file_qris_lama');
        } else {
            $namaQris = $fileQris->getRandomName();
            $fileQris->move('front/images/bank/', $namaLogo);
            if (file_exists('front/images/bank/' . $this->request->getVar('file_qris_lama'))) {
                unlink('front/images/bank/' . $this->request->getVar('file_qris_lama'));
            }
        }

        $this->MdlBank->update($id_bank, [
            'logo_bank' => $namaLogo,
            'nama_bank' => $this->request->getVar('nama_bank'),
            'rekening_bank' => $this->request->getVar('rekening_bank'),
            'pemilik_bank' => $this->request->getVar('pemilik_bank'),
            'jenis' => $this->request->getVar('jenis'),
            'file_qris' => $namaQris,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diperbarui.');

        return redirect()->to('/admbank');
    }

    public function deleteBank($id_bank)
    {
        if ($id_bank == 1) {
            session()->setFlashdata('error', 'Data tidak dapat dihapus.');
            return redirect()->to('/admbank');
        }

        $this->MdlBank->delete($id_bank);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admbank');
    }
}
