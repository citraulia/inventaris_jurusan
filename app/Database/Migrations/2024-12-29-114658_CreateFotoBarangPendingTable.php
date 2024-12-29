<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotoBarangPendingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'foto_pending_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pending_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'foto_pending_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('foto_pending_id', true);
        $this->forge->createTable('foto_barang_pending');
    }

    public function down()
    {
        $this->forge->dropTable('foto_barang_pending');
    }
}
