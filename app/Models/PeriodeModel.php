<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table            = 'periode';
    protected $primaryKey       = 'id_periode';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['periode'];

    // Dates
    protected $useTimestamps = ['created_at', 'updated_at', 'deleted_at'];
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getPeriode($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_periode' => $id])->first();
    }
    public function getTrashPeriode($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_periode' => $id])->first();
    }

    public function getPeriodeIdByName($periode)
    {
        $query = $this->db->table('periode')
            ->select('id_periode')
            ->where('periode', $periode)
            ->get();

        $result = $query->getRow();

        if ($result) {
            return $result->id_periode;
        } else {
            return null;
        }
    }
    public function getPeriodeNameById($id)
    {
        $query = $this->db->table('periode')
            ->select('periode')
            ->where('id_periode', $id)
            ->get();

        $result = $query->getRow();

        if ($result) {
            return $result->periode;
        } else {
            return null;
        }
    }
}
