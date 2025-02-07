<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserPeminjamTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'peminjam_id' => [
                'type'           => 'SERIAL',
                'null'           => false,
            ],
            'peminjam_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'peminjam_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'peminjam_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'peminjam_email' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique'     => true,
            ],
            'peminjam_username' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'unique'     => true,
            ],
            'peminjam_password' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'peminjam_level' => [
                'type'       => 'SMALLINT',
                'default'    => 4,
            ],
            'peminjam_status' => [
                'type'       => 'SMALLINT',
                'constraint' => 1,
                'default'    => 1,
                'comment'    => "'0' = Inactive, '1' = Active, '2' = Pending",
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
        $this->forge->addPrimaryKey('peminjam_id');
        $this->forge->createTable('user_peminjam');
    }

    public function down()
    {
        $this->forge->dropTable('user_peminjam');
    }
}
