<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('KategoriBarangSeeder');
        $this->call('LokasiBarangSeeder');
        $this->call('InformasiBarangSeeder');
        $this->call('FotoBarangSeeder');
        $this->call('InformasiBarangPendingSeeder');
        $this->call('FotoBarangPendingSeeder');
        $this->call('JenisPengelolaanSeeder');
        $this->call('KepalaBagianTuSeeder');
        $this->call('UserPeminjamSeeder');
        $this->call('UserJurusanSeeder');
        $this->call('PengelolaanBarangSeeder');
    }
}
