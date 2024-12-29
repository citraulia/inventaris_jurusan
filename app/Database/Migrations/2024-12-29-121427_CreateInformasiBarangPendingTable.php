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
                'auto_increment' => true,
            ],
            'pending_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => false,
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
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('pending_id');
        $this->forge->createTable('informasi_barang_pending');
    }

    public function down()
    {
        $this->forge->dropTable('informasi_barang_pending');
    }
}
