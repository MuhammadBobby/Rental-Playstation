<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table      = 'inventaris';
    protected $allowedFields = ['NamaBarang', 'Jenis', 'Status', 'HargaPerJam'];
    protected $primaryKey = 'BarangID';

    // mendapatkan dan mencari data
    public function getInventaris($id = false)
    {
        if ($id == false) {
            return $this->orderBy('jenis', 'ASC')->findAll();
        }
        return $this->where(['BarangID' => $id])->first();
    }

    // mendaptkan data yg tersedia
    public function getInventarisStatus()
    {
        return $this->where(['Status' => 'Tersedia'])->findAll();
    }


    // menghitung biaya
    public function countBiaya($durasi, $jenis)
    {
        // Gunakan query binding untuk mencegah SQL Injection
        $sql = "SELECT HargaPerJam FROM inventaris WHERE BarangID = ?";
        $query = $this->db->query($sql, [$jenis]);

        // Periksa apakah hasilnya ada
        if ($query->getNumRows() > 0) {
            // Ambil hasil query
            $row = $query->getRow();
            // Hitung biaya dengan mengalikan HargaPerJam dengan durasi
            $biaya = $row->HargaPerJam * $durasi;
            return $biaya;
        } else {
            // Kembalikan 0 atau nilai default lain jika tidak ditemukan
            return 0;
        }
    }

    // update inventaris menjadi disewa
    public function updateInventaris($id)
    {
        $sql = "UPDATE inventaris SET Status = 'Disewa' WHERE BarangID = ?";
        $query = $this->db->query($sql, [$id]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    // update inventaris menjadi Tersedia
    public function updateFinish($id)
    {
        $sql = "UPDATE inventaris SET Status = 'Tersedia' WHERE BarangID = ?";
        $query = $this->db->query($sql, [$id]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
