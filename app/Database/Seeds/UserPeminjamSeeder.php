<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserPeminjamSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $data = [
            [
                'peminjam_nama'     => 'peminjam01',
                'peminjam_slug'     => 'peminjam01',
                'peminjam_hp'       => '0812345678',
                'peminjam_email'   => 'test@example.com',
                'peminjam_username' => 'peminjam01',
                'peminjam_password' => 'pinjambarang@01',
                'peminjam_level'    => 4,
                'created_at'        => $currentDateTime,
                'updated_at'        => $currentDateTime,
            ],
        ];

        $this->db->table('user_peminjam')->insertBatch($data);
    }
}
