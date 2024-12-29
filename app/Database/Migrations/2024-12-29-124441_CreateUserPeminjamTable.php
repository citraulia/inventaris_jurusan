<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserPeminjamTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'peminjam_id'     => ['type' => 'SERIAL', 'null' => false],
            'peminjam_nama'   => ['type' => 'VARCHAR', 'constraint' => '64'],
            'peminjam_slug'   => ['type' => 'VARCHAR', 'constraint' => '64'],
            'peminjam_hp'     => ['type' => 'VARCHAR', 'constraint' => '64'],
            'peminjam_alamat' => ['type' => 'TEXT'],
            'peminjam_username' => ['type' => 'VARCHAR', 'constraint' => '64'],
            'peminjam_password' => ['type' => 'VARCHAR', 'constraint' => '64'],
            'peminjam_level'  => ['type' => 'SMALLINT', 'default' => 4],
            'created_at'      => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'      => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('peminjam_id');
        $this->forge->createTable('user_peminjam');
    }

    public function down()
    {
        $this->forge->dropTable('user_peminjam');
    }
}
