<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Jamaah extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'jamaah',
            'submenu' => ''
        ];
        return view('admin/viewjamaah.php', $data);
    }
}
