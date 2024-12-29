<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KepalaBagianTuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tu_id'      => 1,
                'tu_nama'    => 'Drs. Satiman',
                'tu_nip'     => '196005011986031002',
                'created_at' => '2022-02-08 16:26:15',
                'updated_at' => '2022-02-08 09:46:00'
            ]
        ];

        $this->db->table('kepala_bagian_tu')->insertBatch($data);
    }
}
