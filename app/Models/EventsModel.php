<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'events';
    protected $primaryKey       = 'id_event';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $useSoftDeletes = true;
    protected $allowedFields    = ['nama_event', 'slug', 'tanggal_event', 'lokasi_event', 'banner_event', 'deskripsi_event', 'status_event'];

    // Dates
    protected $useTimestamps = ['tanggal_event', 'created_at', 'updated_at', 'deleted_at'];
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * Summary of getEvent
     * @param mixed $slug
     * @return array|object|null
     */
    public function getEvent($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_event' => $id])->first();
    }
    public function getTrashEvent($id = false)
    {
        if ($id == false) {
            return $this->onlyDeleted()->findAll();
        }
        return $this->where(['id_event' => $id])->first();
    }
}
