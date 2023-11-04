<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Prestasi extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'laporansantriwati',
            'submenu' => 'prestasi'
        ];
        return view('admin/laporan_santriwati/viewprestasi.php', $data);
    }
}
