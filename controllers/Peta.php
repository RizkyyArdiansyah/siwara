<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{
    public function index()
    {
        $data['gunung'] = $this->GunungMod->Gunung();
        $data['pantai'] = $this->PantaiMod->Pantai();
        $this->load->view('peta', $data);
    }
}
