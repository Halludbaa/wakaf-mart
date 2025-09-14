<?php

namespace App\Controllers;

use App\Models\MdlProgram;
use App\Models\MdlPengaturan;

class Profil extends BaseController
{
    protected $MdlProgram;
    protected $MdlPengaturan;

    public function __construct()
    {
        $this->MdlProgram = new MdlProgram();
        $this->MdlPengaturan = new MdlPengaturan();
    }

    public function index()
    {
        $MdlProgram = $this->MdlProgram->findAll();

        $data = [
            'title' => 'Profil',
            'program' => $MdlProgram,
            'pengaturan' => $this->MdlPengaturan->first(),
        ];
        return view('profil', $data);
    }
}
