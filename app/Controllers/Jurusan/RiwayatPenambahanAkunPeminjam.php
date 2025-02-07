<?php

namespace App\Controllers\Jurusan;

use App\Controllers\BaseController;
use App\Models\user_peminjam_model;

class RiwayatPenambahanAkunPeminjam extends BaseController
{
    protected $userPeminjamModel;

    public function __construct()
    {
        if (session()->get('role') != 'Jurusan') {
            echo 'Access denied.';
            exit;
        }

        $this->userPeminjamModel = new user_peminjam_model();
    }

    public function index()
    {
        // Ambil semua data penambahan akun peminjam yang ada (pastikan ada relasi status dan informasi lainnya)
        $data = [
            'title' => 'Riwayat Penambahan Akun Peminjam',
            'userPeminjam' => $this->userPeminjamModel->findAll(),
        ];

        return view('jurusan/user-peminjam/riwayat-penambahan-peminjam', $data);
    }

    public function setujuiPeminjam($id)
    {
        $this->userPeminjamModel->update($id, ['peminjam_status' => 1]);

        session()->setFlashdata('pesan', 'Peminjam berhasil disetujui.');
        return redirect()->to('/jurusan/penambahan-peminjam');
    }

    public function tolakPeminjam($id)
    {
        $this->userPeminjamModel->update($id, ['peminjam_status' => 0]);

        session()->setFlashdata('pesan', 'Peminjam ditolak.');
        return redirect()->to('/jurusan/penambahan-peminjam');
    }
}
