<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kategori_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
            ],
            'kategori_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'unique'     => true,
            ],
            'kategori_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'kategori_keterangan' => [
                'type' => 'TEXT',
                'null' => true,
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

        $this->forge->addPrimaryKey('kategori_id');
        $this->forge->createTable('kategori_barang');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_barang');
    }
}
