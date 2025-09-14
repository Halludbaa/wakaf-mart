<?php

namespace App\Controllers;

use App\Models\MdlArtikel;

class Artikel extends BaseController
{
    protected $MdlArtikel;

    public function __construct()
    {
        $this->MdlArtikel = new MdlArtikel();
    }

    public function index()
    {
        $MdlArtikel = $this->MdlArtikel->findAll();

        $data = [
            'title' => 'Artikel',
            'artikel' => $MdlArtikel,
        ];
        return view('artikel', $data);
    }

    public function detail($id_artikel)
    {
        $data = [
            'title' => 'Detail Artikel',
            'artikel' => $this->MdlArtikel->getArtikel($id_artikel)
        ];
        return view('detail_artikel', $data);
    }
}
