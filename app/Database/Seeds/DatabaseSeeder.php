<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('FotoBarangPendingSeeder');
        $this->call('FotoBarangSeeder');
        $this->call('InformasiBarangPendingSeeder');
        $this->call('InformasiBarangSeeder');
        $this->call('JenisPengelolaanSeeder');
        $this->call('KategoriBarangSeeder');
        $this->call('KepalaBagianTuSeeder');
        $this->call('KumpulanBarangDipinjamSeeder');
        $this->call('LokasiBarangSeeder');
        $this->call('PengelolaanBarangSeeder');
        $this->call('TransaksiPeminjamanSeeder');
        $this->call('UserJurusanSeeder');
        $this->call('UserPeminjamSeeder');
    }
}
