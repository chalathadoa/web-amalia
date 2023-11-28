<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class ManageSantriwati extends BaseController
{
    protected $db, $builder;
    protected $_user_model;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->_user_model = new UserModel();
    }
    public function index()
    {
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->where('auth_groups.id', 3)->get();

        // $users = $this->_user_model->getUser();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers',
            'users' => $query->getResult(),
        ];
        // $data2['datauser'] = $query;
        return view('admin/managesantriwati/viewmanagesantriwati', $data);
    }
}
