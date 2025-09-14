<?php

namespace App\Controllers;

use App\Models\MdlDonasi;
use App\Models\MdlSpanduk;
use App\Models\MdlArtikel;
use App\Models\MdlTransaksi;
use App\Models\MdlPengaturan;

class Home extends BaseController
{
    protected $MdlDonasi;
    protected $MdlSpanduk;
    protected $MdlArtikel;
    protected $MdlTransaksi;
    protected $MdlPengaturan;

    public function __construct()
    {
        $this->MdlDonasi = new MdlDonasi();
        $this->MdlSpanduk = new MdlSpanduk();
        $this->MdlArtikel = new MdlArtikel();
        $this->MdlTransaksi = new MdlTransaksi();
        $this->MdlPengaturan = new MdlPengaturan();
    }

    public function index()
    {
        $MdlDonasi = $this->MdlDonasi->findAll();
        $MdlSpanduk = $this->MdlSpanduk->findAll();
        $MdlArtikel = $this->MdlArtikel->findAll();

        $models = [
            'jumlahTransaksi' => [$this->MdlTransaksi, 'countAll'],
            'jumlahDonasi' => [$this->MdlDonasi, 'countAll'],
            'totalDonasi' => [$this->MdlTransaksi, 'getTotalDonasi']
        ];

        $data = [
            'title' => 'Home',
            'donasi' => $MdlDonasi,
            'spanduk' => $MdlSpanduk,
            'artikel' => $MdlArtikel,
            'pengaturan' => $this->MdlPengaturan->first(),
        ];

        foreach ($models as $key => $modelMethod) {
            [$model, $method] = $modelMethod;
            $data[$key] = $model->$method();
        }

        return view('home', $data);
    }
}
