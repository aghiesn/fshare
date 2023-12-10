<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth_model extends CI_Model
{
    public $table       = 'user';
    public $id          = 'user.id';

    public function __construct()
    {
        parent::__construct();
    }

    public function update($data, $id)
    {
        // Fungsi ini digunakan untuk mengirimkan data ke database
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
	}
	
	public function get_by_id()
    {
        // Fungsi ini digunakan untuk mendapatkan data 
        // user sesuai sesi user yang sedang login, kemudian 
        // dipilih tabel role, dimana bagian id diubah 
        // menjadi id_role, diambil nama role, dan deskripsinya. 
        // Setelah itu id_role disamakan dengan id_role yang ada 
        // dari tabel user.
        $id = $this->session->userdata('id');
        $this->db->select('
            user.*, role.id AS id_role, role.name, role.description,
        ');
        $this->db->join('role', 'user.id_role = role.id');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function getUsername()
    {
        $id = $this->session->userdata('id');
        $this->db->select('
            user.*, user.username,
        ');
        $this->db->join('user', 'user.username = lagu.upload_by');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function reg()
    {
        // Fungsi ini digunakan untuk memasukkan data registrasi ke dalam database 
        date_default_timezone_set('ASIA/JAKARTA');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'id_role' => '2',
            'activated' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'last_login' => date('Y-m-d H:i:s'),
            'password' => get_hash($this->input->post('password'))
        );
        return $this->db->insert($this->table, $data);
    }

    public function login($email, $password)
    {
        $query = $this->db->get_where($this->table, array('email'=>$email, 'password'=>$password));
        return $query->row_array();
    }

    public function check_account($email)
    {
        // Fungsi ini digunakan untuk mengambil data email yang 
        // ada di tabel email, kemudian menjalankan logika if, 
        // yang nantinya akan menghasilkan angka yang akan dikirimkan 
        // ke controller auth/check_account()
        
        $this->db->where('email', $email);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->activated == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
    }

    public function logout($date, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $date);
    }



}
