<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInformasiBarangPendingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pending_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
            ],
            'pending_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => false,
                'unique'     => true,
            ],
            'pending_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'null'       => false,
            ],
            'kategori_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => false,
            ],
            'pending_merk' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => true,
            ],
            'pending_deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pending_tahun_perolehan' => [
                'type' => 'INTEGER',
                'null' => true,
            ],
            'pending_keadaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => false,
            ],
            'pending_harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,0',
                'default'    => 0,
            ],
            'lokasi_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 16,
                'null'       => false,
            ],
            'pending_keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pending_status' => [
                'type'       => 'SMALLINT',
                'default'    => 1,
                'comment'    => "'0' = INACTIVE, '1' = ACTIVE, '2' = DIPINJAMKAN",
            ],
            'pending_dipinjamkan' => [
                'type'       => 'SMALLINT',
                'default'    => 0,
                'comment'    => "'0' = TIDAK DIPINJAMKAN, '1' = BOLEH DIPINJAMKAN",
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addPrimaryKey('pending_id');
        $this->forge->addKey('kategori_fk');
        $this->forge->addKey('lokasi_fk');
        $this->forge->createTable('informasi_barang_pending');

        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE informasi_barang_pending
            ADD CONSTRAINT kategori_pending_foreign
            FOREIGN KEY (kategori_fk)
            REFERENCES kategori_barang (kategori_nama)
            ON UPDATE CASCADE;

            ALTER TABLE informasi_barang_pending
            ADD CONSTRAINT lokasi_pending_foreign
            FOREIGN KEY (lokasi_fk)
            REFERENCES lokasi_barang (lokasi_kode)
            ON UPDATE CASCADE;
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE informasi_barang_pending DROP CONSTRAINT IF EXISTS kategori_pending_foreign;
            ALTER TABLE informasi_barang_pending DROP CONSTRAINT IF EXISTS lokasi_pending_foreign;
        ");

        $this->forge->dropTable('informasi_barang_pending');
    }
}
