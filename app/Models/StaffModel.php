<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table      = 'penjaga';
    protected $allowedFields = ['Nama', 'Shift', 'username', 'password', 'level'];
    protected $primaryKey = 'PenjagaID';


    public function getStaff($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['PenjagaID' => $id])->first();
    }
}
