<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginMod extends CI_Model
{
    // Fungsi untuk memeriksa apakah admin atau user ada di database
    public function cekUser($username, $password, $user_type = 'user')
    {
        // Tentukan tabel berdasarkan jenis pengguna
        $table = ($user_type == 'admin') ? 'admin' : 'user';
        
        // Ambil data pengguna dari tabel yang sesuai
        $query = $this->db->get_where($table, array('username' => $username));
        $user = $query->row();  // Ambil data pertama jika ada

        // Verifikasi password jika user ditemukan
        if ($user) {
            if ($user_type == 'admin') {
                // Untuk admin, periksa password langsung (misalnya, jika tidak di-hash)
                if ($password == $user->password) {
                    return $user;  // Return admin jika password cocok
                }
            } else {
                // Untuk user biasa, verifikasi password yang di-hash
                if (password_verify($password, $user->password)) {
                    return $user;  // Return user jika password cocok
                }
            }
        }

        return null;  // Jika tidak ada atau password salah
    }

    // Fungsi untuk menyimpan data user baru ke tabel user
    public function insertUser($data)
    {
        // Menyimpan data user ke tabel 'user'
        return $this->db->insert('user', $data);
    }
}
