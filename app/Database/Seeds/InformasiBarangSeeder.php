<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InformasiBarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['barang_id' => 1, 'barang_kode' => 'sar404pa1', 'barang_nama' => 'Papan Tulis', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-01 02:11:30', 'updated_at' => '2022-03-01 02:11:30'],
            ['barang_id' => 2, 'barang_kode' => 'sar404pa2', 'barang_nama' => 'Papan Tulis', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-01 02:11:35', 'updated_at' => '2022-03-01 02:11:35'],
            ['barang_id' => 3, 'barang_kode' => 'sar404le3', 'barang_nama' => 'Lemari', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-01 02:11:40', 'updated_at' => '2022-03-01 02:11:40'],
            ['barang_id' => 4, 'barang_kode' => 'kom404cp4', 'barang_nama' => 'CPU', 'kategori_fk' => 'Komputer', 'barang_merk' => 'HP', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 2, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-01 02:11:46', 'updated_at' => '2022-03-02 01:01:57'],
            ['barang_id' => 5, 'barang_kode' => 'kom404mo5', 'barang_nama' => 'Mouse', 'kategori_fk' => 'Komputer', 'barang_merk' => 'Logitech', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 2, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-01 02:11:51', 'updated_at' => '2022-03-02 01:01:57'],
            ['barang_id' => 6, 'barang_kode' => 'kom404mp6', 'barang_nama' => 'Mpuse', 'kategori_fk' => 'Komputer', 'barang_merk' => 'Logitech', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 2, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-01 02:11:51', 'updated_at' => '2022-03-02 01:01:57'],
            ['barang_id' => 7, 'barang_kode' => 'kom404ke7', 'barang_nama' => 'Keyboard', 'kategori_fk' => 'Komputer', 'barang_merk' => 'Logitech', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 1, 'created_at' => '2022-03-01 02:12:09', 'updated_at' => '2022-03-01 02:12:09'],
            ['barang_id' => 8, 'barang_kode' => 'sar409ku8', 'barang_nama' => 'Kursi', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.09', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-01 02:12:13', 'updated_at' => '2022-03-01 02:12:13'],
            ['barang_id' => 9, 'barang_kode' => 'sar409me9', 'barang_nama' => 'Meja Besar', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.09', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-01 02:12:19', 'updated_at' => '2022-03-01 02:12:19'],
            ['barang_id' => 10, 'barang_kode' => 'kom404mo10', 'barang_nama' => 'Monitor', 'kategori_fk' => 'Komputer', 'barang_merk' => 'HP', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 0000, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 1, 'created_at' => '2022-03-01 02:12:37', 'updated_at' => '2022-03-01 02:12:37'],
            ['barang_id' => 11, 'barang_kode' => 'sar404me11', 'barang_nama' => 'Meja', 'kategori_fk' => 'Sarana', 'barang_merk' => '', 'barang_deskripsi' => '', 'barang_tahun_perolehan' => 2019, 'barang_keadaan' => 'BAIK', 'barang_harga' => '0', 'lokasi_fk' => 'R.4.04', 'barang_keterangan' => '', 'barang_status' => 1, 'barang_dipinjamkan' => 0, 'created_at' => '2022-03-02 00:55:03', 'updated_at' => '2022-03-02 00:55:03'],
        ];

        $this->db->table('informasi_barang')->insertBatch($data);
    }
}
