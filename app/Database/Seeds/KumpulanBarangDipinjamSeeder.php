<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KumpulanBarangDipinjamSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'barang_dipinjam_fk' => 'kom404cp4',
                'transaksi_fk'       => 1,
                'created_at'         => '2022-03-02 01:00:49',
                'updated_at'         => '2022-03-02 01:00:49',
                'status_barang'      => 1
            ],
            [
                'barang_dipinjam_fk' => 'kom404mo5',
                'transaksi_fk'       => 1,
                'created_at'         => '2022-03-02 01:00:49',
                'updated_at'         => '2022-03-02 01:00:49',
                'status_barang'      => 1
            ],
            [
                'barang_dipinjam_fk' => 'kom404mp6',
                'transaksi_fk'       => 1,
                'created_at'         => '2022-03-02 01:00:49',
                'updated_at'         => '2022-03-02 01:00:49',
                'status_barang'      => 1
            ]
        ];

        $this->db->table('kumpulan_barang_dipinjam')->insertBatch($data);
    }
}
