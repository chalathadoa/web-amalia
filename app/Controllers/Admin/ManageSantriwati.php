<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManageSantriwati extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'manage',
            'submenu' => 'managesantriwati'
        ];
        return view('admin/managesantriwati/viewmanagesantriwati.php', $data);
    }
}
