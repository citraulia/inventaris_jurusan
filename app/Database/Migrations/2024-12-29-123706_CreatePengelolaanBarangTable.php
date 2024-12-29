<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengelolaanBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pengelolaan_id'      => ['type' => 'SERIAL', 'null' => false],
            'pengelolaan_kode'    => ['type' => 'VARCHAR', 'constraint' => '16'],
            'barang_fk'           => ['type' => 'VARCHAR', 'constraint' => '32', 'null' => true],
            'pending_fk'          => ['type' => 'VARCHAR', 'constraint' => '32', 'null' => true],
            'user_fk'             => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => true],
            'pengelolaan_tanggal' => ['type' => 'DATE', 'null' => false],
            'jenis_fk'            => ['type' => 'VARCHAR', 'constraint' => '64', 'null' => false],
            'pengelolaan_status'  => ['type' => 'SMALLINT', 'default' => 2],
            'pengelolaan_keterangan' => ['type' => 'TEXT', 'null' => true],
            'created_at'          => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'          => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('pengelolaan_id');
        $this->forge->createTable('pengelolaan_barang');
    }

    public function down()
    {
        $this->forge->dropTable('pengelolaan_barang');
    }
}
