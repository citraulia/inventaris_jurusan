<?php

namespace App\Models;

use CodeIgniter\Model;

class informasi_barang_model extends Model
{
    protected $table      = 'informasi_barang';
    protected $primaryKey = 'barang_id';

    protected $allowedFields = [
        'barang_kode', 'barang_nama', 'kategori_fk', 'barang_merk',
        'barang_deskripsi', 'barang_tahun_perolehan', 'barang_keadaan', 'barang_harga',
        'lokasi_fk', 'barang_keterangan', 'barang_status', 'barang_dipinjamkan'
    ];

    protected $useTimestamps = true;

    public function getInformasiBarang($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        }

        return $this->where(['barang_kode' => $kode])->first();
    }

    public function getDipinjamkan()
    {
        return $this->where(['barang_status' => 1, 'barang_dipinjamkan' => 1])->findAll();
    }

    public function createKode($kategori, $lokasi, $barang, $id)
    {
        if ($id <= 0) {
            $lastItem = $this->orderBy('barang_id', 'DESC')->first();
            $id = ($lastItem) ? $lastItem['barang_id'] + 1 : 1;
        }
    
        $kategoriNama = substr($kategori, 0, 3);
        $lokasiNama = trim($lokasi, "R.");
        $barangNama = substr($barang, 0, 2);
    
        $kode = strtoupper($kategoriNama) . strtoupper($lokasiNama) . strtoupper($barangNama) . $id;
    
        return $kode;
    }    
}
