<?php

namespace App\Models;

use CodeIgniter\Model;

class pengelolaan_barang_model extends Model
{
    protected $table      = 'pengelolaan_barang';
    protected $primaryKey = 'pengelolaan_id';

    protected $allowedFields = [
        'pengelolaan_kode', 'barang_fk', 'pending_fk', 'user_fk',
        'pengelolaan_tanggal', 'jenis_fk', 'pengelolaan_status',
        'pengelolaan_keterangan'
    ];

    protected $useTimestamps = true;

    public function getPengelolaan($kode = false)
    {
        if ($kode == false) {
            return $this->orderBy('pengelolaan_tanggal DESC')->findAll();
        }

        return $this->where(['pengelolaan_kode' => $kode])->first();
    }

    public function createKode($jenis, $kodeBarang, $id)
    {
        // Jika ID tidak valid, ambil ID terakhir dari tabel
        if ($id <= 0) {
            $lastItem = $this->orderBy('pengelolaan_id', 'DESC')->first();
            $id = ($lastItem) ? $lastItem['pengelolaan_id'] + 1 : 1;
        }        
    
        // Ambil 1 huruf pertama dari jenis pengelolaan (misal: TAMBAH -> "t")
        $pengelolaanJenis = substr(strtolower($jenis), 0, 1);
    
        // Hilangkan prefiks "p-" jika ada pada $kodeBarang
        $kodeBarang = preg_replace('/^p-/', '', $kodeBarang);
    
        // Gabungkan menjadi kode unik
        $kode = $pengelolaanJenis . $id . "-" . $kodeBarang;
    
        return $kode;
    }    
}
