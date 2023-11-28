<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kriteria extends BaseController
{
    protected $kriteriaModel, $db;

    public function __construct()
    {
        $this->kriteriaModel = new \App\Models\KriteriaModel();
    }
    public function index()
    {
        $kriteriadb = $this->kriteriaModel->getKriteria();
        $data = [
            'menu' => 'laporan',
            'submenu' => 'kriteria',
            'kriteria' => $kriteriadb,
        ];
        return view('admin/kriteria/viewkriteria.php', $data);
    }

    public function add()
    {
        $kriteriadb = $this->kriteriaModel->getKriteria();

        session();
        $data = [
            'pageTitle' => 'Create New kriteria',
            'validation' => \Config\Services::validation(),
            'menu' => 'laporan',
            'submenu' => 'kriteria',
            'kriteria' => $kriteriadb,
        ];
        return view('admin/kriteria/viewaddkriteria.php', $data);
    }

    public function store()
    {
        $this->kriteriaModel->save([
            'kriteria'         => $this->request->getVar('kriteria'),
            'kkm'         => $this->request->getVar('kkm'),
        ]);

        session()->setFlashdata('success', 'kriteria berhasil dibuat!');
        // session()->setFlashdata('error', 'The action you requested is not allowed!');
        return $this->response->redirect(site_url('kriteria'));
    }

    public function edit($id = null)
    {
        session();
        if ($id != null) {
            $query = $this->kriteriaModel->getWhere(['id_kriteria' => $id]);
            if ($query->resultID->num_rows > 0) {
                // $db['event'] = $query->getRow();
                $data = [
                    'pageTitle' => 'Update Kriteria',
                    'validation' => \Config\Services::validation(),
                    'menu' => 'laporan',
                    'submenu' => 'kriteria',
                    'kriteria' => $this->kriteriaModel->getkriteria($id),
                ];
                return view('admin/kriteria/vieweditkriteria.php', $data);
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
            'kriteria'         => $this->request->getVar('kriteria'),
            'kkm'         => $this->request->getVar('kkm'),
        ];

        $this->kriteriaModel->update($id, $data);
        session()->setFlashdata('success', 'kriteria berhasil dirubah!');
        $validation = \Config\Services::validation()->listErrors();
        return redirect()->to(site_url('kriteria'))->withInput()->with('validation', $validation);
    }

    public function delete($id)
    {
        $this->kriteriaModel->delete($id);
        session()->setFlashdata('hapus', 'kriteria berhasil dihapus!');
        return $this->response->redirect(site_url('kriteria'));
    }

    // RECYCLE BIN

    public function trash()
    {
        $kriteriadb = $this->kriteriaModel->getTrashKriteria();
        $data = [
            'menu' => 'laporan',
            'submenu' => 'kriteria',
            'kriteria' => $kriteriadb,
        ];
        return view('admin/kriteria/viewtrashkriteria.php', $data);
    }
    // RESTORE FROM TRASH
    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('kriteria')
                ->set('deleted_at', null, true)
                ->where(['id_kriteria' => $id])
                ->update();
        } else {
            $this->db->table('kriteria')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('kriteria'))->with('success', 'Data berhasil direstore');
        }
    }

    // DELETED PERMANENTLY
    public function delete2($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->kriteriaModel->delete($id, true);
            return redirect()->to(site_url('kriteria/trash'))->with('success', 'Data berhasil dihapus permanen');
        } else {
            $this->kriteriaModel->purgeDeleted();
            return redirect()->to(site_url('kriteria/trash'))->with('success', 'Data Trash berhasil dihapus permanen');
        }
    }
}
