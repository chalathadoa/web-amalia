<?php

namespace App\Controllers\Santri;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => ''
        ];
        return view('/santri/viewhome.php', $data);
    }
}
