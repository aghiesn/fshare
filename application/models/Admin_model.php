<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin_model extends CI_Model
{

    public function getUserPassById($iduser)
    {
        // Fungsi ini untuk mengambil data user sesuai ID, 
        // kemudian mengembalikan hasilnya menjadi baris
        $this->db->where('id', $iduser);
        return $this->db->get('user')->row_array();
    }
    
    public function updatePassword($iduser, $newPassword)
    {
        // Fungsi ini digunakan untuk mengupdate password, 
        // dengan mencari data usernya sesuai id, kemudian 
        // mengupdate baris password dengan yang baru
        $this->db->where('id', $iduser);
        $this->db->update('user', array('password' => $newPassword));
    }

    public function getidrole($role){
        // Mengambil nama role sesuai idnya
        $this->db->where('id', $role);
        $q = $this->db->get('role');
        return $q->row();
    }

    public function getAllRole()
    {
        // Mengambil semua role dari tabel role
        return $this->db->get('role')->result();
    }

    public function get_by_id($id)
    {
        // Mengambil satu data user sesuai dengan idnya, hasilnya akan dikembalikan sebagai baris
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

}    