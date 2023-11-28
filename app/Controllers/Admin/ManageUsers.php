<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;
use Myth\Auth\Controllers\AuthController;
use Config\Services;

// use \Myth\Auth\Entities\User;
// use \Myth\Auth\Authorization\GroupModel;
// use \Myth\Auth\Config\Auth as AuthConfig;

class ManageUsers extends BaseController
{
    protected $db, $builder;
    protected $myth_userModel;

    protected $auth;

    // protected $config;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->myth_userModel = new UserModel();

        // $this->config = config('Auth');
        $this->auth = service('authentication');
    }
    public function index()
    {

        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        // $users = $this->_user_model->getUser();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers',
            'role' => 'all',
            // 'config' => $this->config,
            'users' => $query->getResult(),
        ];
        // $data2['datauser'] = $query;
        return view('admin/manageusers/viewmanageusers', $data);
    }

    public function create()
    {
        session();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers',
            'validation' => Services::validation(),
        ];

        return view('admin/manageusers/viewadduser', $data);
    }

    public function save()
    {
        $users = $this->myth_userModel->getUser();

        $user_myth = new UserModel();
        // membuat validasi
        $validationRule = [
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Field wajib diisi.'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|max_length[254]|valid_email',
                'errors' => [
                    'required' => 'Field wajib diisi.',
                    'valid_email' => 'Email tidak valid'
                ]
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = [
                'errors' => $this->validator->getErrors(),
                'menu' => 'manage',
                'submenu' => 'manageusers',
                'users' => $users,
                'role' => 'all'
            ];
            return view('admin/manageusers/viewmanageusers.php', $data);

            // session()->setFlashdata('error', $this->validator->listErrors());
            // return redirect()->back()->withInput();
        } else {
            $data = new User([
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'email' => $this->request->getVar('email'),
                // 'password_hash' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                // 'password_hash' => Password::hash("123456"),
                'prodi' => $this->request->getVar('prodi'),
                'no_hp' => $this->request->getVar('no_hp'),
            ]);
            $data->setPassword('amalia123');

            // $user = $user_myth->withGroup($this->request->getVar('role'))->insert($data);
            $user_myth->withGroup($this->request->getVar('role'))->insert($data);

            session()->setFlashdata('success', 'Berhasil Menambahkan User!');
            return redirect()->to(site_url('manage_users'));

            // try {
            //     $user = new User([
            //         'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            //         'email' => $this->request->getVar('email'),
            //         // 'password_hash' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            //         // 'password_hash' => Password::hash("123456"),
            //         'prodi' => $this->request->getVar('prodi'),
            //         'no_hp' => $this->request->getVar('no_hp'),
            //     ]);
            //     $user->setPassword('amalia123');
            //     $user_myth->withGroup($this->request->getVar('role'))->insert([$user]);
            //     dd($user);

            //     // session()->setFlashdata('success', 'Berhasil Menambahkan User!');
            //     // return redirect()->to(site_url('manage_users'));
            // } catch (\Exception $e) {
            //     dd($e->getMessage());
            // }
        }


        // return redirect()->to(site_url('manage_users'));
    }

    public function store()
    {
        $user = new User();
        // $user->nama_lengkap = $this->request->getVar('nama_lengkap');
        $user->email = $this->request->getVar('email');
        // $user->prodi = $this->request->getVar('prodi');
        // $user->no_hp = $this->request->getVar('no_hp');
        $user->setPassword('amalia123');

        $model = Services::model(UserModel::class);

        if ($model->save($user)) {
            session()->setFlashdata('success', 'Berhasil Menambahkan User!');
            return redirect()->to(site_url('manage_users'));
        } else {
            return redirect()->back()->with('errors', $model->errors());
        }
    }

    public function santri()
    {
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->where('auth_groups.id', 3)->get();

        // $users = $this->_user_model->getUser();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers',
            'role' => 'santri',
            'users' => $query->getResult(),
        ];
        // $data2['datauser'] = $query;
        return view('admin/manageusers/viewmanageusers', $data);
    }
    public function admin()
    {
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->where('auth_groups.id', 1)->get();

        // $users = $this->_user_model->getUser();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers',
            'role' => 'admin',
            'users' => $query->getResult(),
        ];
        // $data2['datauser'] = $query;
        return view('admin/manageusers/viewmanageusers', $data);
    }
    public function guru()
    {
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->where('auth_groups.id', 2)->get();

        // $users = $this->_user_model->getUser();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers',
            'role' => 'guru',
            'users' => $query->getResult(),
        ];
        // $data2['datauser'] = $query;
        return view('admin/manageusers/viewmanageusers', $data);
    }
    public function wali()
    {
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->where('auth_groups.id', 4)->get();

        // $users = $this->_user_model->getUser();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers',
            'role' => 'wali',
            'users' => $query->getResult(),
        ];
        // $data2['datauser'] = $query;
        return view('admin/manageusers/viewmanageusers', $data);
    }
}
