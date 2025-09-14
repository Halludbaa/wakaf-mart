<?php

namespace App\Controllers;

use App\Models\MdlUser;

class AdmUser extends BaseController
{
    protected $MdlUser;

    public function __construct()
    {
        $this->MdlUser = new MdlUser();
    }

    public function index()
    {
        $users = $this->MdlUser->paginate(10, 'user');

        $data = [
            'users' => $users,
            'title' => 'Data Pengguna',
            'activeMenu' => 'data_user',
            'pager' => $this->MdlUser->pager,
            'nomor' => nomor($this->request->getVar('page_user'), 10),
        ];

        return view('admuser', $data);
    }

    public function addUser()
    {
        $data = [
            'title' => 'Tambah Pengguna',
            'activeMenu' => 'tambah_user'
        ];
        return view('adduser', $data);
    }

    public function saveUser()
    {
        // validasi
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                    'is_unique' => 'Field {field} sudah terdaftar.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                    'is_unique' => 'Field {field} sudah terdaftar.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]',
            ],
        ])) {
            return redirect()->to('/admuser/adduser')->withInput();
        }

        $this->MdlUser->save([
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => $this->request->getVar('password'),
            'active' => 1
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admuser');
    }

    public function editUser($id_user)
    {
        $users = $this->MdlUser->find($id_user);

        $data = [
            'users' => $users,
            'title' => 'Edit Pengguna',
            'activeMenu' => 'edit_user'
        ];

        return view('edituser', $data);
    }

    public function updateUser($id_user)
    {
        // validasi
        if (!$this->validate([
            'id' => [
                'rules' => 'required|min_length[1]',
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
                'errors' => [
                    'required' => 'Field {field} harus diisi!',
                    'is_unique' => 'Field {field} sudah terdaftar.'
                ]
            ],
        ])) {
            return redirect()->to('/admuser/edituser/' .$id_user)->withInput();
        }

        $password = $this->request->getVar('password');

        if ($password != '') {
            $this->MdlUser->update($id_user, [
                'email' => $this->request->getVar('email'),
                'password_hash' => $this->request->getVar('password'),
            ]);
        } else {
            $this->MdlUser->update($id_user, [
                'email' => $this->request->getVar('email'),
            ]);
        }

        session()->setFlashdata('pesan', 'Data berhasil diperbarui.');

        return redirect()->to('/admuser');
    }

    public function deleteUser($id_user)
    {
        $this->MdlUser->delete($id_user);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admuser');
    }
}
