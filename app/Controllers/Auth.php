<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->usersModel = new \App\Models\UsersModel();
    }
    public function index()
    {
        // 
    }

    public function login()
    {
        if (session('id_user')) {
            return redirect()->to('/');
        }
        return view('auth/viewlogin.php');
    }

    public function loginProcess()
    {
        session();
        $post = $this->request->getPost();
        $query = $this->usersModel->getWhere(['email_user' => $post['email']]);
        $user = $query->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password_user)) {
                $params = ['id_user' => $user->id_user];
                session()->set($params);
                return redirect()->to(site_url('/'));
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai!');
            }
        } else {
            return redirect()->back()->with('error', 'Email belum terdaftar!');
        }
        // session()->setFlashdata('error', 'The action you requested is not allowed');
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }
}
