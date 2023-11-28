<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;


class Raport extends BaseController
{
    protected $db, $builder;

    protected $kriteriaModel;
    protected $periodeModel;

    protected $raportModel;

    protected $userModel;
    public function __construct()
    {
        $this->kriteriaModel = new \App\Models\KriteriaModel();
        $this->periodeModel = new \App\Models\PeriodeModel();
        $this->raportModel = new \App\Models\RaportModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $raport = $this->db->table('raport')->select('*')->get();

        // data santri
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $santri = $this->builder->where('auth_groups.id', 3)->get();


        $data = [
            'menu' => 'laporan',
            'submenu' => 'raport',
            'role' => 'all',
            'raport' => $raport->getResult(),
            'santri' => $santri->getResult()
        ];
        // return view('admin/laporan_santriwati/viewraportpenilaian.php', $data);
        return view('admin/raport/viewraport', $data);
    }

    public function santri($id = null)
    {
        $santri = $this->userModel->getUserById($id);
        $pd = $this->periodeModel->getPeriode();

        // data raport santri per periode
        // $santriPd = $this->raportModel->getRaportbyPeriode($id, $pd);

        // filter santri
        // $namaSantri = $this->userModel->getUserNameById($id);
        // $raportSantri = $this->raportModel->getRaportbySantri($id);
        $raportSantri = $this->db->table('raport')->select('*')->where('id_santri', $id)->get();

        $data = [
            'menu' => 'laporan',
            'submenu' => 'raport',
            'santri' => $santri,
            'raport' => $raportSantri->getResult(),
            'pd' => $pd,
            // 'santriPd' => $santriPd,
        ];
        // dd($raportSantri);
        return view('admin/raport/viewraportsantri', $data);
    }

    public function addpersantri($id)
    {
        $santriname = $this->userModel->getUserNameById($id);
        // data periode
        $periode = $this->periodeModel->getPeriode();

        $raport = $this->db->table('raport')->where('id_santri', $id)->get();

        $data = [
            'menu' => 'laporan',
            'submenu' => 'raport',
            'santriname' => $santriname,
            'santriid' => $id,
            'raport' => $raport->getResult(),
            'periode' => $periode,
        ];

        return view('admin/raport/viewaddraportpersantri', $data);
    }
    public function add()
    {
        session();
        // data periode
        $periode = $this->periodeModel->getPeriode();
        $kriteria = $this->kriteriaModel->getKriteria();

        // data santri
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $santri = $this->builder->where('auth_groups.id', 3)->get();

        $data = [
            'menu' => 'laporan',
            'submenu' => 'raport',
            'santri' => $santri->getResult(),
            'periode' => $periode,
            'kriteria' => $kriteria
        ];

        return view('admin/raport/viewaddraport', $data);
    }
    public function storepersantri($id)
    {
        $idperiode = $this->periodeModel->getPeriodeIdByName($this->request->getVar('periode'));
        $nama_santri = $this->userModel->getUserNameById($id);
        $this->raportModel->insert([
            'id_santri' => $id,
            'nama_santri' => $nama_santri,
            'idperiode' => $idperiode,
            'periode' => $this->request->getVar('periode'),
            'tahfidz' => $this->request->getVar('tahfidz'),
            'jamaah' => $this->request->getVar('jamaah'),
            'kajian' => $this->request->getVar('kajian'),
            'akademis' => $this->request->getVar('akademis'),
            'kebersihan' => $this->request->getVar('kebersihan'),
            'sosial' => $this->request->getVar('sosial'),
            'prestasi' => $this->request->getVar('prestasi'),
            'predikat' => $this->request->getVar('predikat'),
            'predikat_tahfidz' => $this->request->getVar('predikat_tahfidz'),
            'predikat_jamaah' => $this->request->getVar('predikat_jamaah'),
            'predikat_kajian' => $this->request->getVar('predikat_kajian'),
            'predikat_akademis' => $this->request->getVar('predikat_akademis'),
            'predikat_kebersihan' => $this->request->getVar('predikat_kebersihan'),
            'predikat_sosial' => $this->request->getVar('predikat_sosial'),
            'predikat_prestasi' => $this->request->getVar('predikat_prestasi'),
        ]);

        session()->setFlashdata('success', 'Berhasil Menambahkan Raport!');
        return $this->response->redirect(site_url('raport/santri/' . $id));
    }
    public function store()
    {
        $this->raportModel->insert([
            'nama_santri' => $this->request->getVar('nama_santri'),
            'periode' => $this->request->getVar('periode'),
            'kriteria' => $this->request->getVar('kriteria'),
            'nilai' => $this->request->getVar('nilai'),
            'predikat' => $this->request->getVar('predikat'),
        ]);

        session()->setFlashdata('success', 'Berhasil Menambahkan Raport!');
        return $this->response->redirect(site_url('raport'));
    }


    public function print($id = null)
    {
        // data print raport santri
        // $dataPrint = $this->db->table('raport')->where('id_raport', $id)->get();
        $dataPrint = $this->raportModel->getRaport($id);

        $data = [
            'menu' => 'laporan',
            'submenu' => 'raport',
            'raport' => $dataPrint,
        ];
        return view('admin/raport/viewraportprint', $data);
    }
    public function edit($id = null)
    {
        session();
        // data periode
        $periode = $this->periodeModel->getPeriode();
        $kriteria = $this->kriteriaModel->getkriteria();

        // data santri
        $this->builder->select('users.id as userid, username, email, nama_lengkap, user_image, name, no_hp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $santri = $this->builder->where('auth_groups.id', 3)->get();

        if ($id != null) {
            $query = $this->raportModel->getWhere(['id_raport' => $id]);
            if ($query->resultID->num_rows > 0) {
                // $db['event'] = $query->getRow();
                $data = [
                    'pageTitle' => 'Update New Raport',
                    'menu' => 'laporan',
                    'submenu' => 'raport',
                    'raport' => $this->raportModel->getRaport($id),
                    'santri' => $santri->getResult(),
                    'periode' => $periode,
                    'kriteria' => $kriteria
                ];
                return view('admin/raport/vieweditraport.php', $data);
            } else {
                throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update($id)
    {
        $data = [
            'nama_santri' => $this->request->getVar('nama_santri'),
            'periode' => $this->request->getVar('periode'),
            'kriteria' => $this->request->getVar('kriteria'),
            'nilai' => $this->request->getVar('nilai'),
            'predikat' => $this->request->getVar('predikat'),
        ];

        $this->raportModel->update($id, $data);
        session()->setFlashdata('success', 'Raport berhasil dirubah!');
        $validation = \Config\Services::validation()->listErrors();
        return redirect()->to(site_url('raport'))->withInput()->with('validation', $validation);
    }

    public function delete($id)
    {
        $this->raportModel->delete($id);
        session()->setFlashdata('hapus', 'Raport berhasil dihapus!');
        return $this->response->redirect(site_url('raport'));
    }
    public function trash()
    {
        $raportdb = $this->raportModel->getTrashRaport();
        $data = [
            'menu' => 'laporan',
            'submenu' => 'raport',
            'raport' => $raportdb,
        ];
        return view('admin/raport/viewtrashraport.php', $data);
    }
    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('raport')
                ->set('deleted_at', null, true)
                ->where(['id_raport' => $id])
                ->update();
        } else {
            $this->db->table('raport')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('raport'))->with('success', 'Data berhasil direstore');
        }
    }
    public function delete2($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->raportModel->delete($id, true);
            return redirect()->to(site_url('raport/trash'))->with('success', 'Data berhasil dihapus permanen');
        } else {
            $this->raportModel->purgeDeleted();
            return redirect()->to(site_url('raport/trash'))->with('success', 'Data Trash berhasil dihapus permanen');
        }
    }
}
