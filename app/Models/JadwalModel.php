<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table            = 'jadwal';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['periode', 'idkelas', 'kelas', 'angkatan', 'hari', 'waktu'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getJadwal($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_jadwal' => $id])->first();
    }
    public function getTrashJadwal($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_jadwal' => $id])->first();
    }
}
