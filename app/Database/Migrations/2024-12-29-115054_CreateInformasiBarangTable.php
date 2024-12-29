<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInformasiBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'barang_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'barang_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
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
                'comment'    => "'0' = INACTIVE, '1' = ACTIVE, '2' = DIPINJAMKAN",
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
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('barang_id', true);
        $this->forge->createTable('informasi_barang');
    }

    public function down()
    {
        $this->forge->dropTable('informasi_barang');
    }
}
