<?php

namespace App\Controllers;

use App\Models\user_peminjam_model;

class UserLogin extends BaseController
{
    protected $userPeminjamModel;
    public function __construct()
    {
        $this->userPeminjamModel = new user_peminjam_model();
    }

    //Return to User (peminjam) Login Page.
    public function index()
    {
        $userPeminjam = $this->userPeminjamModel->where('peminjam_status', 1)->findAll();

        $data = [
            'title' => 'LogIn Sebagai Peminjam',
            'background' => 'primary',
            'userPeminjam' => $userPeminjam,
        ];

        return view('user-login/index', $data);
    }

    public function register()
    {
        session();
        $data = [
            'title' => 'Register',
            'background' => 'primary',
            'validation' => \Config\Services::validation()
        ];

        return view('user-login/register', $data);
    }

    //Save User Register
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'nama' => 'required|min_length[3]',
            'hp' => 'required|numeric|min_length[10]',
            'email' => 'required|valid_email|is_unique[user_peminjam.peminjam_email]',
            'username' => 'required|is_unique[user_peminjam.peminjam_username]',
            'password' => 'required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/]',
            'confirmPassword' => 'matches[password]',
        ], [
            'confirmPassword' => [
                'matches' => 'Password dan Confirm Password tidak sama. Mohon cek kembali.',
            ],
        ])) {

            $validation = \Config\Services::validation();

            if ($validation->getError('username')) {
                session()->setFlashdata('error', 'Username telah tersedia. Mohon ganti.');
            }
        
            if ($validation->getError('email')) {
                session()->setFlashdata('error', 'Email telah digunakan. Mohon ganti.');
            }
        
            if ($validation->getError('password')) {
                session()->setFlashdata('error', 'Password harus mengandung minimal 8 karakter, dan mengandung huruf dan angka.');
            }

            // Jika confirm password tidak cocok
            if ($validation->getError('confirmPassword')) {
                session()->setFlashdata('error', $validation->getError('confirmPassword'));
            }
            
            return redirect()->to('/register')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('username'), '-', true);
        $this->userPeminjamModel->save([
            'peminjam_nama' => $this->request->getVar('nama'),
            'peminjam_slug' => $slug,
            'peminjam_hp' => $this->request->getVar('hp'),
            'peminjam_email' => $this->request->getVar('email'),
            'peminjam_username' => $this->request->getVar('username'),
            'peminjam_password' => $this->request->getVar('password'),
            'peminjam_status' => 2,
        ]);

        session()->setFlashdata('pesan', 'Permintaan membuat akun berhasil diajukan. Mohon tunggu persetujuan admin.');

        return redirect()->to("/login");
    }

    public function jurusanLogin()
    {
        $data = [
            'title' => 'LogIn Sebagai Admin',
            'background' => 'info'
        ];

        return view('user-login/jurusan_login', $data);
    }

    //--------------------------------------------------------------------

}
