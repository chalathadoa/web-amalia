<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class RaportPenilaian extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'laporansantriwati',
            'submenu' => 'raportpenilaian'
        ];
        return view('admin/laporan_santriwati/viewraportpenilaian.php', $data);
    }
}
