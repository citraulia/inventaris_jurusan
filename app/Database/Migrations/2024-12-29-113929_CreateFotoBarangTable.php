<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotoBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'foto_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'barang_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => '32',
            ],
            'foto_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('foto_id', true);
        $this->forge->createTable('foto_barang');
    }

    public function down()
    {
        $this->forge->dropTable('foto_barang');
    }
}
