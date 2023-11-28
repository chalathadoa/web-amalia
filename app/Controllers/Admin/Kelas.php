<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class Kelas extends BaseController
{
    protected $kelasModel;
    protected $periodeModel;
    protected $userModel;
    protected $ruanganModel;
    protected $builder;

    protected $db;

    public function __construct()
    {
        $this->periodeModel = new \App\Models\PeriodeModel();
        $this->kelasModel = new \App\Models\KelasModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->userModel = new UserModel();
        $this->ruanganModel = new \App\Models\RuanganModel();
    }

    public function index()
    {
        $kelas = $this->db->table('kelas')->select('*')->get();


        // data guru
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $guru = $this->builder->where('auth_groups.id', 2)->get();


        $data = [
            'menu' => 'akademik',
            'submenu' => 'kelas',
            'role' => 'all',
            'class' => $kelas->getResult(),
            'guru' => $guru->getResult()
        ];
        return view('admin/kelas/viewkelas.php', $data);
    }

    public function guru($id = null)
    {

        // data guru
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $guru = $this->builder->where('auth_groups.id', 2)->get();

        // filter guru
        $namaGuru = $this->userModel->getUserNameById($id);
        $kelas_guru = $this->kelasModel->where('pengajar', $namaGuru)->get();

        $data = [
            'menu' => 'akademik',
            'submenu' => 'kelas',
            'role' => $namaGuru,
            'guru' => $guru->getResult(),
            'class' => $kelas_guru->getResult(),
        ];
        // $data2['datauser'] = $query;
        return view('admin/kelas/viewkelas', $data);
    }

    public function create()
    {
        session();
        // data periode
        $periode = $this->periodeModel->getPeriode();
        $ruangan = $this->ruanganModel->getRuangan();

        // data guru
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $guru = $this->builder->where('auth_groups.id', 2)->get();

        $data = [
            'menu' => 'akademik',
            'submenu' => 'kelas',
            'guru' => $guru->getResult(),
            'periode' => $periode,
            'ruangan' => $ruangan
        ];

        return view('admin/kelas/viewaddkelas', $data);
    }

    public function store()
    {
        $id_guru = $this->userModel->getIdByUserName($this->request->getVar('pengajar_name'));
        $this->kelasModel->insert([
            'kode_kelas' => $this->request->getVar('kode_kelas'),
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
            'id_guru' => $id_guru,
            'pengajar' => $this->request->getVar('pengajar_name'),
            'ruangan' => $this->request->getVar('ruangan'),
            'periode' => $this->request->getVar('periode'),
        ]);

        session()->setFlashdata('success', 'Berhasil Menambahkan Class!');
        // session()->setFlashdata('error', 'The action you requested is not allowed!');
        return $this->response->redirect(site_url('manage_class'));
        // return redirect()->to(site_url('manage_users'));
    }

    public function edit($id = null)
    {
        session();
        // data periode
        $periode = $this->periodeModel->getPeriode();
        $ruangan = $this->ruanganModel->getRuangan();

        // data guru
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $guru = $this->builder->where('auth_groups.id', 2)->get();

        if ($id != null) {
            $query = $this->kelasModel->getWhere(['id_kelas' => $id]);
            if ($query->resultID->num_rows > 0) {
                // $db['event'] = $query->getRow();
                $data = [
                    'pageTitle' => 'Update New Kelas',
                    'validation' => \Config\Services::validation(),
                    'menu' => 'akademik',
                    'submenu' => 'kelas',
                    'class' => $this->kelasModel->getKelas($id),
                    'guru' => $guru->getResult(),
                    'periode' => $periode,
                    'ruangan' => $ruangan
                ];
                return view('admin/kelas/vieweditkelas.php', $data);
            } else {
                throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update($id)
    {
        $id_guru = $this->userModel->getIdByUserName($this->request->getVar('pengajar_name'));
        $data = [
            'kode_kelas' => $this->request->getVar('kode_kelas'),
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
            'id_guru' => $id_guru,
            'pengajar' => $this->request->getVar('pengajar_name'),
            'ruangan' => $this->request->getVar('ruangan'),
            'periode' => $this->request->getVar('periode'),
        ];

        $this->kelasModel->update($id, $data);
        session()->setFlashdata('success', 'Kelas berhasil dirubah!');
        $validation = \Config\Services::validation()->listErrors();
        return redirect()->to(site_url('manage_class'))->withInput()->with('validation', $validation);
    }

    public function delete($id)
    {
        $this->kelasModel->delete($id);
        session()->setFlashdata('hapus', 'Kelas berhasil dihapus!');
        return $this->response->redirect(site_url('manage_class'));
    }
    public function trash()
    {
        $kelasdb = $this->kelasModel->getTrashKelas();
        $data = [
            'menu' => 'akademik',
            'submenu' => 'kelas',
            'class' => $kelasdb,
        ];
        return view('admin/kelas/viewtrashkelas.php', $data);
    }
    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('kelas')
                ->set('deleted_at', null, true)
                ->where(['id_kelas' => $id])
                ->update();
        } else {
            $this->db->table('kelas')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('manage_class'))->with('success', 'Data berhasil direstore');
        }
    }
    public function delete2($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->kelasModel->delete($id, true);
            return redirect()->to(site_url('manage_class/trash'))->with('success', 'Data berhasil dihapus permanen');
        } else {
            $this->kelasModel->purgeDeleted();
            return redirect()->to(site_url('manage_class/trash'))->with('success', 'Data Trash berhasil dihapus permanen');
        }
    }
}
