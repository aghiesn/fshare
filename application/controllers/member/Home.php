<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memanggil fungsi check_login() dari controller pusat yaitu MY_Controller,
        // kemudian menjalankan fungsi if, dimana jika rolenya tidak sesuai akan merefresh terus
        // sehingga tidak bisa diakses oleh guest maupun admin
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
        $this->load->library('cors');
        $this->cors->handle();
    }

    public function index() 
    {
        // Fungsi ini digunakan untuk menampilkan halaman utama dari user yang sudah login,
        // kemudian memanggil data yang ada di helper terlebih dahulu
        $data = konfigurasi('Dashboard'); 
        $this->template->load('layouts/template', 'member/dashboard', $data);
    }

    public function detailedsong(){ 
        // Fungsi ini digunakan untuk menampilkan detail lagu untuk user yang login,
        // menginisialisasi url dan Lagu_model, mengambil id dari tombol detail pada dashboard,
        // mengambil data dari Lagu_model, kemudian ditampilkan di view
        $this->load->helper('url');
        $this->load->model('Lagu_model');
        
        
        $idlagu = $this->input->post('l_id'); // Mengambil id
        $getlagu = $this->Lagu_model->getSongById($idlagu);// Mengambil data sesuai id lagu
        $data = konfigurasi('Detail Lagu');

        $this->template->load('layouts/template-detail', 'member/dashboard-detail2', $data);

    }
}
