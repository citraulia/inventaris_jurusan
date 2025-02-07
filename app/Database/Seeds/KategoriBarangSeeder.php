<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriBarangSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        
        $data = [
            [
                'kategori_nama'      => 'Elektronik',
                'kategori_slug'      => 'elektronik',
                'kategori_keterangan'=> 'Barang Inventaris yang merupakan barang elektorik selain dari komponen utama komputer.',
                'created_at'         => $currentDateTime,
                'updated_at'         => $currentDateTime
            ],
            [
                'kategori_nama'      => 'Komputer',
                'kategori_slug'      => 'komputer',
                'kategori_keterangan'=> 'Barang Inventaris yang menjadi komponen utama sebuah komputer.',
                'created_at'         => $currentDateTime,
                'updated_at'         => $currentDateTime
            ],
            [
                'kategori_nama'      => 'Sarana',
                'kategori_slug'      => 'sarana',
                'kategori_keterangan'=> 'Barang Inventaris Sarana Prasarana Jurusan.',
                'created_at'         => $currentDateTime,
                'updated_at'         => $currentDateTime
            ]
        ];

        $this->db->table('kategori_barang')->insertBatch($data);
    }
}
