<?php

namespace App\Controllers;

use App\Models\MdlSpanduk;


class AdmSpanduk extends BaseController
{
    protected $MdlSpanduk;


    public function __construct()
    {
        $this->MdlSpanduk = new MdlSpanduk();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
			$spanduk =  $this->MdlSpanduk->like('judul_spanduk', $keyword)
				->orLike('deskripsi_spanduk', $keyword)
				->paginate(10, 'spanduk');
		} else {
            $spanduk = $this->MdlSpanduk->paginate(10, 'spanduk');
        }

        $data = [
            'spanduk' => $spanduk,
            'title' => 'Data Spanduk',
            'activeMenu' => 'data_spanduk',
            'keyword' => $keyword,
            'pager' => $this->MdlSpanduk->pager,
			'nomor' => nomor($this->request->getVar('page_spanduk'), 10),
        ];

        return view('admspanduk', $data);
    }

    public function addSpanduk()
    {
        $data = [
            'title' => 'Tambah Spanduk',
            'activeMenu' => 'tambah_spanduk'
        ];

        return view('addspanduk', $data);
    }

    public function saveSpanduk()
    {
        // validasi
        if (!$this->validate([
            'judul_spanduk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'img' => [
                'rules'  => 'mime_in[img,image/jpeg,image/pjpeg,image/png,image/x-png]|ext_in[img,jpg,jpeg,png]',
                'errors' => []
            ],
        ])) {
            return redirect()->to('/admspanduk/addspanduk')->withInput();
        }

        $imgSpanduk = $this->request->getFile('img');
        if ($imgSpanduk->getError() == 4) {
            $imgNama = 'default.png';
        } else {
            $imgNama = $imgSpanduk->getRandomName();
            $imgSpanduk->move('front/images/slider', $imgNama);
        }

        $this->MdlSpanduk->save([
            'judul_spanduk' => $this->request->getVar('judul_spanduk'),
            'deskripsi_spanduk' => $this->request->getVar('deskripsi_spanduk'),
            'img' => $imgNama
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admspanduk');
    }

    public function editSpanduk($id_spanduk)
    {
        $spanduk = $this->MdlSpanduk->find($id_spanduk);

        $data = [
            'spanduk' => $spanduk,
            'title' => 'Edit Spanduk',
            'activeMenu' => 'edit_spanduk'
        ];

        return view('editspanduk', $data);
    }

    public function updateSpanduk($id_spanduk)
    {
        // validasi
        if (!$this->validate([
            'judul_spanduk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                ]
            ],
            'img' => [
                'rules'  => 'mime_in[img,image/jpeg,image/pjpeg,image/png,image/x-png]|ext_in[img,jpg,jpeg,png]',
                'errors' => []
            ],
        ])) {
            return redirect()->to('/admspanduk/editspanduk/' . $id_spanduk)->withInput();
        }

        $imgSpanduk = $this->request->getFile('img');
        if ($imgSpanduk->getError() == 4) {
            $imgNama = $this->request->getVar('imgLama');
        } else {
            $imgNama = $imgSpanduk->getRandomName();
            $imgSpanduk->move('front/images/slider', $imgNama);
            if ($this->request->getVar('imgLama') != 'default.png' && file_exists(FCPATH . 'front/images/slider/' . $this->request->getVar('imgLama'))) {
                unlink('front/images/slider/' . $this->request->getVar('imgLama'));
            }
        }

        $this->MdlSpanduk->save([
            'id_spanduk' => $id_spanduk,
            'judul_spanduk' => $this->request->getVar('judul_spanduk'),
            'deskripsi_spanduk' => $this->request->getVar('deskripsi_spanduk'),
            'img' => $imgNama
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diperbarui.');

        return redirect()->to('/admspanduk');
    }

    public function deleteSpanduk($id_spanduk)
    {
        $MdlSpanduk = $this->MdlSpanduk->find($id_spanduk);

        if ($MdlSpanduk['img'] != 'default.png' && file_exists(FCPATH . 'front/images/slider/' . $MdlSpanduk['img'])) {
            unlink('front/images/slider/' . $MdlSpanduk['img']);
        }


        $this->MdlSpanduk->delete($id_spanduk);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admspanduk');
    }
}
