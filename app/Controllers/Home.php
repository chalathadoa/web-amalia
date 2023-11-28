<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class Home extends BaseController
{
    protected $db, $builder;
    protected $_user_model;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('auth_groups_users');
        $this->_user_model = new UserModel();
    }
    public function index()
    {
        // $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        // $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $santri = $this->builder->where('group_id', 3)->countAllResults();
        $guru = $this->builder->where('group_id', 2)->countAllResults();

        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
            'santri' => $santri,
            'guru' => $guru
        ];
        return view('admin/viewhome.php', $data);
    }

    public function sterbaik()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
        ];
        return view('admin/viewsantriterbaik.php', $data);
    }
}
