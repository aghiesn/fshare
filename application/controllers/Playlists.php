<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Playlists extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('cors');
        $this->cors->handle();
        $this->load->helper(array('form', 'url'));
    }

    public function tambahplay(){
        // Fungsi ini digunakan untuk menambahkan lagu 
        // kedalam playlist satu user yang login, dengan 
        // mengambil user_id, id_lagu, title, nama file lagu, 
        // dan gambar thumbnailnya. Data-data tersebut ditaruh 
        // kedalam tabel playlist dengan Lagu_model insertData
        $id_lagu = $this->input->post('lagu_id');
        $inlagu = $this->db->query("Select * from lagu where id_lagu=$id_lagu")->row();
        $this->load->model('Lagu_model');

        $tempplay = [
            'user_id' => $this->session->userdata('id'),
            'id_lagu' => $inlagu->id_lagu,
            'title_lagu' => $inlagu->judul_lagu,
            'url_lagu' => $inlagu->link_mp3,
            'thumb_lagu' => $inlagu->photo

        ];

        $this->Lagu_model->insertData('playlist', $tempplay);
        $this->session->set_flashdata('msg', show_succ_msg('Berhasil ditambahkan ke data playlist!'));
        redirect('auth/guest');
    }

    public function hapusplay(){
        // Fungsi ini digunakan untuk menghapus playlist pada 
        // satu user berdasarkan id user dan id lagu
        $laguuserid = $this->session->userdata('id');
        $idlagu = $this->input->post('lagu_id');
        $this->load->model('Lagu_model');

        $this->Lagu_model->deleteplay($laguuserid, $idlagu);
        redirect(base_url());
    }
}