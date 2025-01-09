<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengelolaanBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pengelolaan_id' => [
                'type'           => 'SERIAL',
                'null'           => false,
            ],
            'pengelolaan_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 16,
                'unique'     => true,
            ],
            'barang_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => true,
            ],
            'pending_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => true,
            ],
            'user_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => true,
            ],
            'pengelolaan_tanggal' => [
                'type'    => 'DATE',
                'null'    => false,
            ],
            'jenis_fk' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'null'       => false,
            ],
            'pengelolaan_status' => [
                'type'       => 'SMALLINT',
                'default'    => 2,
            ],
            'pengelolaan_keterangan' => [
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

        $this->forge->addPrimaryKey('pengelolaan_id');

        $this->forge->addKey('barang_fk');
        $this->forge->addKey('pending_fk');
        $this->forge->addKey('user_fk');
        $this->forge->addKey('jenis_fk');

        $this->forge->createTable('pengelolaan_barang');

        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE pengelolaan_barang
            ADD CONSTRAINT barang_utama_foreign
            FOREIGN KEY (barang_fk)
            REFERENCES informasi_barang (barang_kode)
            ON UPDATE CASCADE;

            ALTER TABLE pengelolaan_barang
            ADD CONSTRAINT jenis_fk
            FOREIGN KEY (jenis_fk)
            REFERENCES jenis_pengelolaan (jenis_nama)
            ON UPDATE CASCADE;

            ALTER TABLE pengelolaan_barang
            ADD CONSTRAINT pending_fk
            FOREIGN KEY (pending_fk)
            REFERENCES informasi_barang_pending (pending_kode)
            ON UPDATE CASCADE;

            ALTER TABLE pengelolaan_barang
            ADD CONSTRAINT user_fk
            FOREIGN KEY (user_fk)
            REFERENCES user_jurusan (user_username)
            ON DELETE NO ACTION
            ON UPDATE CASCADE;
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $db->query("
            ALTER TABLE pengelolaan_barang DROP CONSTRAINT IF EXISTS barang_utama_foreign;
            ALTER TABLE pengelolaan_barang DROP CONSTRAINT IF EXISTS jenis_fk;
            ALTER TABLE pengelolaan_barang DROP CONSTRAINT IF EXISTS pending_fk;
            ALTER TABLE pengelolaan_barang DROP CONSTRAINT IF EXISTS user_fk;
        ");

        $this->forge->dropTable('pengelolaan_barang');
    }
}
