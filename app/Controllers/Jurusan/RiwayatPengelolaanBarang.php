<?php

namespace App\Controllers\Jurusan;

use App\Controllers\BaseController;
use App\Models\foto_barang_model;
use App\Models\foto_pending_model;
use App\Models\informasi_barang_model;
use App\Models\informasi_barang_pending_model;
use App\Models\jenis_pengelolaan_model;
use App\Models\lokasi_barang_model;
use App\Models\pengelolaan_barang_model;

class RiwayatPengelolaanBarang extends BaseController
{
    //Keterangan
    protected $pengelolaanModel;
    protected $jenisPengelolaanModel;

    //Main Barang Model
    protected $informasiBarangModel;
    protected $fotoBarangModel;

    //Pending Model
    protected $barangPendingModel;
    protected $fotoPendingModel;

    //Others
    protected $lokasiBarangModel;

    public function __construct()
    {
        if (session()->get('role') != 'Jurusan') {
            echo 'Access denied.';
            exit;
        }

        $this->pengelolaanModel = new pengelolaan_barang_model();
        $this->jenisPengelolaanModel = new jenis_pengelolaan_model();

        $this->informasiBarangModel = new informasi_barang_model();
        $this->fotoBarangModel = new foto_barang_model();

        $this->barangPendingModel = new informasi_barang_pending_model();
        $this->fotoPendingModel = new foto_pending_model();

        $this->lokasiBarangModel = new lokasi_barang_model();
    }

    public function index()
    {
        $data = [
            'title' => 'Jurusan | Riwayat Pengelolaan Barang',
            'pengelolaanBarang' => $this->pengelolaanModel->getPengelolaan(),
            'barangOri' => $this->informasiBarangModel,
            'barangPending' => $this->barangPendingModel,
        ];

        return view('jurusan/riwayat-pengelolaan-barang/index', $data);
    }

    public function detail($kodePengelolaan, $kodeBarang = NULL)
    {
        $pengelolaanBarang = $this->pengelolaanModel->getPengelolaan($kodePengelolaan);

        if ($pengelolaanBarang['jenis_fk'] == 'TAMBAH') {
            $data = [
                'title' => 'Pengelolaan | Detail Pengajuan Penambahan Barang',
                'pengelolaanBarang' => $pengelolaanBarang,
                'barangPending' => $this->barangPendingModel->getBarangPending($pengelolaanBarang['pending_fk']),
                'fotoPending' => $this->fotoPendingModel->getFoto($pengelolaanBarang['pending_fk']),
                'lokasiBarang' => $this->lokasiBarangModel,
            ];

            return view('jurusan/riwayat-pengelolaan-barang/penambahan', $data);
        } else if ($pengelolaanBarang['jenis_fk'] == 'UBAH') {
            $data = [
                'title' => 'Pengelolaan | Detail Pengajuan Perubahan Barang',
                'pengelolaanBarang' => $pengelolaanBarang,
                'barangOriginal' => $this->informasiBarangModel->getInformasiBarang($kodeBarang),
                'barangPending' => $this->barangPendingModel->getBarangPending($pengelolaanBarang['pending_fk']),
                'lokasiBarang' => $this->lokasiBarangModel,
                'fotoPending' => $this->fotoPendingModel->getFoto($pengelolaanBarang['pending_fk']),
            ];

            return view('jurusan/riwayat-pengelolaan-barang/perubahan', $data);
        } else if ($pengelolaanBarang['jenis_fk'] == 'HAPUS') {
            $data = [
                'title' => 'Pengelolaan | Detail Pengajuan Penghapusan Barang',
                'pengelolaanBarang' => $pengelolaanBarang,
                'barangOriginal' => $this->informasiBarangModel->getInformasiBarang($kodeBarang),
                'barangPending' => $this->barangPendingModel->getBarangPending($pengelolaanBarang['pending_fk']),
                'lokasiBarang' => $this->lokasiBarangModel,
                'fotoPending' => $this->fotoPendingModel->getFoto($pengelolaanBarang['pending_fk']),
            ];

            return view('jurusan/riwayat-pengelolaan-barang/penghapusan', $data);
        }
    }

    public function setujui($kodePengelolaan, $kodeBarang = NULL)
    {
        $pengelolaanBarang = $this->pengelolaanModel->getPengelolaan($kodePengelolaan);
        $barangPending = $this->barangPendingModel->getBarangPending($pengelolaanBarang['pending_fk']);

        $this->pengelolaanModel->update($pengelolaanBarang['pengelolaan_id'], [
            'pengelolaan_status' => 1, // Status disetujui
            'pengelolaan_tanggal' => date('Y-m-d'), // Tanggal persetujuan
            'user_fk' => session('username'), // User yang menyetujui
        ]);

        if ($pengelolaanBarang['jenis_fk'] == 'TAMBAH') {
            // Tentukan status barang berdasarkan keadaan barang
            $barangStatus = ($barangPending['pending_keadaan'] == 'RUSAK') ? 4 : 1;

            // Buat kode Barang terlebih dahulu
            $barangID = $this->informasiBarangModel->getInsertID(); // ID Barang setelah save
            $createKodeBarang = $this->informasiBarangModel->createKode(
                $barangPending['kategori_fk'], 
                $barangPending['lokasi_fk'], 
                $barangPending['pending_nama'], 
                $barangID
            );
            $kodeBarang = url_title($createKodeBarang, '-', true);

            $this->informasiBarangModel->save([
                'barang_nama' => $barangPending['pending_nama'],
                'kategori_fk' => $barangPending['kategori_fk'],
                'barang_merk' => $barangPending['pending_merk'],
                'barang_deskripsi' => $barangPending['pending_deskripsi'],
                'barang_tahun_perolehan' => $barangPending['pending_tahun_perolehan'],
                'barang_keadaan' => $barangPending['pending_keadaan'],
                'barang_harga' => $barangPending['pending_harga'],
                'lokasi_fk' => $barangPending['lokasi_fk'],
                'barang_keterangan' => $barangPending['pending_keterangan'],
                'barang_status' => $barangStatus,
                'barang_dipinjamkan' => $barangPending['pending_dipinjamkan'],
                'barang_kode' => $kodeBarang,
            ]);

            //Tambahkan foto
            $fotoPending = $this->fotoPendingModel->getFoto($barangPending['pending_kode']);
            if ($fotoPending) {
                foreach ($fotoPending as $foto) {
                    $fotoNama = $foto['foto_pending_nama'];
                    $this->fotoBarangModel->save([
                        'barang_fk' => $kodeBarang,
                        'foto_nama' => $fotoNama,
                    ]);
                }
            }

            session()->setFlashdata('pesan', "Data " . $barangPending['pending_nama'] . " dengan kode barang " . $kodeBarang . " berhasil ditambahkan.");

            return redirect()->to("/jurusan/informasibarang");
        } else if ($pengelolaanBarang['jenis_fk'] == 'UBAH') {
            $barangOri = $this->informasiBarangModel->getInformasiBarang($kodeBarang);

            $createKodeBarang = $this->informasiBarangModel->createKode($barangPending['kategori_fk'], $barangPending['lokasi_fk'], $barangPending['pending_nama'], $barangOri['barang_id']);
            $kodeBarang = url_title($createKodeBarang, '-', true);

            $barangStatus = ($barangPending['pending_keadaan'] == 'RUSAK') ? 4 : 1; 

            $this->informasiBarangModel->save([
                'barang_id' => $barangOri['barang_id'],
                'barang_kode' => $kodeBarang,
                'barang_nama' => $barangPending['pending_nama'],
                'kategori_fk' => $barangPending['kategori_fk'],
                'barang_merk' => $barangPending['pending_merk'],
                'barang_deskripsi' => $barangPending['pending_deskripsi'],
                'barang_tahun_perolehan' => $barangPending['pending_tahun_perolehan'],
                'barang_keadaan' => $barangPending['pending_keadaan'],
                'barang_harga' => $barangPending['pending_harga'],
                'lokasi_fk' => $barangPending['lokasi_fk'],
                'barang_keterangan' => $barangPending['pending_keterangan'],
                'barang_status' => $barangStatus,
                'barang_dipinjamkan' => $barangPending['pending_dipinjamkan'],
            ]);

            $fotoPending = $this->fotoPendingModel->getFoto($barangPending['pending_kode']);
            if ($fotoPending) {
                foreach ($fotoPending as $foto) {
                    $fotoNama = $foto['foto_pending_nama'];
                    $this->fotoBarangModel->save([
                        'barang_fk' => $kodeBarang,
                        'foto_nama' => $fotoNama,
                    ]);
                }
            }

            session()->setFlashdata('pesan', "Data " . $barangPending['pending_nama'] . " dengan kode barang " . $kodeBarang . " berhasil diubah.");

            return redirect()->to("/jurusan/informasibarang");
        } else if ($pengelolaanBarang['jenis_fk'] == 'HAPUS') {
            $barangOri = $this->informasiBarangModel->getInformasiBarang($kodeBarang);

            $this->informasiBarangModel->save([
                'barang_id' => $barangOri['barang_id'],
                'barang_status' => 0,
                'barang_dipinjamkan' => $barangPending['pending_dipinjamkan'],
            ]);

            //Hapus foto yang ada pada barang
            $fotoBarang = $this->fotoBarangModel->getFoto($barangOri['barang_kode']);
            foreach ($fotoBarang as $foto) {
                $fotoNama = $foto['foto_nama'];
                $fotoPending = $this->fotoPendingModel->where(['foto_pending_nama' => $fotoNama])->first();

                unlink('img/' . $fotoNama);

                $this->fotoBarangModel->delete($foto['foto_id']);
                $this->fotoPendingModel->delete($fotoPending['foto_pending_id']);
            }

            session()->setFlashdata('pesan', "Data " . $barangPending['pending_nama'] . " dengan kode barang " . $barangPending['pending_kode'] . " berhasil di-Inactive-kan. \nFoto yang menjadi bagian dari barang ini berhasil dihapus.");

            return redirect()->to("/jurusan/informasibarang");
        }
    }

    public function tolak($kodePengelolaan)
    {
        $pengelolaanBarang = $this->pengelolaanModel->getPengelolaan($kodePengelolaan);
        $barangPending = $this->barangPendingModel->getBarangPending($pengelolaanBarang['pending_fk']);
    
        // Jika jenis pengelolaan adalah "UBAH", cari barang asli dan ubah statusnya kembali ke active
        if ($pengelolaanBarang['jenis_fk'] == 'UBAH') {
            $barangOri = $this->informasiBarangModel->where('barang_kode', $pengelolaanBarang['barang_fk'])->first();
    
            // Update status barang menjadi active tanpa mengubah informasi lainnya
            $this->informasiBarangModel->update($barangOri['barang_id'], [
                'barang_status' => 1,
                'barang_dipinjamkan' => 0,
            ]);
        }
    
        // Jika jenis pengelolaan adalah "HAPUS", ubah status barang menjadi active
        if ($pengelolaanBarang['jenis_fk'] == 'HAPUS') {
            $barangOri = $this->informasiBarangModel->where('barang_kode', $pengelolaanBarang['barang_fk'])->first();
    
            // Update status barang menjadi active tanpa mengubah informasi lainnya
            $this->informasiBarangModel->update($barangOri['barang_id'], [
                'barang_status' => 1,
                'barang_dipinjamkan' => 0,
            ]);
        }
    
        // Hapus foto barang yang ada pada tabel pending
        $fotoBarang = $this->fotoPendingModel->getFoto($barangPending['pending_kode']);
        if ($fotoBarang) {
            foreach ($fotoBarang as $foto) {
                $fotoNama = $foto['foto_pending_nama'];
    
                if (file_exists('img/' . $fotoNama)) {
                    unlink('img/' . $fotoNama);
                }
    
                $this->fotoPendingModel->delete($foto['foto_pending_id']);
            }
        }
    
        // Update status pengelolaan menjadi ditolak
        $this->pengelolaanModel->save([
            'pengelolaan_id' => $this->request->getVar('id'),
            'pengelolaan_status' => 0,
            'pengelolaan_keterangan' => $this->request->getVar('keterangan'),
        ]);
    
        session()->setFlashdata('tolak', "Pengajuan data dengan kode pengelolaan " . $kodePengelolaan . " telah ditolak.");
        return redirect()->to("/jurusan/riwayatpengelolaanbarang");
    }
}
