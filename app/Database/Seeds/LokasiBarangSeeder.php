<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LokasiBarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'lokasi_kode'     => 'R.4.04',
                'lokasi_slug'     => 'r404',
                'lokasi_nama'     => 'Laboratorium Visi Komputer & Sistem Berintelegensia',
                'lokasi_lantai'   => 4,
                'lokasi_fakultas' => 'Sains dan Teknologi',
                'lokasi_keterangan'=> '',
                'created_at'      => '2022-02-06 09:21:58',
                'updated_at'      => '2022-02-28 17:02:07'
            ],
            [
                'lokasi_kode'     => 'R.4.05',
                'lokasi_slug'     => 'r405',
                'lokasi_nama'     => 'Laboratorium Pemrograman & RPL',
                'lokasi_lantai'   => 4,
                'lokasi_fakultas' => 'Sains dan Teknologi',
                'lokasi_keterangan'=> '',
                'created_at'      => '2022-02-09 12:28:24',
                'updated_at'      => '2022-02-09 12:28:24'
            ],
            [
                'lokasi_kode'     => 'R.4.09',
                'lokasi_slug'     => 'r409',
                'lokasi_nama'     => 'Ruang Kelas',
                'lokasi_lantai'   => 4,
                'lokasi_fakultas' => 'Sains dan Teknologi',
                'lokasi_keterangan'=> '',
                'created_at'      => '2022-03-01 02:09:42',
                'updated_at'      => '2022-03-01 02:09:51'
            ]
        ];

        $this->db->table('lokasi_barang')->insertBatch($data);
    }
}