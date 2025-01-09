<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotoBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'foto_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
            ],
            'barang_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => '32',
            ],
            'foto_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
                'unique'     => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => null,
            ],
        ]);

        $this->forge->addKey('foto_id', true);

        $this->forge->addKey('barang_fk');

        $this->forge->createTable('foto_barang');

        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE foto_barang
            ADD CONSTRAINT barang_foreign
            FOREIGN KEY (barang_fk)
            REFERENCES informasi_barang (barang_kode)
            ON DELETE CASCADE
            ON UPDATE CASCADE;
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE foto_barang DROP CONSTRAINT IF EXISTS barang_foreign");

        $this->forge->dropTable('foto_barang');
    }
}
