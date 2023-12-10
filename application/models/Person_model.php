<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person_model extends CI_Model
{
    // Pada Person_model ini digunakan untuk mengakses database user
    // Tambahkan variabel public

    public $table = 'user';
    public $id    = 'user.id';

    public function get_by_id($id)
    {
        // Fungsi ini untuk mengakses daftar-daftar user yang terdaftar 
        // pada database
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function cekData($where = null)
    {
        //mengecek data user
        return $this->db->get_where('user', $where);
    }

    public function countuser($idget) {
        // Tingkatkan jumlah tampilan postingan di database
        $this->db->set('uploaded', 'uploaded+1', FALSE);
        $this->db->where('id', $idget);
        $this->db->update('user');
    }

    public function getdataupload() {
        // Mengambil data dari tabel
        $this->db->select('*');
        $this->db->from('user'); // Gantilah 'your_table' dengan nama tabel Anda
        $this->db->where('uploaded >', 0); // Gantilah 'your_column' dengan nama kolom yang ingin Anda gunakan
        $this->db->order_by('uploaded', 'DESC'); // Gantilah 'your_column' dengan nama kolom yang ingin Anda gunakan
        $this->db->limit(5, 0);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getdatauploadall() {
        // Mengambil data dari tabel
        $this->db->select('*');
        $this->db->from('user'); // Gantilah 'your_table' dengan nama tabel Anda
        $this->db->where('uploaded >', 0); // Gantilah 'your_column' dengan nama kolom yang ingin Anda gunakan
        $this->db->order_by('uploaded', 'DESC'); // Gantilah 'your_column' dengan nama kolom yang ingin Anda gunakan
        $query = $this->db->get();

        return $query->result_array();
    }

    public function cari_datauser($keyworduser) {
        // Fungsi ini digunakan untuk mencari data user sesuai email yang diketikan
        $this->db->like('email', $keyworduser); 
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_all()
    {
        // Fungsi ini untuk mengakses daftar-daftar 
        // user yang terdaftar pada database
        return $this->db->get('user')->result_array();
    }

    public function insert($data)
    {
        //menambahkan user baru
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        //mengupdate data pada user
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function updatePass($data, $id)
    {
        //mengupdate password user
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
	}

    public function delete($id)
    {
        //menghapus user
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function getUserLimit(){
        // Fungsi ini digunakan untuk mengambil data akun user, 
        // namun dibatasi 10 data user
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get()->result_array();
    }
}
