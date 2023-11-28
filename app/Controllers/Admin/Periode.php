<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Periode extends BaseController
{
    protected $periodeModel;
    protected $db;
    public function __construct()
    {
        $this->periodeModel = new \App\Models\PeriodeModel();
    }
    public function index()
    {
        $periodedb = $this->periodeModel->getPeriode();
        $data = [
            'menu' => 'akademik',
            'submenu' => 'periode',
            'periode' => $periodedb,
        ];
        return view('admin/periode/viewperiode.php', $data);
    }

    public function add()
    {
        $periodedb = $this->periodeModel->getPeriode();

        session();
        $data = [
            'pageTitle' => 'Create New Periode',
            'validation' => \Config\Services::validation(),
            'menu' => 'akademik',
            'submenu' => 'periode',
            'periode' => $periodedb,
        ];
        return view('admin/periode/viewaddperiode.php', $data);
    }

    public function store()
    {
        $this->periodeModel->save([
            'periode'         => $this->request->getVar('periode'),
        ]);

        session()->setFlashdata('success', 'Periode berhasil dibuat!');
        // session()->setFlashdata('error', 'The action you requested is not allowed!');
        return $this->response->redirect(site_url('periode'));
    }

    public function edit($id = null)
    {
        session();
        if ($id != null) {
            $query = $this->periodeModel->getWhere(['id_periode' => $id]);
            if ($query->resultID->num_rows > 0) {
                // $db['event'] = $query->getRow();
                $data = [
                    'pageTitle' => 'Update Periode',
                    'validation' => \Config\Services::validation(),
                    'menu' => 'akademik',
                    'submenu' => 'periode',
                    'periode' => $this->periodeModel->getPeriode($id),
                ];
                return view('admin/periode/vieweditperiode.php', $data);
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
        ];

        $this->periodeModel->update($id, $data);
        session()->setFlashdata('success', 'Periode berhasil dirubah!');
        $validation = \Config\Services::validation()->listErrors();
        return redirect()->to(site_url('periode'))->withInput()->with('validation', $validation);
    }

    public function delete($id)
    {
        $this->periodeModel->delete($id);
        session()->setFlashdata('hapus', 'Periode berhasil dihapus!');
        return $this->response->redirect(site_url('periode'));
    }

    // RECYCLE BIN

    public function trash()
    {
        $periodedb = $this->periodeModel->getTrashPeriode();
        $data = [
            'menu' => 'akademik',
            'submenu' => 'periode',
            'periode' => $periodedb,
        ];
        return view('admin/periode/viewtrashperiode.php', $data);
    }
    // RESTORE FROM TRASH
    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('periode')
                ->set('deleted_at', null, true)
                ->where(['id_periode' => $id])
                ->update();
        } else {
            $this->db->table('periode')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('periode'))->with('success', 'Data berhasil direstore');
        }
    }

    // DELETED PERMANENTLY
    public function delete2($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->periodeModel->delete($id, true);
            return redirect()->to(site_url('periode/trash'))->with('success', 'Data berhasil dihapus permanen');
        } else {
            $this->periodeModel->purgeDeleted();
            return redirect()->to(site_url('periode/trash'))->with('success', 'Data Trash berhasil dihapus permanen');
        }
    }
}
