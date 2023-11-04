<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pelanggaran extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'laporansantriwati',
            'submenu' => 'pelanggaran'
        ];
        return view('admin/laporan_santriwati/viewpelanggaran.php', $data);
    }
}
