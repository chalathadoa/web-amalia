<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table            = 'kriteria';
    protected $primaryKey       = 'id_kriteria';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['kriteria', 'kkm'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getKriteria($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kriteria' => $id])->first();
    }
    public function getTrashKriteria($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_kriteria' => $id])->first();
    }
}
