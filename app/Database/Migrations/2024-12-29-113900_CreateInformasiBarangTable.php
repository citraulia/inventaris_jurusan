<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInformasiBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'barang_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
            ],
            'barang_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'unique'     => true,
            ],
            'barang_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'kategori_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'barang_merk' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => true,
            ],
            'barang_deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'barang_tahun_perolehan' => [
                'type' => 'SMALLINT',
                'null' => true,
            ],
            'barang_keadaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'barang_harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,0',
                'default'    => 0,
            ],
            'lokasi_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 16,
            ],
            'barang_keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'barang_status' => [
                'type'       => 'SMALLINT',
                'constraint' => 1,
                'default'    => 1,
                'comment'    => "'0' = Dihapus, '1' = Active, '2' = Sedang Dipinjam, '3' = Pending, '4' = Sedang Perbaikan",
            ],
            'barang_dipinjamkan' => [
                'type'       => 'SMALLINT',
                'constraint' => 1,
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

        $this->forge->addKey('barang_id', true);
        $this->forge->addKey('kategori_fk');
        $this->forge->addKey('lokasi_fk');

        $this->forge->createTable('informasi_barang');

        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE informasi_barang
            ADD CONSTRAINT kategori_foreign
            FOREIGN KEY (kategori_fk)
            REFERENCES kategori_barang (kategori_nama)
            ON UPDATE CASCADE;

            ALTER TABLE informasi_barang
            ADD CONSTRAINT lokasi_foreign
            FOREIGN KEY (lokasi_fk)
            REFERENCES lokasi_barang (lokasi_kode)
            ON UPDATE CASCADE;
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE informasi_barang DROP CONSTRAINT IF EXISTS kategori_foreign;
            ALTER TABLE informasi_barang DROP CONSTRAINT IF EXISTS lokasi_foreign;
        ");

        $this->forge->dropTable('informasi_barang');
    }
}
