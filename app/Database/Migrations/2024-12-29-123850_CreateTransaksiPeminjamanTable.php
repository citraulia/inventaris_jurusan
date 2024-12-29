<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiPeminjamanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaksi_id'        => ['type' => 'SERIAL', 'null' => false],
            'peminjam_fk'         => ['type' => 'VARCHAR', 'constraint' => '64'],
            'tanggal_peminjaman'  => ['type' => 'DATE', 'null' => false],
            'tanggal_pengembalian'=> ['type' => 'DATE', 'null' => false],
            'jurusan_fk'          => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => true],
            'pengajuan_status'    => ['type' => 'SMALLINT', 'default' => 2],
            'peminjaman_status'   => ['type' => 'SMALLINT', 'default' => 2],
            'created_at'          => ['type' => 'TIMESTAMP', 'null' => false],
            'updated_at'          => ['type' => 'TIMESTAMP', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('transaksi_id');
        $this->forge->createTable('transaksi_peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_peminjaman');
    }
}
