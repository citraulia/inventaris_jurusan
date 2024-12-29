<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserJurusanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_nama'     => 'Dian Saadillah Maylawati, S.Kom., MT., Ph.D',
                'user_slug'     => 'ketuajurusan',
                'user_nip'      => '198002252011011007',
                'user_posisi'   => 'Ketua Jurusan',
                'user_username' => 'ketuajurusan',
                'user_password' => 'ketuajurusan',
                'user_level'    => 1,
                'created_at'    => '2022-02-06 11:53:49',
                'updated_at'    => '2022-02-28 17:08:38',
            ],
            [
                'user_nama'     => 'Agung Wahana, M.T., S.E.',
                'user_slug'     => 'sekretarisjurusan',
                'user_nip'      => '197305312009011003',
                'user_posisi'   => 'Sekretaris Jurusan',
                'user_username' => 'sekretarisjurusan',
                'user_password' => 'sekretarisjurusan',
                'user_level'    => 2,
                'created_at'    => '2022-02-06 11:53:49',
                'updated_at'    => '2022-02-28 06:32:13',
            ],
            [
                'user_nama'     => 'Admin Pertama',
                'user_slug'     => 'admin',
                'user_nip'      => '0000',
                'user_posisi'   => 'Admin Jurusan',
                'user_username' => 'admin',
                'user_password' => 'adminadmin',
                'user_level'    => 3,
                'created_at'    => '2022-02-06 04:56:47',
                'updated_at'    => '2022-02-28 10:40:08',
            ],
            [
                'user_nama'     => 'Admin Kedua',
                'user_slug'     => 'admindua',
                'user_nip'      => '1123213',
                'user_posisi'   => 'Admin Jurusan',
                'user_username' => 'admindua',
                'user_password' => 'admindua',
                'user_level'    => 3,
                'created_at'    => '2022-02-06 05:09:25',
                'updated_at'    => '2022-02-28 06:26:11',
            ],
            [
                'user_nama'     => 'Admin Ketiga',
                'user_slug'     => 'admintiga',
                'user_nip'      => '0',
                'user_posisi'   => 'Admin Jurusan',
                'user_username' => 'admintiga',
                'user_password' => 'admintiga',
                'user_level'    => 3,
                'created_at'    => '2022-02-28 17:08:57',
                'updated_at'    => '2022-02-28 17:08:57',
            ],
        ];

        $this->db->table('user_jurusan')->insertBatch($data);
    }
}
