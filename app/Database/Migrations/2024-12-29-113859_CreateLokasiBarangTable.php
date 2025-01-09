<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLokasiBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'lokasi_id' => [
                'type'           => 'SERIAL',
                'null'           => false,
            ],
            'lokasi_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 16,
                'unique'     => true,
            ],
            'lokasi_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 16,
            ],
            'lokasi_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'lokasi_lantai' => [
                'type'       => 'SMALLINT',
                'constraint' => 2,
            ],
            'lokasi_fakultas' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
            ],
            'lokasi_keterangan' => [
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
        $this->forge->addPrimaryKey('lokasi_id');
        $this->forge->createTable('lokasi_barang');
    }

    public function down()
    {
        $this->forge->dropTable('lokasi_barang');
    }
}
