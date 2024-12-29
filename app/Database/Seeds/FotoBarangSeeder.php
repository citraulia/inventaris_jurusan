<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FotoBarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['barang_fk' => 'sar404pa1', 'foto_nama' => '20220202_095243.jpg', 'created_at' => '2022-03-01 02:11:30', 'updated_at' => '2022-03-01 02:11:30'],
            ['barang_fk' => 'sar404pa2', 'foto_nama' => '20220202_95244.jpg', 'created_at' => '2022-03-01 02:11:35', 'updated_at' => '2022-03-01 02:11:35'],
            ['barang_fk' => 'sar404le3', 'foto_nama' => '20220202_095320.jpg', 'created_at' => '2022-03-01 02:11:40', 'updated_at' => '2022-03-01 02:11:40'],
            ['barang_fk' => 'sar404le3', 'foto_nama' => '20220202_095334.jpg', 'created_at' => '2022-03-01 02:11:40', 'updated_at' => '2022-03-01 02:11:40'],
            ['barang_fk' => 'kom404cp4', 'foto_nama' => '20220202_095723.jpg', 'created_at' => '2022-03-01 02:11:46', 'updated_at' => '2022-03-01 02:11:46'],
            ['barang_fk' => 'kom404cp4', 'foto_nama' => '20220202_095733.jpg', 'created_at' => '2022-03-01 02:11:46', 'updated_at' => '2022-03-01 02:11:46'],
            ['barang_fk' => 'kom404cp4', 'foto_nama' => '20220202_095752.jpg', 'created_at' => '2022-03-01 02:11:46', 'updated_at' => '2022-03-01 02:11:46'],
            ['barang_fk' => 'kom404cp4', 'foto_nama' => '20220202_095840.jpg', 'created_at' => '2022-03-01 02:11:46', 'updated_at' => '2022-03-01 02:11:46'],
            ['barang_fk' => 'kom404cp4', 'foto_nama' => '20220202_095849.jpg', 'created_at' => '2022-03-01 02:11:46', 'updated_at' => '2022-03-01 02:11:46'],
            ['barang_fk' => 'kom404mo5', 'foto_nama' => '20220202_100111.jpg', 'created_at' => '2022-03-01 02:11:51', 'updated_at' => '2022-03-01 02:11:51'],
            ['barang_fk' => 'kom404mo5', 'foto_nama' => '20220202_100116.jpg', 'created_at' => '2022-03-01 02:11:51', 'updated_at' => '2022-03-01 02:11:51'],
            ['barang_fk' => 'kom404ke7', 'foto_nama' => '20220202_100452.jpg', 'created_at' => '2022-03-01 02:12:09', 'updated_at' => '2022-03-01 02:12:09'],
            ['barang_fk' => 'sar409ku8', 'foto_nama' => '20220202_101809.jpg', 'created_at' => '2022-03-01 02:12:13', 'updated_at' => '2022-03-01 02:12:13'],
            ['barang_fk' => 'sar409ku8', 'foto_nama' => '20220202_101819.jpg', 'created_at' => '2022-03-01 02:12:13', 'updated_at' => '2022-03-01 02:12:13'],
            ['barang_fk' => 'sar409me9', 'foto_nama' => '20220202_101929.jpg', 'created_at' => '2022-03-01 02:12:19', 'updated_at' => '2022-03-01 02:12:19'],
            ['barang_fk' => 'sar409me9', 'foto_nama' => '20220202_101944.jpg', 'created_at' => '2022-03-01 02:12:19', 'updated_at' => '2022-03-01 02:12:19'],
            ['barang_fk' => 'sar409me9', 'foto_nama' => '20220202_101954.jpg', 'created_at' => '2022-03-01 02:12:19', 'updated_at' => '2022-03-01 02:12:19'],
            ['barang_fk' => 'kom404mo10', 'foto_nama' => '20220202_100142.jpg', 'created_at' => '2022-03-01 02:12:37', 'updated_at' => '2022-03-01 02:12:37'],
            ['barang_fk' => 'kom404mo10', 'foto_nama' => '20220202_100202.jpg', 'created_at' => '2022-03-01 02:12:37', 'updated_at' => '2022-03-01 02:12:37'],
            ['barang_fk' => 'sar404me11', 'foto_nama' => '20220202_100601.jpg', 'created_at' => '2022-03-02 00:55:03', 'updated_at' => '2022-03-02 00:55:03'],
            ['barang_fk' => 'sar404me11', 'foto_nama' => '20220202_100618.jpg', 'created_at' => '2022-03-02 00:55:03', 'updated_at' => '2022-03-02 00:55:03'],
        ];

        $this->db->table('foto_barang')->insertBatch($data);
    }
}
