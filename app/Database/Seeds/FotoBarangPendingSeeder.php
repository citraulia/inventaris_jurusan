<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FotoBarangPendingSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $data = [
            ['pending_fk' => 'p-sar404pa1', 'foto_pending_nama' => '20220202_095243.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar404le2', 'foto_pending_nama' => '20220202_095320.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar404le2', 'foto_pending_nama' => '20220202_095334.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404cp3', 'foto_pending_nama' => '20220202_095723.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404cp3', 'foto_pending_nama' => '20220202_095733.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404cp3', 'foto_pending_nama' => '20220202_095752.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404cp3', 'foto_pending_nama' => '20220202_095840.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404cp3', 'foto_pending_nama' => '20220202_095849.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404mo4', 'foto_pending_nama' => '20220202_100111.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404mo4', 'foto_pending_nama' => '20220202_100116.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404ke5', 'foto_pending_nama' => '20220202_100452.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar409ku6', 'foto_pending_nama' => '20220202_101809.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar409ku6', 'foto_pending_nama' => '20220202_101819.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar409me7', 'foto_pending_nama' => '20220202_101929.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar409me7', 'foto_pending_nama' => '20220202_101944.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar409me7', 'foto_pending_nama' => '20220202_101954.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404mo8', 'foto_pending_nama' => '20220202_100142.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-kom404mo8', 'foto_pending_nama' => '20220202_100202.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar404me9', 'foto_pending_nama' => '20220202_100601.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['pending_fk' => 'p-sar404me9', 'foto_pending_nama' => '20220202_100618.jpg', 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
        ];

        $this->db->table('foto_barang_pending')->insertBatch($data);
    }
}
