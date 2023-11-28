<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey       = 'id_kelas';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nama_kelas', 'angkatan', 'kode_kelas', 'ruangan', 'id_guru', 'pengajar', 'periode'];

    // Dates
    protected $useTimestamps = ['created_at', 'updated_at', 'deleted_at'];
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $assignGuru;
    protected $assignPeriode;

    /**
     * Sets the group to assign any users created.
     *
     * @return $this
     */
    public function withGuru(string $namaGuru)
    {
        $guru = $this->db->table('users')->where('nama_lengkap', $namaGuru)->get()->getFirstRow();

        $this->assignGuru = $guru->id;

        return $this;
    }
    public function withPeriode(string $namaPeriode)
    {
        $periode = $this->db->table('periode')->where('periode', $namaPeriode)->get()->getFirstRow();

        $this->assignPeriode = $periode->id_periode;

        return $this;
    }

    public function getIdByClassName($nama_kelas)
    {
        $query = $this->db->table('kelas')
            ->select('id_kelas')
            ->where('nama_kelas', $nama_kelas)
            ->get();

        $result = $query->getRow();

        if ($result) {
            return $result->id_kelas;
        } else {
            return null;
        }
    }
    public function getKelas($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kelas' => $id])->first();
    }
    public function getTrashKelas($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_kelas' => $id])->first();
    }
}
