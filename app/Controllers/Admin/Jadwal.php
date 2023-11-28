<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    protected $periodeModel;
    protected $kelasModel;
    protected $hariModel;

    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('jadwal');

        $this->jadwalModel = new \App\Models\JadwalModel();
        $this->periodeModel = new \App\Models\PeriodeModel();
        $this->kelasModel = new \App\Models\KelasModel();
        $this->hariModel = new \App\Models\HariModel();
    }
    public function index()
    {
        $periode = $this->periodeModel->getPeriode();
        $this->builder->select('id_jadwal, periode, kelas, angkatan, hari, waktu, created_at');
        $jadwaldb = $this->builder->get();
        $data = [
            'menu' => 'akademik',
            'submenu' => 'jadwal',
            'pd' => 'all',
            'jadwal' => $jadwaldb->getResult(),
            'periode' => $periode
        ];
        return view('admin/jadwal/viewjadwal.php', $data);
    }
    public function periode($id = null)
    {
        $periode = $this->periodeModel->getPeriode();
        // $jadwaldb = $this->jadwalModel->getJadwal();

        // filter periode
        $pdName = $this->periodeModel->getPeriodeNameById($id);
        $this->builder->select('id_jadwal, periode, kelas, angkatan, hari, waktu, created_at');
        $jadwalPd = $this->builder->where('periode', $pdName)->get();
        $data = [
            'menu' => 'akademik',
            'submenu' => 'jadwal',
            'pd' => $pdName,
            'jadwal' => $jadwalPd->getResult(),
            'periode' => $periode
        ];
        return view('admin/jadwal/viewjadwal.php', $data);
    }

    public function add()
    {
        $jadwaldb = $this->jadwalModel->getJadwal();
        $periode = $this->periodeModel->getPeriode();
        $kelas = $this->kelasModel->getKelas();
        $hari = $this->hariModel->getHari();

        // $class = $this->builder->select('nama_kelas')->get();

        session();
        $data = [
            'pageTitle' => 'Create New jadwal',
            'validation' => \Config\Services::validation(),
            'menu' => 'akademik',
            'submenu' => 'jadwal',
            'jadwal' => $jadwaldb,
            'periode' => $periode,
            'class' => $kelas,
            'hari' => $hari
        ];
        return view('admin/jadwal/viewaddjadwal.php', $data);
    }

    public function store()
    {
        $idkelas = $this->kelasModel->getIdByClassName($this->request->getVar('kelas'));
        $this->jadwalModel->save([
            'periode'         => $this->request->getVar('periode'),
            'idkelas' => $idkelas,
            'kelas'         => $this->request->getVar('kelas'),
            'angkatan'         => $this->request->getVar('angkatan'),
            'hari'         => $this->request->getVar('hari'),
            'waktu'         => $this->request->getVar('waktu'),
        ]);

        session()->setFlashdata('success', 'jadwal berhasil dibuat!');
        // session()->setFlashdata('error', 'The action you requested is not allowed!');
        return $this->response->redirect(site_url('jadwal'));
    }

    public function edit($id = null)
    {
        $periode = $this->periodeModel->getPeriode();
        $kelas = $this->kelasModel->getKelas();
        $hari = $this->hariModel->getHari();
        session();
        if ($id != null) {
            $query = $this->jadwalModel->getWhere(['id_jadwal' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'pageTitle' => 'Create New Event',
                    'validation' => \Config\Services::validation(),
                    'menu' => 'akademik',
                    'submenu' => 'jadwal',
                    'jadwal' => $this->jadwalModel->getJadwal($id),
                    'periode' => $periode,
                    'class' => $kelas,
                    'hari' => $hari
                ];
                return view('admin/jadwal/vieweditjadwal.php', $data);
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
            'periode'         => $this->request->getVar('periode'),
            'kelas'         => $this->request->getVar('kelas'),
            'angkatan'         => $this->request->getVar('angkatan'),
            'hari'         => $this->request->getVar('hari'),
            'waktu'         => $this->request->getVar('waktu'),
        ];

        $this->jadwalModel->update($id, $data);
        session()->setFlashdata('success', 'jadwal berhasil dirubah!');
        $validation = \Config\Services::validation()->listErrors();
        return redirect()->to(site_url('jadwal'))->withInput()->with('validation', $validation);
    }

    public function delete($id)
    {
        $this->jadwalModel->delete($id);
        session()->setFlashdata('hapus', 'jadwal berhasil dihapus!');
        return $this->response->redirect(site_url('jadwal'));
    }

    // RECYCLE BIN

    public function trash()
    {
        $jadwaldb = $this->jadwalModel->getTrashJadwal();
        $data = [
            'menu' => 'akademik',
            'submenu' => 'jadwal',
            'jadwal' => $jadwaldb,
        ];
        return view('admin/jadwal/viewtrashjadwal.php', $data);
    }
    // RESTORE FROM TRASH
    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('jadwal')
                ->set('deleted_at', null, true)
                ->where(['id_jadwal' => $id])
                ->update();
        } else {
            $this->db->table('jadwal')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('jadwal'))->with('success', 'Data berhasil direstore');
        }
    }

    // DELETED PERMANENTLY
    public function delete2($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->jadwalModel->delete($id, true);
            return redirect()->to(site_url('jadwal/trash'))->with('success', 'Data berhasil dihapus permanen');
        } else {
            $this->jadwalModel->purgeDeleted();
            return redirect()->to(site_url('jadwal/trash'))->with('success', 'Data Trash berhasil dihapus permanen');
        }
    }
}
