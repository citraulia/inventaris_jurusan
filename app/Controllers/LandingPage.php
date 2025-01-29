<?php

namespace App\Controllers;

use App\Models\StatistikKategoriBarang;
use App\Models\StatistikInformasiBarang;
use App\Models\informasi_barang_model;
use App\Models\lokasi_barang_model;
use App\Models\foto_barang_model;

class LandingPage extends BaseController
{
    protected $statistikKategoriBarang;
    protected $statistikInformasiBarang;
    protected $informasiBarangModel;
    protected $lokasiBarangModel;
    protected $fotoBarangModel;

    public function __construct()
    {
        $this->statistikKategoriBarang = new StatistikKategoriBarang();
        $this->statistikInformasiBarang = new StatistikInformasiBarang();
        $this->informasiBarangModel = new informasi_barang_model();
        $this->lokasiBarangModel = new lokasi_barang_model();
        $this->fotoBarangModel = new foto_barang_model();
    }

    public function index()
    {
        $kategoriData = $this->statistikKategoriBarang->getKategoriWithCount();

        $labels = array_column($kategoriData, 'kategori');
        $data = array_column($kategoriData, 'jumlah');

        $totalBarang = $this->statistikInformasiBarang->countAllResults();
        $totalActive = $this->statistikInformasiBarang->whereIn('barang_status', ['1', '3'])->countAllResults();
        $totalInactive = $this->statistikInformasiBarang->where(['barang_status' => '4'])->countAllResults();
        $totalDipinjam = $this->statistikInformasiBarang->where(['barang_status' => '2'])->countAllResults();

        $data = [
            'labels' => json_encode($labels),
            'data' => json_encode($data),
            'totalBarang' => $totalBarang,
            'totalActive' => $totalActive,
            'totalInactive' => $totalInactive,
            'totalDipinjam' => $totalDipinjam,
        ];

        return view('landing/index', $data);
    }
    
    // Method untuk menampilkan informasi barang
    public function informasiBarang() {
        $informasiBarang = $this->informasiBarangModel->where('barang_status !=', 0)->findAll();
        $title = 'Informasi Barang';
        
        return view('landing/informasi-barang', ['informasiBarang' => $informasiBarang, 'title' => $title]);
    }
    
    // Method untuk menampilkan detail barang
    public function detailBarang($barangKode) {
        $informasiBarang = $this->informasiBarangModel->where('barang_kode', $barangKode)->first();
        
        $title = 'Detail Barang';
        
        if (!$informasiBarang) {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang tidak ditemukan');
        }
        
        $lokasiBarang = $this->lokasiBarangModel->getLokasiBarang($informasiBarang['lokasi_fk']);
        
        return view('landing/detail-barang', [
           'informasiBarang' => $informasiBarang,
           'lokasiBarang' => $lokasiBarang,
           'title' => $title,
           'fotoBarang' => $this->fotoBarangModel->getFoto($barangKode),
        ]);
    }
}
