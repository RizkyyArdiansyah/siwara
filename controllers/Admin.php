<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private function cekAdmin()
    {
        if (!$this->session->userdata('admin_sess')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->cekAdmin();
        $data['pantai'] = $this->PantaiMod->Pantai();
        $data['gunung'] = $this->GunungMod->Gunung();
        $this->load->view('admin', $data);
    }

    public function tambah_pg()
    {
        $this->cekAdmin();
        $this->load->view('tambah');
    }

    private function tambah_item($model)
    {
        $this->cekAdmin();
        $data = array(
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'lat' => $this->input->post('lat'),
            'lon' => $this->input->post('lon'),
            'img' => $this->input->post('img'),
        );
        $model->tambah($data);
        redirect('admin');
    }

    private function update_item($model, $id)
    {
        $this->cekAdmin();
        $data = array(
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'lat' => $this->input->post('lat'),
            'lon' => $this->input->post('lon'),
            'img' => $this->input->post('img'),
        );
        $model->perbarui($id, $data);
        redirect('admin');
    }

    private function delete_item($model, $id)
    {
        $this->cekAdmin();
        $model->hapus($id);
        redirect('admin');
    }

    public function tambah_pt()
    {
        $this->tambah_item($this->PantaiMod);
    }

    public function tambah_gn()
    {
        $this->tambah_item($this->GunungMod);
    }

    public function data_pt($id)
    {
        $this->cekAdmin();
        $data['pantai'] = $this->PantaiMod->data($id);
        $this->load->view('edit', $data);
    }

    public function data_gn($id)
    {
        $this->cekAdmin();
        $data['gunung'] = $this->GunungMod->data($id);
        $this->load->view('edit', $data);
    }

    public function perbarui_pt($id)
    {
        $this->update_item($this->PantaiMod, $id);
    }

    public function perbarui_gn($id)
    {
        $this->update_item($this->GunungMod, $id);
    }

    public function hapus_pt($id)
    {
        $this->delete_item($this->PantaiMod, $id);
    }

    public function hapus_gn($id)
    {
        $this->delete_item($this->GunungMod, $id);
    }
}
