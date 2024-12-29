<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiPeminjamanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'transaksi_id'         => 1,
                'peminjam_fk'          => 'peminjam01',
                'tanggal_peminjaman'   => '2022-03-02',
                'tanggal_pengembalian' => '2022-03-09',
                'jurusan_fk'           => 'ketuajurusan',
                'pengajuan_status'     => 1,
                'peminjaman_status'    => 1,
                'created_at'           => '2022-03-02 01:00:49',
                'updated_at'           => '2022-03-02 01:01:57',
            ],
        ];

        $this->db->table('transaksi_peminjaman')->insertBatch($data);
    }
}
