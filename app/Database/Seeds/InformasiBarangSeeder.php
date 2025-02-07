<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InformasiBarangSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $data = [
            ['barang_kode' => 'sar404pa1', 'barang_nama' => 'Papan Tulis', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['barang_kode' => 'sar404le2', 'barang_nama' => 'Lemari', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['barang_kode' => 'kom404cp3', 'barang_nama' => 'CPU', 'kategori_fk' => 'Komputer', 'barang_merk' => 'HP', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['barang_kode' => 'kom404mo4', 'barang_nama' => 'Mouse', 'kategori_fk' => 'Komputer', 'barang_merk' => 'Logitech', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['barang_kode' => 'kom404ke5', 'barang_nama' => 'Keyboard', 'kategori_fk' => 'Komputer', 'barang_merk' => 'Logitech', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 1, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['barang_kode' => 'sar409ku6', 'barang_nama' => 'Kursi', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.09', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['barang_kode' => 'sar409me7', 'barang_nama' => 'Meja Besar', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.09', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['barang_kode' => 'kom404mo8', 'barang_nama' => 'Monitor', 'kategori_fk' => 'Komputer', 'barang_merk' => 'HP', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 1, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
            ['barang_kode' => 'sar404me9', 'barang_nama' => 'Meja', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 2019, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime],
        ];

        $this->db->table('informasi_barang')->insertBatch($data);
    }
}
