<?php

namespace App\Models;

use CodeIgniter\Model;

class RaportModel extends Model
{
    protected $table            = 'raport';
    protected $primaryKey       = 'id_raport';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['id_santri', 'nama_santri', 'idperiode', 'periode', 'tahfidz', 'jamaah', 'kajian', 'akademis', 'kebersihan', 'sosial', 'prestasi', 'predikat_tahfidz', 'predikat_jamaah', 'predikat_kajian', 'predikat_akademis', 'predikat_kebersihan', 'predikat_sosial', 'predikat_prestasi', 'total_nilai'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getRaport($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_raport' => $id])->first();
    }

    // nama_santri,idperiode,periode,tahfidz,jamaah,kajian,akademis,kebersihan,sosial,prestasi,predikat_tahfidz,predikat_jamaah,predikat_kajian,predikat_akademis,predikat_kebersihan,predikat_sosial,predikat_prestasi,total_nilai
    public function getRaportbySantri($id = false)
    {
        $query = $this->db->table('raport')
            ->select('*')
            ->where('id_santri', $id)
            ->get();

        $result = $query->getResult();

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
    public function getRaportbyId($id = false)
    {
        $query = $this->db->table('raport')
            ->where('id_raport', $id)
            ->get();

        $result = $query->getResult();

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public function getRaportbyPeriode($id = false, $periode = false)
    {
        $query = $this->db->table('raport')
            ->select('nama_lengkap')
            ->where('id', $id)
            ->where('periode', $periode)
            ->get();

        $result = $query->getResult();

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
    public function getTrashRaport($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_raport' => $id])->first();
    }
}
