<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiPeminjamanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaksi_id' => [
                'type'           => 'SERIAL',
                'null'           => false,
            ],
            'peminjam_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'null'    => false,
            ],
            'tanggal_peminjaman' => [
                'type'    => 'DATE',
                'null'    => false,
            ],
            'tanggal_pengembalian' => [
                'type'    => 'DATE',
                'null'    => false,
            ],
            'jurusan_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => true,
            ],
            'pengajuan_status' => [
                'type'       => 'SMALLINT',
                'default'    => 2,
                'null'       => false,
            ],
            'peminjaman_status' => [
                'type'       => 'SMALLINT',
                'default'    => 2,
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => null,
                'null'    => false,
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => null,
                'null'    => false,
            ],
        ]);

        $this->forge->addPrimaryKey('transaksi_id');

        $this->forge->addKey('peminjam_fk');
        $this->forge->addKey('jurusan_fk');

        $this->forge->createTable('transaksi_peminjaman');

        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE transaksi_peminjaman
            ADD CONSTRAINT peminjam_fk
            FOREIGN KEY (peminjam_fk)
            REFERENCES user_peminjam (peminjam_username)
            ON UPDATE CASCADE;

            ALTER TABLE transaksi_peminjaman
            ADD CONSTRAINT jurusan_fk
            FOREIGN KEY (jurusan_fk)
            REFERENCES user_jurusan (user_username)
            ON UPDATE CASCADE;
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE transaksi_peminjaman DROP CONSTRAINT IF EXISTS peminjam_fk;
            ALTER TABLE transaksi_peminjaman DROP CONSTRAINT IF EXISTS jurusan_fk;
        ");

        $this->forge->dropTable('transaksi_peminjaman');
    }
}
