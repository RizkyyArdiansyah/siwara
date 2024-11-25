<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        } else {
            $this->load->view('login');
        }
    }
    public function __construct()
    {
        parent::__construct();
        // Memuat library form_validation
        $this->load->library('form_validation');
        // Memuat model LoginMod
        $this->load->model('LoginMod');
    }

    public function masuk()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cek terlebih dahulu di tabel admin
        $admin = $this->LoginMod->cekUser($username, $password, 'admin');

        if ($admin) {
            // Jika data ditemukan di tabel admin
            $this->session->set_userdata('logged_in', TRUE);
            redirect('dashboard');
        } else {
            // Cek di tabel user
            $user = $this->LoginMod->cekUser($username, $password, 'user');

            if ($user) {
                // Jika data ditemukan di tabel user
                $this->session->set_userdata('logged_in', TRUE);
                // Mengarahkan ke halaman tiket
                redirect('tiket');
            } else {
                // Jika username atau password tidak ditemukan
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect('login');
            }
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('logged_in');
        redirect('');
    }

    public function regis()
    {
        // Tampilkan halaman registrasi
        $this->load->view('register');  // Ganti dengan view yang sesuai dengan halaman registrasi
    }

    public function prosesRegis()
    {
        // Validasi form registrasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        // Validasi password dengan minimal panjang 5 karakter
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {
            // Mengambil data inputan form
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);  // Menggunakan hash untuk password

            // Membuat array data untuk insert ke tabel user
            $data = [
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
            ];

            // Memanggil model untuk insert data
            $this->load->model('LoginMod');
            if ($this->LoginMod->insertUser($data)) {
                // Jika berhasil, set flashdata sukses
                $this->session->set_flashdata('success', 'Register Success');
                // Tampilkan kembali halaman register dengan pesan sukses
                $this->load->view('register');
            } else {
                // Jika gagal, set flashdata error
                $this->session->set_flashdata('error', 'Registration Failed');
                $this->load->view('register');
            }
        } else {
            // Jika validasi gagal
            // Set pesan error untuk password jika kurang dari 5 karakter
            if ($this->form_validation->error('password')) {
                $this->session->set_flashdata('error', 'Password must be at least 5 characters.');
            } else {
                $this->session->set_flashdata('error', 'Please fill all fields correctly.');
            }

            // Tampilkan kembali halaman register
            $this->load->view('register');
        }
    }
}  

