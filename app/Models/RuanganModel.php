<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table            = 'ruangan';
    protected $primaryKey       = 'id_ruangan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nama_ruangan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getRuangan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_ruangan' => $id])->first();
    }
    public function getTrashRuangan($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_ruangan' => $id])->first();
    }
}
