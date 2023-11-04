<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManageUsers extends BaseController
{
    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $query   = $builder->get()->getResult();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers',
            'query' => $query,
        ];
        // $data2['datauser'] = $query;
        return view('admin/manageusers/viewmanageusers', $data);
    }
}
