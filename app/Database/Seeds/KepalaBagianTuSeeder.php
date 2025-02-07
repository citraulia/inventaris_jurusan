<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KepalaBagianTuSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $data = [
            [
                'tu_id'      => 1,
                'tu_nama'    => 'Drs. Satiman',
                'tu_nip'     => '196005011986031002',
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime
            ]
        ];

        $this->db->table('kepala_bagian_tu')->insertBatch($data);
    }
}
