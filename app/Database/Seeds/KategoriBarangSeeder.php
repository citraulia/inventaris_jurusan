<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriBarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori_id'        => 1,
                'kategori_nama'      => 'Elektronik',
                'kategori_slug'      => 'elektronik',
                'kategori_keterangan'=> 'Barang Inventaris yang merupakan barang elektorik selain dari komponen utama komputer.',
                'created_at'         => '2022-02-06 07:59:03',
                'updated_at'         => '2022-02-06 08:10:34'
            ],
            [
                'kategori_id'        => 2,
                'kategori_nama'      => 'Komputer',
                'kategori_slug'      => 'komputer',
                'kategori_keterangan'=> 'Barang Inventaris yang menjadi komponen utama sebuah komputer.',
                'created_at'         => '2022-02-06 08:10:49',
                'updated_at'         => '2022-02-06 08:10:49'
            ],
            [
                'kategori_id'        => 3,
                'kategori_nama'      => 'Sarana',
                'kategori_slug'      => 'sarana',
                'kategori_keterangan'=> 'Barang Inventaris Sarana Prasarana Jurusan.',
                'created_at'         => '2022-02-06 08:11:11',
                'updated_at'         => '2022-02-28 16:31:30'
            ]
        ];

        $this->db->table('kategori_barang')->insertBatch($data);
    }
}
