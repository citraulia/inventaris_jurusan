<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisPengelolaanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'jenis_id'   => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
            ],
            'jenis_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'unique'     => true,
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

        $this->forge->addPrimaryKey('jenis_id');
        $this->forge->createTable('jenis_pengelolaan');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_pengelolaan');
    }
}
