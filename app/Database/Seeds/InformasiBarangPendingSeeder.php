<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InformasiBarangPendingSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $data = [
            [
                'pending_kode'        => 'p-sar404pa1',
                'pending_nama'        => 'Papan Tulis',
                'kategori_fk'         => 'Sarana',
                'pending_merk'        => '',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 0000,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.04',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 0,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
            [
                'pending_kode'        => 'p-sar404le2',
                'pending_nama'        => 'Lemari',
                'kategori_fk'         => 'Sarana',
                'pending_merk'        => '',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 0000,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.04',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 0,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
            [
                'pending_kode'        => 'p-kom404cp3',
                'pending_nama'        => 'CPU',
                'kategori_fk'         => 'Komputer',
                'pending_merk'        => 'HP',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 0000,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.04',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 1,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
            [
                'pending_kode'        => 'p-kom404mo4',
                'pending_nama'        => 'Mouse',
                'kategori_fk'         => 'Komputer',
                'pending_merk'        => 'Logitech',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 0000,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.04',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 1,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
            [
                'pending_kode'        => 'p-kom404ke5',
                'pending_nama'        => 'Keyboard',
                'kategori_fk'         => 'Komputer',
                'pending_merk'        => 'Logitech',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 0000,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.04',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 1,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
            [
                'pending_kode'        => 'p-sar409ku6',
                'pending_nama'        => 'Kursi',
                'kategori_fk'         => 'Sarana',
                'pending_merk'        => '',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 0000,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.09',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 0,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
            [
                'pending_kode'        => 'p-sar409me7',
                'pending_nama'        => 'Meja Besar',
                'kategori_fk'         => 'Sarana',
                'pending_merk'        => '',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 0000,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.09',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 0,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
            [
                'pending_kode'        => 'p-kom404mo8',
                'pending_nama'        => 'Monitor',
                'kategori_fk'         => 'Komputer',
                'pending_merk'        => 'HP',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 0000,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.04',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 1,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
            [
                'pending_kode'        => 'p-sar404me9',
                'pending_nama'        => 'Meja',
                'kategori_fk'         => 'Sarana',
                'pending_merk'        => '',
                'pending_deskripsi'   => '',
                'pending_tahun_perolehan' => 2019,
                'pending_keadaan'     => 'BAIK',
                'pending_harga'       => 0,
                'lokasi_fk'           => 'R.4.04',
                'pending_keterangan'  => '',
                'pending_status'      => 1,
                'pending_dipinjamkan' => 0,
                'created_at'          => $currentDateTime,
                'updated_at'          => $currentDateTime
            ],
        ];

        $this->db->table('informasi_barang_pending')->insertBatch($data);
    }
}
