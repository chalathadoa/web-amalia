<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class Pelanggaran extends BaseController
{
    protected $pelanggaranModel;
    protected $userModel;
    protected $db, $builder;

    public function __construct()
    {
        $this->pelanggaranModel = new \App\Models\PelanggaranModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->userModel = new UserModel();
    }
    public function index()
    {
        // data santri
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $santri = $this->builder->where('auth_groups.id', 3)->get();

        $pelanggaran = $this->db->table('pelanggaran')->select('*')->get();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'role' => 'all',
            'pelanggaran' => $pelanggaran->getResult(),
            'santri' => $santri->getResult()
        ];
        return view('admin/pelanggaran/viewpelanggaran.php', $data);
    }
    public function santri($id = null)
    {

        // data guru
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $santri = $this->builder->where('auth_groups.id', 3)->get();

        // filter guru
        $namaSantri = $this->userModel->getUserNameById($id);
        $lapor_santri = $this->pelanggaranModel->where('nama_santriwati', $namaSantri)->get();

        $data = [
            'menu' => 'laporan',
            'submenu' => 'pelanggaran',
            'role' => $namaSantri,
            'santri' => $santri->getResult(),
            'pelanggaran' => $lapor_santri->getResult(),
        ];
        // $data2['datauser'] = $query;
        return view('admin/pelanggaran/viewpelanggaran', $data);
    }
    public function add()
    {
        $pelanggaran = $this->pelanggaranModel->getPelanggaran();

        // data santri
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $santri = $this->builder->where('auth_groups.id', 3)->get();


        session();
        $data = [
            'pageTitle' => 'Create New Pelanggaran',
            'validation' => \Config\Services::validation(),
            'menu' => 'laporan',
            'submenu' => 'pelanggaran',
            'events' => $pelanggaran,
            'santri' => $santri->getResult()
        ];
        return view('admin/pelanggaran/viewaddpelanggaran.php', $data);
    }

    public function store()
    {
        $id_santri = $this->userModel->getIdByUserName($this->request->getVar('santri'));
        $this->pelanggaranModel->save([
            'id_santri' => $id_santri,
            'nama_santriwati'         => $this->request->getVar('santri'),
            'jenis_pelanggaran'         => $this->request->getVar('jenis_pelanggaran'),
            'tanggal_pelanggaran'         => $this->request->getVar('tanggal'),
            'hukuman'         => $this->request->getVar('hukuman'),
            'deskripsi_pelanggaran'         => $this->request->getVar('deskripsi_pelanggaran'),
        ]);

        session()->setFlashdata('success', 'Laporan Pelanggaran berhasil dibuat!');
        // session()->setFlashdata('error', 'The action you requested is not allowed!');
        return $this->response->redirect(site_url('pelanggaran'));
    }

    public function detail($id)
    {
        helper('date');
        $dataPelanggaran = $this->pelanggaranModel->find($id);
        // $Udate = $date->format('U');
        // $DTdate = new DateTime("@$Udate");
        // $Rdate = $DTdate->format('d-m-Y');
        $tanggal = $dataPelanggaran['tanggal_pelanggaran'];
        $indoDate = Rdate($tanggal);

        $data = [
            'title' => 'Detail Laporan Pelanggaran',
            'menu' => 'laporan',
            'submenu' => 'pelanggaran',
            'pelanggaran' => $this->pelanggaranModel->getPelanggaran($id),
            'tanggal' => $indoDate,
        ];

        // jika data tidak ada
        if (empty($data['pelanggaran'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pelanggaran tidak ditemukan.');
        }

        return view('admin/pelanggaran/viewdetail.php', $data);
    }

    public function edit($id = null)
    {
        session();
        // data santri
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $santri = $this->builder->where('auth_groups.id', 3)->get();
        if ($id != null) {
            $query = $this->pelanggaranModel->getWhere(['id_pelanggaran' => $id]);
            if ($query->resultID->num_rows > 0) {
                // $db['event'] = $query->getRow();
                $data = [
                    'pageTitle' => 'Edit Laporan Pelanggaran',
                    'validation' => \Config\Services::validation(),
                    'menu' => 'laporan',
                    'submenu' => 'pelanggaran',
                    'pelanggaran' => $this->pelanggaranModel->getPelanggaran($id),
                    'santri' => $santri->getResult(),
                ];
                return view('admin/pelanggaran/vieweditpelanggaran.php', $data);
            } else {
                throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update($id)
    {
        $id_santri = $this->userModel->getIdByUserName($this->request->getVar('santri'));
        $data = [
            'id_santri' => $id_santri,
            'nama_santriwati'         => $this->request->getVar('santri'),
            'jenis_pelanggaran'         => $this->request->getVar('jenis_pelanggaran'),
            'tanggal_pelanggaran'         => $this->request->getVar('tanggal'),
            'hukuman'         => $this->request->getVar('hukuman'),
            'deskripsi_pelanggaran'         => $this->request->getVar('deskripsi_pelanggaran'),
        ];

        $this->pelanggaranModel->update($id, $data);
        session()->setFlashdata('success', 'Laporan Pelanggaran berhasil dirubah!');
        $validation = \Config\Services::validation()->listErrors();
        return redirect()->to(site_url('pelanggaran'))->withInput()->with('validation', $validation);
    }

    public function delete($id)
    {
        $this->pelanggaranModel->delete($id);
        session()->setFlashdata('hapus', 'Laporan Pelanggaran berhasil dihapus!');
        return $this->response->redirect(site_url('pelanggaran'));
    }

    // RECYCLE BIN

    public function trash()
    {
        $pelanggaran = $this->pelanggaranModel->getTrashPelanggaran();
        $data = [
            'menu' => 'laporan',
            'submenu' => 'pelanggaran',
            'pelanggaran' => $pelanggaran,
        ];
        return view('admin/pelanggaran/viewtrashpelanggaran.php', $data);
    }
    // RESTORE FROM TRASH
    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('pelanggaran')
                ->set('deleted_at', null, true)
                ->where(['id_pelanggaran' => $id])
                ->update();
        } else {
            $this->db->table('pelanggaran')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('pelanggaran'))->with('success', 'Data berhasil direstore');
        }
    }

    // DELETED PERMANENTLY
    public function delete2($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->pelanggaranModel->delete($id, true);
            return redirect()->to(site_url('pelanggaran/trash'))->with('success', 'Data berhasil dihapus permanen');
        } else {
            $this->pelanggaranModel->purgeDeleted();
            return redirect()->to(site_url('pelanggaran/trash'))->with('success', 'Data Trash berhasil dihapus permanen');
        }
    }
}
