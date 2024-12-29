<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserPeminjamSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'peminjam_nama'     => 'Akbar',
                'peminjam_slug'     => 'peminjam01',
                'peminjam_hp'       => '0123456789',
                'peminjam_alamat'   => 'Bandung, Jawa Barat, Indonesia',
                'peminjam_username' => 'peminjam01',
                'peminjam_password' => 'peminjam01',
                'peminjam_level'    => 4,
                'created_at'        => '2022-02-25 08:18:06',
                'updated_at'        => '2022-02-28 07:54:47',
            ],
            [
                'peminjam_nama'     => 'Peminjam Kedua',
                'peminjam_slug'     => 'peminjam02',
                'peminjam_hp'       => '0211226458',
                'peminjam_alamat'   => 'Jakarta',
                'peminjam_username' => 'Peminjam02',
                'peminjam_password' => 'Peminjam02',
                'peminjam_level'    => 4,
                'created_at'        => '2022-02-25 04:01:38',
                'updated_at'        => '2022-02-25 04:01:38',
            ],
        ];

        $this->db->table('user_peminjam')->insertBatch($data);
    }
}
