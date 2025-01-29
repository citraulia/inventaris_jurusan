<?php

namespace App\Models;

use CodeIgniter\Model;

class informasi_barang_pending_model extends Model
{
    protected $table      = 'informasi_barang_pending';
    protected $primaryKey = 'pending_id';

    protected $allowedFields = [
        'pending_kode', 'pending_nama', 'kategori_fk', 'pending_merk',
        'pending_deskripsi', 'pending_tahun_perolehan', 'pending_keadaan', 'pending_harga',
        'lokasi_fk', 'pending_keterangan', 'pending_status', 'pending_dipinjamkan',
    ];

    protected $useTimestamps = true;

    protected $validationRules = [
        'pending_kode' => 'required',
        'pending_nama' => 'required',
        'kategori_fk' => 'required',
        'pending_keadaan' => 'required',
        'pending_dipinjamkan' => 'required',
    ];

    public function getBarangPending($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        }
    
        log_message('info', 'Mencari pending_kode: ' . $kode); // Debug: mencatat kode yang dicari
    
        $result = $this->where(['pending_kode' => $kode])->first();
    
        if (!$result) {
            log_message('error', 'Barang pending dengan kode ' . $kode . ' tidak ditemukan.');
        }
    
        return $result;
    }

    public function createKode($kategori, $lokasi, $barang, $id)
    {
        // Jika ID tidak valid, ambil ID terakhir dari tabel
        if ($id <= 0) {
            $lastItem = $this->orderBy('pending_id', 'DESC')->first(); // Ambil item terakhir
            $id = ($lastItem) ? $lastItem['pending_id'] + 1 : 1; // Jika tabel kosong, mulai dari 1
        }

        $kategoriNama = substr($kategori, 0, 3);
        $lokasiNama = trim($lokasi, "R.");
        $barangNama = substr($barang, 0, 2);

        // Gabungkan menjadi kode unik
        $kode = 'p-' . strtoupper($kategoriNama) . strtoupper($lokasiNama) . strtoupper($barangNama) . $id;

        return $kode;
    }

}
