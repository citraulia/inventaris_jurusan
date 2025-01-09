<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotoBarangPendingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'foto_pending_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
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

        $this->forge->addKey('foto_pending_id', true);
        $this->forge->addKey('pending_fk');
        $this->forge->createTable('foto_barang_pending');

        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE foto_barang_pending
            ADD CONSTRAINT barang_pending_foreign
            FOREIGN KEY (pending_fk)
            REFERENCES informasi_barang_pending (pending_kode)
            ON DELETE CASCADE
            ON UPDATE CASCADE;
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE foto_barang_pending DROP CONSTRAINT IF EXISTS barang_pending_foreign");

        $this->forge->dropTable('foto_barang_pending');
    }
}
