<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => ''
        ];
        return view('admin/viewhome.php', $data);
    }
}
