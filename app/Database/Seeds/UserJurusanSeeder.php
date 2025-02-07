<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserJurusanSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $data = [
            [
                'user_nama'     => 'Dian Saadillah Maylawati, S.Kom., MT., Ph.D',
                'user_slug'     => 'ketuajurusan',
                'user_nip'      => '198905262019032023',
                'user_posisi'   => 'Ketua Jurusan',
                'user_username' => 'ketuajurusan',
                'user_password' => 'kajurif#2025',
                'user_level'    => 1,
                'created_at'    => $currentDateTime,
                'updated_at'    => $currentDateTime,
            ],
            [
                'user_nama'     => 'Agung Wahana, M.T., S.E.',
                'user_slug'     => 'sekretarisjurusan',
                'user_nip'      => '197305312009011003',
                'user_posisi'   => 'Sekretaris Jurusan',
                'user_username' => 'sekretarisjurusan',
                'user_password' => 'sekjur@if123',
                'user_level'    => 2,
                'created_at'    => $currentDateTime,
                'updated_at'    => $currentDateTime,
            ],
            [
                'user_nama'     => 'Admin Pertama',
                'user_slug'     => 'admin',
                'user_nip'      => '0000',
                'user_posisi'   => 'Admin Jurusan',
                'user_username' => 'admin1',
                'user_password' => 'adminjurusan$2025',
                'user_level'    => 3,
                'created_at'    => $currentDateTime,
                'updated_at'    => $currentDateTime,
            ],
            [
                'user_nama'     => 'Admin Kedua',
                'user_slug'     => 'admindua',
                'user_nip'      => '0000',
                'user_posisi'   => 'Admin Jurusan',
                'user_username' => 'admin2',
                'user_password' => 'adminif!2025',
                'user_level'    => 3,
                'created_at'    => $currentDateTime,
                'updated_at'    => $currentDateTime,
            ],
            [
                'user_nama'     => 'Admin Ketiga',
                'user_slug'     => 'admintiga',
                'user_nip'      => '0000',
                'user_posisi'   => 'Admin Jurusan',
                'user_username' => 'admin3',
                'user_password' => '2025!adminjurusan',
                'user_level'    => 3,
                'created_at'    => $currentDateTime,
                'updated_at'    => $currentDateTime,
            ],
        ];

        $this->db->table('user_jurusan')->insertBatch($data);
    }
}
