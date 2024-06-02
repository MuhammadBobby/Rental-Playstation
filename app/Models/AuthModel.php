<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'penjaga';
    // protected $allowedFields = ['Nama', 'Alamat', 'Telepon', 'Email'];
    protected $primaryKey = 'PenjagaID';

    // cek login

    public function cek_login($username, $password)
    {
        $user = $this->where('username', $username)->first();
        if ($user && $password == $user['password']) {
            return $user;
        }
        return null;
    }
}
