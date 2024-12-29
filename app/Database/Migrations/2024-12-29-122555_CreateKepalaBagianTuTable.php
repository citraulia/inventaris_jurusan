<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKepalaBagianTuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tu_id'      => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'tu_nama'    => ['type' => 'VARCHAR', 'constraint' => '32'],
            'tu_nip'     => ['type' => 'VARCHAR', 'constraint' => '18'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('tu_id');
        $this->forge->createTable('kepala_bagian_tu');
    }

    public function down()
    {
        $this->forge->dropTable('kepala_bagian_tu');
    }
}
