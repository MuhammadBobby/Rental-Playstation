<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table      = 'pemesanan';
    protected $allowedFields = ['MemberID', 'PenjagaID', 'Durasi', 'JenisPS', 'TanggalPemesanan', 'WaktuBerakhir', 'TotalBiaya', 'img'];
    protected $primaryKey = 'PemesananID';

    public function getBooking($id = false)
    {
        if ($id == false) {
            $sql = "SELECT *, member.Nama as NamaMember, penjaga.Nama as NamaStaff FROM pemesanan, member, inventaris, penjaga
            WHERE pemesanan.MemberID = member.MemberID
            AND pemesanan.JenisPS = inventaris.BarangID
            AND pemesanan.PenjagaID = penjaga.PenjagaID
            ORDER BY pemesanan.TanggalPemesanan DESC";

            return $this->db->query($sql)->getResultArray();
        }

        $sql = "SELECT *, member.Nama as NamaMember, penjaga.Nama as NamaStaff 
        FROM pemesanan
        JOIN member ON pemesanan.MemberID = member.MemberID
        JOIN inventaris ON pemesanan.JenisPS = inventaris.BarangID
        JOIN penjaga ON pemesanan.PenjagaID = penjaga.PenjagaID
        WHERE pemesanan.PemesananID = ?";

        return $this->db->query($sql, [$id])->getRow();
        // return $this->where(['PemesananID' => $id])->first();
    }

    public function updateStatus($id)
    {
        $sql = "UPDATE pemesanan SET StatusPemesanan = 'Selesai' WHERE PemesananID = ?";
        $this->db->query($sql, [$id]);
    }

    public function uploadImage()
    {
        $fileName = $_FILES['gambar']['name'];
        $fileSize = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $validExtensions = ['jpeg', 'jpg', 'png', 'gif'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!in_array($extension, $validExtensions)) {
            return false;
        }

        // cek jika ukuran gambar terlalu besar (2MB)
        if ($fileSize > 2000000) {
            return false;
        }

        // generate nama gambar baru
        $newFileName = uniqid();
        // upload gambar ke direktori yang ditentukan
        move_uploaded_file($tmpName, 'img/' . $newFileName . '.' . $extension);
        return $newFileName . '.' . $extension;
    }
}
