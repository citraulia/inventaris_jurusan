<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKumpulanBarangDipinjamTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kumpulan_id' => [
                'type'           => 'SERIAL',
                'null'           => false,
            ],
            'barang_dipinjam_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'transaksi_fk' => [
                'type'       => 'INT',
                'constraint' => 11,
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
            'status_barang' => [
                'type'       => 'SMALLINT',
                'default'    => 2,
            ],
        ]);

        $this->forge->addPrimaryKey('kumpulan_id');

        $this->forge->addKey('barang_dipinjam_fk');
        $this->forge->addKey('transaksi_fk');

        $this->forge->createTable('kumpulan_barang_dipinjam');

        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE kumpulan_barang_dipinjam
            ADD CONSTRAINT barang_dipinjam_fk
            FOREIGN KEY (barang_dipinjam_fk)
            REFERENCES informasi_barang (barang_kode)
            ON UPDATE CASCADE;

            ALTER TABLE kumpulan_barang_dipinjam
            ADD CONSTRAINT transaksi_fk
            FOREIGN KEY (transaksi_fk)
            REFERENCES transaksi_peminjaman (transaksi_id)
            ON UPDATE CASCADE;
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE kumpulan_barang_dipinjam DROP CONSTRAINT IF EXISTS barang_dipinjam_fk;
            ALTER TABLE kumpulan_barang_dipinjam DROP CONSTRAINT IF EXISTS transaksi_fk;
        ");

        $this->forge->dropTable('kumpulan_barang_dipinjam');
    }
}
