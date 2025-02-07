<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengelolaanBarangSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $currentDate = date('Y-m-d');

        $data = [
            [
                'pengelolaan_kode'     => 't1-sar404pa1',
                'barang_fk'            => null,
                'pending_fk'           => 'p-sar404pa1',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
            [
                'pengelolaan_kode'     => 't2-sar404le2',
                'barang_fk'            => null,
                'pending_fk'           => 'p-sar404le2',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
            [
                'pengelolaan_kode'     => 't3-kom404cp3',
                'barang_fk'            => null,
                'pending_fk'           => 'p-kom404cp3',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
            [
                'pengelolaan_kode'     => 't4-kom404mo4',
                'barang_fk'            => null,
                'pending_fk'           => 'p-kom404mo4',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
            [
                'pengelolaan_kode'     => 't5-kom404ke5',
                'barang_fk'            => null,
                'pending_fk'           => 'p-kom404ke5',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
            [
                'pengelolaan_kode'     => 't6-sar409ku6',
                'barang_fk'            => null,
                'pending_fk'           => 'p-sar409ku6',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
            [
                'pengelolaan_kode'     => 't7-sar409me7',
                'barang_fk'            => null,
                'pending_fk'           => 'p-sar409me7',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
            [
                'pengelolaan_kode'     => 't8-kom404mo8',
                'barang_fk'            => null,
                'pending_fk'           => 'p-kom404mo8',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
            [
                'pengelolaan_kode'     => 't9-sar404me9',
                'barang_fk'            => null,
                'pending_fk'           => 'p-sar404me9',
                'user_fk'              => 'admin',
                'pengelolaan_tanggal'  => $currentDate,
                'jenis_fk'             => 'TAMBAH',
                'pengelolaan_status'   => 1,
                'pengelolaan_keterangan'=> null,
                'created_at'           => $currentDateTime,
                'updated_at'           => $currentDateTime,
            ],
        ];

        $this->db->table('pengelolaan_barang')->insertBatch($data);
    }
}
