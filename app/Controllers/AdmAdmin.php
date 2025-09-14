<?php

namespace App\Controllers;

use App\Models\MdlTransaksi;
use App\Models\MdlPengeluaran;
use App\Models\MdlDonasi;
use App\Models\MdlArtikel;
use Y0lk\SQLDumper\SQLDumper;

class AdmAdmin extends BaseController
{
    protected $MdlTransaksi;
    protected $MdlPengeluaran;
    protected $MdlDonasi;
    protected $MdlArtikel;

    public function __construct()
    {
        $this->MdlTransaksi = new MdlTransaksi();
        $this->MdlPengeluaran = new MdlPengeluaran();
        $this->MdlDonasi = new MdlDonasi();
        $this->MdlArtikel = new MdlArtikel();
    }

    public function index()
    {
        $models = [
            'jumlahTransaksi' => [$this->MdlTransaksi, 'countAll'],
            'jumlahPengeluaran' => [$this->MdlPengeluaran, 'countAll'],
            'jumlahDonasi' => [$this->MdlDonasi, 'countAll'],
            'jumlahArtikel' => [$this->MdlArtikel, 'countAll'],
            'totalDonasi' => [$this->MdlTransaksi, 'getTotalDonasi'],
            'totalPengeluaran' => [$this->MdlPengeluaran, 'getTotalPengeluaran']
        ];

        $data = [
            'title' => 'Dashboard',
            'activeMenu' => 'dashboard'
        ];

        foreach ($models as $key => $modelMethod) {
            [$model, $method] = $modelMethod;
            $data[$key] = $model->$method();
        }

        return view('admdashboard', $data);
    }

    public function backupDB()
    {
        $db = \Config\Database::connect();
        $dbname = $db->database;
        $path = WRITEPATH . 'uploads/';

        //Y0lk\SQLDumper\SQLDumper 
        $tanggal = date('dmy-His');
        $filename = $dbname . '-' . $tanggal . '.sql';
        $hostName = env('database.default.hostname');
        $databaseName = env('database.default.database');
        $userName = env('database.default.username');
        $password = env('database.default.password');
        //Init the dumper with your DB info
        $dumper = new SQLDumper($hostName, $databaseName, $userName, $password);
        //Set all tables to dump without data and without DROP statement
        $dumper->allTables()
            ->withData(true)
            ->withDrop(true);
        //This will group DROP statements and put them at the beginning of the dump
        //$dumper->groupDrops(true);
        //This will group INSERT statements and put them at the end of the dump
        //$dumper->groupInserts(true);
        $dumper->save($path . $filename);

        return $this->response->download($path . $filename, null);//download file
    }
}
