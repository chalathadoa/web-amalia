<?php

namespace App\Models;

use CodeIgniter\Model;

class PelanggaranModel extends Model
{
    protected $table            = 'pelanggaran';
    protected $primaryKey       = 'id_pelanggaran';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['id_santri', 'nama_santriwati', 'jenis_pelanggaran', 'tanggal_pelanggaran', 'hukuman', 'deskripsi_pelanggaran'];

    // Dates
    protected $useTimestamps = ['tanggal_pelanggaran', 'created_at', 'updated_at', 'deleted_at'];
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPelanggaran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pelanggaran' => $id])->first();
    }
    public function getTrashPelanggaran($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_pelanggaran' => $id])->first();
    }
}
