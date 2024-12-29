<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kategori_id'       => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'kategori_nama'     => ['type' => 'VARCHAR', 'constraint' => '32'],
            'kategori_slug'     => ['type' => 'VARCHAR', 'constraint' => '32'],
            'kategori_keterangan'=> ['type' => 'TEXT', 'null' => true],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('kategori_id');
        $this->forge->createTable('kategori_barang');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_barang');
    }
}
