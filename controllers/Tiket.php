<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memuat model Tiket_model
        $this->load->model('TiketMod');
        // Memuat library form_validation
        $this->load->library('form_validation');
    }

    // Menampilkan halaman form pemesanan tiket
    public function index()
    {
        $this->load->view('tiket');
    }

    // Menangani proses pemesanan tiket
    public function pesan()
    {
        // Validasi input form
        $this->form_validation->set_rules('nama', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('nama_tempat', 'Nama Tempat Wisata', 'required');
        $this->form_validation->set_rules('harga', 'Harga Tiket', 'required');
        $this->form_validation->set_rules('jumlah_tiket', 'Jumlah Tiket', 'required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form
            $this->load->view('tiket');
        } else {
            // Menyiapkan data untuk disimpan
            $data = array(
                'nama' => $this->input->post('nama'),
                'nama_tempat' => $this->input->post('nama_tempat'),
                'harga' => $this->input->post('harga'),
                'jumlah_tiket' => $this->input->post('jumlah_tiket'),
                'total_harga' => $this->input->post('total_harga')
            );

            // Menyimpan data ke database menggunakan model
            $this->TiketMod->simpanPemesanan($data);

            // Menampilkan pesan sukses
            $this->session->set_flashdata('success', 'Pemesanan tiket berhasil!');
            redirect('peta');
        }
    }
}
