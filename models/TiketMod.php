<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TiketMod extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Menyimpan data pemesanan tiket ke dalam tabel tiket
    public function simpanPemesanan($data)
    {
        // Menyimpan data ke tabel tiket
        $this->db->insert('tiket', $data);
    }
}
