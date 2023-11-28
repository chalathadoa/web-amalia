<?php

namespace App\Models;

use CodeIgniter\Model;

class HariModel extends Model
{
    protected $table            = 'hari';
    protected $primaryKey       = 'id_hari';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nama_hari'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getHari($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_hari' => $id])->first();
    }
    public function getTrashHari($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_hari' => $id])->first();
    }
}
