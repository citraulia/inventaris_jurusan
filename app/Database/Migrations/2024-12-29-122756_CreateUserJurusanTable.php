<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserJurusanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'SERIAL',
                'null'           => false,
            ],
            'user_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
            ],
            'user_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
            ],
            'user_nip' => [
                'type'       => 'VARCHAR',
                'constraint' => 18,
                'default'    => '0',
            ],
            'user_posisi' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'default'    => 'Admin Jurusan',
            ],
            'user_username' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'unique'     => true,
            ],
            'user_password' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
            ],
            'user_level' => [
                'type'       => 'SMALLINT',
                'default'    => 3,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
                'default' => null,
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
                'default' => null,
            ],
        ]);
        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('user_jurusan');
    }

    public function down()
    {
        $this->forge->dropTable('user_jurusan');
    }
}
