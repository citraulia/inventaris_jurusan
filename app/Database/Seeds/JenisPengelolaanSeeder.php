<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisPengelolaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_id'    => 1,
                'jenis_nama'  => 'TAMBAH',
                'created_at'  => '2022-02-10 17:46:34',
                'updated_at'  => '2022-02-10 17:46:34'
            ],
            [
                'jenis_id'    => 2,
                'jenis_nama'  => 'UBAH',
                'created_at'  => '2022-02-10 17:46:34',
                'updated_at'  => '2022-02-10 17:46:34'
            ],
            [
                'jenis_id'    => 3,
                'jenis_nama'  => 'HAPUS',
                'created_at'  => '2022-02-10 17:46:34',
                'updated_at'  => '2022-02-10 17:46:34'
            ]
        ];

        $this->db->table('jenis_pengelolaan')->insertBatch($data);
    }
}
