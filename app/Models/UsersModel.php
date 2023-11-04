<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_user', 'prodi', 'email_user', 'password_user', 'no_hp', 'tanggal_lahir', 'tahun_masuk', 'alamat'];
    protected $dateFormat    = 'datetime';
}
