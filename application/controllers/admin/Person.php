<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Person_model');
        $this->load->library('template');
        $this->check_login();
        if ($this->session->userdata('id_role') != '1') {
            redirect('', 'refresh');
        }
        $this->load->library('cors');
        $this->cors->handle();
    }

    public function index()
    {
        $data            = konfigurasi('Person', 'Kelola Person');
        $data['persons'] = $this->Person_model->getUserLimit()->result_array();
        $this->template->load('layouts/template', 'admin/persons/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah Person', 'Tambah Person');
        $this->template->load('layouts/template', 'admin/persons/create', $data);
    }

    public function create()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $negara = $this->input->post('negara');
        $kota = $this->input->post('kota');
        $tanggal_lahir = $this->input->post('tanggal_lahir');


        $data = array(
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'negara' => $negara,
            'kota' => $kota,
            'tanggal_lahir' => $tanggal_lahir,
        );
        $this->Person_model->insert($data);
        redirect('admin/person');
    }

    public function edit($id)
    {
        $data           = konfigurasi('Edit Person', 'Edit Person');
        $data['person'] = $this->Person_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/persons/update', $data);
    }

    public function update()
    {
        $id      = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $negara = $this->input->post('negara');
        $kota = $this->input->post('kota');
        $tanggal_lahir = $this->input->post('tanggal_lahir');


        $data = array(
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'negara' => $negara,
            'kota' => $kota,
            'tanggal_lahir' => $tanggal_lahir,
        );
        $this->Person_model->update(['id' => $id], $data);
        redirect('admin/person');
    }

    public function detail($id)
    {
        $data           = konfigurasi('Detail Person', 'Detail Person');
        $data['person'] = $this->Person_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/persons/detail', $data);
    }

    public function delete($id)
    {
        $this->Person_model->delete($id);
        redirect('admin/person');
    }
}

/* End of file Person.php */
