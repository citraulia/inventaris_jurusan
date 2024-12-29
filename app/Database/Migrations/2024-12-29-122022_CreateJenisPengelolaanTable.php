<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisPengelolaanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'jenis_id'       => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'jenis_nama'     => ['type' => 'VARCHAR', 'constraint' => '32'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('jenis_id');
        $this->forge->createTable('jenis_pengelolaan');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_pengelolaan');
    }
}
