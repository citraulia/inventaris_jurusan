<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKumpulanBarangDipinjamTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kumpulan_id'      => ['type' => 'SERIAL', 'null' => false],
            'barang_dipinjam_fk' => ['type' => 'VARCHAR', 'constraint' => '32'],
            'transaksi_fk'     => ['type' => 'INT', 'constraint' => 11],
            'created_at'       => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'       => ['type' => 'TIMESTAMP', 'null' => true],
            'status_barang'    => ['type' => 'SMALLINT', 'default' => 2],
        ]);
        $this->forge->addPrimaryKey('kumpulan_id');
        $this->forge->createTable('kumpulan_barang_dipinjam');
    }

    public function down()
    {
        $this->forge->dropTable('kumpulan_barang_dipinjam');
    }
}
