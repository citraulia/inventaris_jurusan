<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LokasiBarangSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $data = [
            [
                'lokasi_kode'     => 'R.4.04',
                'lokasi_slug'     => 'r404',
                'lokasi_nama'     => 'Laboratorium Visi Komputer & Sistem Berintelegensia',
                'lokasi_lantai'   => 4,
                'lokasi_fakultas' => 'Sains dan Teknologi',
                'lokasi_keterangan'=> '',
                'created_at'      => $currentDateTime,
                'updated_at'      => $currentDateTime
            ],
            [
                'lokasi_kode'     => 'R.4.05',
                'lokasi_slug'     => 'r405',
                'lokasi_nama'     => 'Laboratorium Pemrograman & RPL',
                'lokasi_lantai'   => 4,
                'lokasi_fakultas' => 'Sains dan Teknologi',
                'lokasi_keterangan'=> '',
                'created_at'      => $currentDateTime,
                'updated_at'      => $currentDateTime
            ],
            [
                'lokasi_kode'     => 'R.4.09',
                'lokasi_slug'     => 'r409',
                'lokasi_nama'     => 'Ruang Kelas',
                'lokasi_lantai'   => 4,
                'lokasi_fakultas' => 'Sains dan Teknologi',
                'lokasi_keterangan'=> '',
                'created_at'      => $currentDateTime,
                'updated_at'      => $currentDateTime
            ]
        ];

        $this->db->table('lokasi_barang')->insertBatch($data);
    }
}
