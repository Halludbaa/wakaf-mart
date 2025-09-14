<?php

namespace App\Controllers;

use App\Models\MdlPengaturan;

class AdmPengaturan extends BaseController
{
    protected $MdlPengaturan;

    public function __construct()
    {
        $this->MdlPengaturan = new MdlPengaturan();
    }

    public function index()
    {
        $pengaturan = $this->MdlPengaturan->first();

        $data = [
            'pengaturan' => $pengaturan,
            'title' => 'Data Pengaturan',
            'activeMenu' => 'pengaturan'
        ];

        return view('admpengaturan', $data);
    }

    public function updatePengaturan($id)
    {
        $logo = $this->request->getFile('logo');
        if ($logo->getError() == 4) {
            $imgLogo = $this->request->getVar('logoLama');
        } else {
            $imgLogo = $logo->getRandomName();
            $logo->move('front/images', $imgLogo);
            if ($this->request->getVar('logoLama') != 'default.png') {
                unlink('front/images/' . $this->request->getVar('logoLama'));
            }
        }

        $this->MdlPengaturan->update($id, [
            'nama_yayasan' => $this->request->getVar('nama_yayasan'),
            'alamat1' => $this->request->getVar('alamat1'),
            'alamat2' => $this->request->getVar('alamat2'),
            'email' => $this->request->getVar('email'),
            'no_telp' => $this->request->getVar('no_telp'),
            'no_hp' => $this->request->getVar('no_hp'),
            'profil' => $this->request->getVar('profil'),
            'visi' => $this->request->getVar('visi'),
            'misi' => $this->request->getVar('misi'),
            'midtrans_environment' => $this->request->getVar('midtrans_environment'),
            'logo' => $imgLogo,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diperbarui.');

        return redirect()->to('/admpengaturan');
    }

}