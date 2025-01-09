<?php

namespace App\Controllers\Jurusan;

use App\Controllers\BaseController;
use App\Models\informasi_barang_model;
use App\Models\kumpulan_barang_dipinjam_model;
use App\Models\transaksi_peminjaman_model;
use App\Models\user_peminjam_model;

class RiwayatPeminjamanBarang extends BaseController
{
    protected $transaksiPeminjamanModel;
    protected $kumpulanBarangModel;
    protected $informasiBarangModel;
    protected $userPeminjamModel;

    public function __construct()
    {
        if (session()->get('role') != 'Jurusan') {
            echo 'Access denied.';
            exit;
        }

        $this->transaksiPeminjamanModel = new transaksi_peminjaman_model();
        $this->kumpulanBarangModel = new kumpulan_barang_dipinjam_model();
        $this->informasiBarangModel = new informasi_barang_model();
        $this->userPeminjamModel = new user_peminjam_model();
    }

    public function index()
    {
        $data = [
            'title' => 'Jurusan | Riwayat Peminjaman Barang',
            'transaksiPeminjaman' => $this->transaksiPeminjamanModel->getTransaksi(),
        ];

        return view('jurusan/riwayat-peminjaman-barang/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Riwayat Peminjaman | Detail Peminjaman',
            'informasiBarang' => $this->informasiBarangModel,
            'transaksiPeminjaman' => $this->transaksiPeminjamanModel->getTransaksi($id),
            'kumpulanBarang' => $this->kumpulanBarangModel->getKumpulanBarang($id),
        ];

        return view('jurusan/riwayat-peminjaman-barang/detail', $data);
    }

    public function setujui($id)
    {
        // Ambil semua barang yang terkait dengan transaksi
        $kumpulanBarang = $this->kumpulanBarangModel->getKumpulanBarang($id);

        // Loop melalui barang-barang untuk menyetujui yang belum ditolak
        foreach ($kumpulanBarang as $barangPinjaman) {
            if ($barangPinjaman['status_barang'] == 0) {
                // Lewati barang yang sudah ditolak
                continue;
            }

            // Perbarui status barang menjadi disetujui
            $this->kumpulanBarangModel->where([
                'barang_dipinjam_fk' => $barangPinjaman['barang_dipinjam_fk'],
                'transaksi_fk' => $id
            ])->set(['status_barang' => 1])->update();

            // Perbarui status barang di tabel informasi barang
            $barang = $this->informasiBarangModel->getInformasiBarang($barangPinjaman['barang_dipinjam_fk']);
            $this->informasiBarangModel->save([
                'barang_id' => $barang['barang_id'],
                'barang_status' => 2, // Status disetujui
                'barang_dipinjamkan' => 0, // Tidak tersedia untuk dipinjam lagi
            ]);
        }

        // Perbarui status transaksi berdasarkan barang
        $this->updateTransaksiStatus($id);

        session()->setFlashdata('pesan', "Barang yang belum ditolak berhasil disetujui.");
        return redirect()->to("jurusan/peminjaman");
    }

    public function tolak($id)
    {
        // Ambil semua barang yang terkait dengan transaksi
        $kumpulanBarang = $this->kumpulanBarangModel->getKumpulanBarang($id);
    
        // Loop melalui barang-barang untuk menolak yang belum disetujui
        foreach ($kumpulanBarang as $barangPinjaman) {
            if ($barangPinjaman['status_barang'] == 1) {
                // Lewati barang yang sudah disetujui
                continue;
            }
    
            // Perbarui status barang menjadi ditolak
            $this->kumpulanBarangModel->where([
                'barang_dipinjam_fk' => $barangPinjaman['barang_dipinjam_fk'],
                'transaksi_fk' => $id
            ])->set(['status_barang' => 0])->update();
    
            // Perbarui status barang di tabel informasi barang
            $barang = $this->informasiBarangModel->getInformasiBarang($barangPinjaman['barang_dipinjam_fk']);
            $this->informasiBarangModel->save([
                'barang_id' => $barang['barang_id'],
                'barang_status' => 1, // Status tersedia
                'barang_dipinjamkan' => 1, // Tersedia untuk dipinjam lagi
            ]);
        }
    
        // Perbarui status transaksi berdasarkan barang
        $this->updateTransaksiStatus($id);
    
        session()->setFlashdata('pesan', "Barang yang belum disetujui berhasil ditolak.");
        return redirect()->to("jurusan/peminjaman");
    }    

    public function setujuiBarang()
    {
        $transaksiId = $this->request->getPost('transaksi_id');
        $barangId = $this->request->getPost('barang_id');

        if (!$transaksiId || !$barangId) {
            return redirect()->back()->with('pesan', 'Data tidak valid!');
        }
        
        $this->kumpulanBarangModel->where(['barang_dipinjam_fk' => $barangId, 'transaksi_fk' => $transaksiId])
                                ->set(['status_barang' => 1])
                                ->update();
        
        $this->updateTransaksiStatus($transaksiId);

        session()->setFlashdata('pesan', "Barang berhasil disetujui.");
        return redirect()->to("jurusan/riwayatpeminjamanbarang/detail/$transaksiId");
    }

    public function tolakBarang()
    {
        $transaksiId = $this->request->getPost('transaksi_id');
        $barangId = $this->request->getPost('barang_id');

        if (!$transaksiId || !$barangId) {
            return redirect()->back()->with('pesan', 'Data tidak valid!');
        }

        $this->kumpulanBarangModel->where(['barang_dipinjam_fk' => $barangId, 'transaksi_fk' => $transaksiId])
                                ->set(['status_barang' => 0])
                                ->update();

        $barang = $this->informasiBarangModel->where('barang_kode', $barangId)->first();
        $this->informasiBarangModel->save([
            'barang_id' => $barang['barang_id'],
            'barang_status' => 1,
            'barang_dipinjamkan' => 1,
        ]);

        $this->updateTransaksiStatus($transaksiId);

        session()->setFlashdata('pesan', "Barang berhasil ditolak.");
        return redirect()->to("jurusan/riwayatpeminjamanbarang/detail/$transaksiId");
    }

    private function updateTransaksiStatus($transaksiId)
    {
        // Ambil semua barang terkait transaksi
        $barangStatuses = $this->kumpulanBarangModel->where('transaksi_fk', $transaksiId)->findAll();
    
        $isAnyApproved = false; // Ada barang yang disetujui
        $isAnyPending = false;  // Ada barang yang pending
        $isAllRejected = true;  // Semua barang ditolak
    
        foreach ($barangStatuses as $barang) {
            if ($barang['status_barang'] == 1) {
                $isAnyApproved = true;
                $isAllRejected = false;
            } elseif (!isset($barang['status_barang']) || $barang['status_barang'] == 2) {
                $isAnyPending = true;
                $isAllRejected = false;
            } elseif ($barang['status_barang'] == 0) {
                // Barang ditolak
                $isAllRejected = $isAllRejected && true;
            }
        }
    
        // Tentukan status transaksi berdasarkan kondisi barang
        if ($isAllRejected) {
            $pengajuanStatus = 0; // Semua barang ditolak
            $peminjamanStatus = -1; // Tidak dipinjam
        } elseif ($isAnyPending) {
            $pengajuanStatus = 2; // Masih ada barang yang pending
            $peminjamanStatus = 2; // Status pending
        } elseif ($isAnyApproved) {
            $pengajuanStatus = 1; // Barang disetujui
            $peminjamanStatus = 1; // Sedang dipinjam
        }
    
        // Perbarui status transaksi
        $this->transaksiPeminjamanModel->save([
            'transaksi_id' => $transaksiId,
            'pengajuan_status' => $pengajuanStatus,
            'peminjaman_status' => $peminjamanStatus,
        ]);
    }

    public function dikembalikan($id)
    {
        $this->transaksiPeminjamanModel->save([
            'transaksi_id' => $id,
            'jurusan_fk' => session('username'),
            'peminjaman_status' => 0,
        ]);

        $kumpulanBarang = $this->kumpulanBarangModel->getKumpulanBarang($id);
        foreach ($kumpulanBarang as $barangPinjaman) {
            $barang = $this->informasiBarangModel->getInformasiBarang($barangPinjaman['barang_dipinjam_fk']);
            $this->informasiBarangModel->save([
                'barang_id' => $barang['barang_id'],
                'barang_status' => 1,
                'barang_dipinjamkan' => 1,
            ]);
        }

        session()->setFlashdata('pesan', "Konfirmasi bahwa Barang sudah Dikembalikan Berhasil.");

        return redirect()->to("jurusan/peminjaman");
    }
}
