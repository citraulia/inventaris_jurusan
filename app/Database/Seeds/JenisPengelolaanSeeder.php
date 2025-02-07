<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisPengelolaanSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $data = [
            [
                'jenis_id'    => 1,
                'jenis_nama'  => 'TAMBAH',
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime
            ],
            [
                'jenis_id'    => 2,
                'jenis_nama'  => 'UBAH',
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime
            ],
            [
                'jenis_id'    => 3,
                'jenis_nama'  => 'HAPUS',
                'created_at'  => $currentDateTime,
                'updated_at'  => $currentDateTime
            ]
        ];

        $this->db->table('jenis_pengelolaan')->insertBatch($data);
    }
}
