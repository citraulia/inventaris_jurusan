<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FotoBarangPendingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['pending_fk' => 'p-sar404pa1', 'foto_pending_nama' => '20220202_095243.jpg', 'created_at' => '2022-03-01 02:04:33', 'updated_at' => '2022-03-01 02:04:33'],
            ['pending_fk' => 'p-sar404pa2', 'foto_pending_nama' => '20220202_95244.jpg', 'created_at' => '2022-03-01 02:04:33', 'updated_at' => '2022-03-01 02:04:33'],
            ['pending_fk' => 'p-sar404le3', 'foto_pending_nama' => '20220202_095320.jpg', 'created_at' => '2022-03-01 02:05:14', 'updated_at' => '2022-03-01 02:05:14'],
            ['pending_fk' => 'p-sar404le3', 'foto_pending_nama' => '20220202_095334.jpg', 'created_at' => '2022-03-01 02:05:14', 'updated_at' => '2022-03-01 02:05:14'],
            ['pending_fk' => 'p-kom404cp4', 'foto_pending_nama' => '20220202_095723.jpg', 'created_at' => '2022-03-01 02:06:18', 'updated_at' => '2022-03-01 02:06:18'],
            ['pending_fk' => 'p-kom404cp4', 'foto_pending_nama' => '20220202_095733.jpg', 'created_at' => '2022-03-01 02:06:18', 'updated_at' => '2022-03-01 02:06:18'],
            ['pending_fk' => 'p-kom404cp4', 'foto_pending_nama' => '20220202_095752.jpg', 'created_at' => '2022-03-01 02:06:18', 'updated_at' => '2022-03-01 02:06:18'],
            ['pending_fk' => 'p-kom404cp4', 'foto_pending_nama' => '20220202_095840.jpg', 'created_at' => '2022-03-01 02:06:18', 'updated_at' => '2022-03-01 02:06:18'],
            ['pending_fk' => 'p-kom404cp4', 'foto_pending_nama' => '20220202_095849.jpg', 'created_at' => '2022-03-01 02:06:18', 'updated_at' => '2022-03-01 02:06:18'],
            ['pending_fk' => 'p-kom404mp5', 'foto_pending_nama' => '20220202_100111.jpg', 'created_at' => '2022-03-01 02:07:25', 'updated_at' => '2022-03-01 02:07:25'],
            ['pending_fk' => 'p-kom404mp5', 'foto_pending_nama' => '20220202_100116.jpg', 'created_at' => '2022-03-01 02:07:25', 'updated_at' => '2022-03-01 02:07:25'],
            ['pending_fk' => 'p-kom404mo6', 'foto_pending_nama' => '20220202_100142.jpg', 'created_at' => '2022-03-01 02:08:23', 'updated_at' => '2022-03-01 02:08:23'],
            ['pending_fk' => 'p-kom404mo6', 'foto_pending_nama' => '20220202_100202.jpg', 'created_at' => '2022-03-01 02:08:23', 'updated_at' => '2022-03-01 02:08:23'],
            ['pending_fk' => 'p-kom404ke7', 'foto_pending_nama' => '20220202_100452.jpg', 'created_at' => '2022-03-01 02:09:05', 'updated_at' => '2022-03-01 02:09:05'],
            ['pending_fk' => 'p-sar409ku8', 'foto_pending_nama' => '20220202_101809.jpg', 'created_at' => '2022-03-01 02:10:37', 'updated_at' => '2022-03-01 02:10:37'],
            ['pending_fk' => 'p-sar409ku8', 'foto_pending_nama' => '20220202_101819.jpg', 'created_at' => '2022-03-01 02:10:37', 'updated_at' => '2022-03-01 02:10:37'],
            ['pending_fk' => 'p-sar409me9', 'foto_pending_nama' => '20220202_101929.jpg', 'created_at' => '2022-03-01 02:11:10', 'updated_at' => '2022-03-01 02:11:10'],
            ['pending_fk' => 'p-sar409me9', 'foto_pending_nama' => '20220202_101944.jpg', 'created_at' => '2022-03-01 02:11:10', 'updated_at' => '2022-03-01 02:11:10'],
            ['pending_fk' => 'p-sar409me9', 'foto_pending_nama' => '20220202_101954.jpg', 'created_at' => '2022-03-01 02:11:10', 'updated_at' => '2022-03-01 02:11:10'],
            ['pending_fk' => 'p-sar404me10', 'foto_pending_nama' => '20220202_100601.jpg', 'created_at' => '2022-03-02 00:50:56', 'updated_at' => '2022-03-02 00:50:56'],
            ['pending_fk' => 'p-sar404me10', 'foto_pending_nama' => '20220202_100618.jpg', 'created_at' => '2022-03-02 00:50:56', 'updated_at' => '2022-03-02 00:50:56'],
        ];

        $this->db->table('foto_barang_pending')->insertBatch($data);
    }
}
