<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        //meload modul yang diperlukan
        parent::__construct();
        $this->load->database();
        $this->load->library('cors');
        $this->cors->handle();
        $this->load->helper(array('form', 'url'));
    }

    public function guest(){
        // Memeriksa apakah user login atau tidak, jika user sedang login 
        // akan diperiksa id_role nya. Jika 1, diarahkan ke arah admin, 
        // jika 2 diarahkan ke arah member. Jika tidak login akan diarahkan ke 
        // halaman guest
        if ($this->session->userdata('is_login')){
            
            if ($this->session->userdata('id_role') == "1") {
                redirect('admin/home');
            }
            if ($this->session->userdata('id_role') == "2") {
                redirect('member/home');
            }
        } else {
            // Mengambil data yang diperlukan dari helper, meng-set 
            // title website menjadi Dashboard, dan me-load view guestnya
            $data = guest('Dashboard');
                
            $this->template->load('layouts/template-guest', 'member/dashboard-guest', $data);
        }
    }

    public function editlagu(){
        if ($this->session->userdata('id_role') == "1"){
            $data = konfigurasi('Edit Data Lagu');
                
            $this->template->load('layouts/template-admin', 'admin/editpostingan', $data);
        } else {
            redirect('member/home');
            $this->session->set_flashdata('msg', show_err_msg('Harap Login dengan akun admin!'));
        }
    }

    public function profile()
    {
        // Fungsi ini akan memeriksa user terlebih dahulu, 
        // apakah sudah login atau belum. Jika sudah login, 
        // user akan diarahkan ke halaman ubah profile
        if ($this->session->userdata('is_login')){
            $data = konfigurasi('Profile', 'Kelola Profile');
            $this->template->load('layouts/template', 'authentication/profile', $data);
        } else {
            $data = guest('Dashboard');
                
            $this->template->load('layouts/template-guest', 'member/dashboard-guest', $data);
        }
    }

    public function passwordchange() {
        // Fungsi ini untuk memanggil halaman ubah password pada akun user yang sedang login
        $data = konfigurasi('Profile', 'Kelola Profile');
        $this->template->load('layouts/template', 'authentication/password', $data);
    }

    public function tambahpost(){
        // Fungsi ini digunakan untuk mengarahkan ke halaman tambah postingan
        $data = konfigurasi('Profile', 'Kelola Profile');
        $this->template->load('layouts/template', 'member/tambahpostingan', $data);
        
    }

    public function tampilkankategoriGuest() {
        //me-load filter sesuai dengan kategori untuk halaman pengunjung
        $data = guest('Dashboard');

        $this->template->load('layouts/template-guest', 'member/dashboard-guestkat', $data);
    }

    public function tampilkankategori() {
        //me-load filter sesuai dengan kategori untuk halaman user
        if ($this->session->userdata('id_role') == "1"){
            $data = konfigurasi('Dashboard');

            $this->template->load('layouts/template-admin', 'admin/dashboardkat-admin', $data);
        } else {
            $data = konfigurasi('Dashboard');
    
            $this->template->load('layouts/template', 'member/dashboardkat', $data);

        }
    }

    public function hasil_pencarianGuest() {
        //mencari sesuai dengan keyword untuk halaman pengunjung
        $data = guest('Hasil Pencaharian');
        $this->form_validation->set_rules('keyword', 'Keyword', 'trim|required|min_length[2]');
        //menjalankan validasi sesuai dengan rules
        if ($this->form_validation->run() == true) {
            $this->template->load('layouts/template-guest', 'member/dashboard-guestcari', $data);
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect(base_url());
        }
    }

    public function hasil_pencarian() {
        //mencari sesuai dengan keyword untuk halaman user
        if ($this->session->userdata('id_role') == "1"){
            $data = konfigurasi('Hasil Pencaharian');

            $this->form_validation->set_rules('keyword', 'Keyword', 'trim|required|min_length[2]');
            //menjalankan validasi sesuai dengan rules
            if ($this->form_validation->run() == true) {
                $this->template->load('layouts/template-admin', 'admin/dashboardcari-admin', $data);
            } else {
                $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
                redirect('member/home');
            }
        } else {
            $data = konfigurasi('Hasil Pencaharian');
            $this->form_validation->set_rules('keyword', 'Keyword', 'trim|required|min_length[2]');
            //menjalankan validasi sesuai dengan rules
            if ($this->form_validation->run() == true) {
                $this->template->load('layouts/template', 'member/dashboardcari', $data);
            } else {
                $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
                redirect('member/home');
            }
        }

    }


    public function detailedsong(){
        // Fungsi ini digunakan untuk membuka halaman detail, 
        // namun dibedakan untuk user yang sedang login dan tidak 
        // login, karena data yang diambil dari helper akan berbeda
        if ($this->session->userdata('is_login')){
            // Pengambilan data untuk user yang sudah login
            $data = konfigurasi('Detail Lagu');

            $this->template->load('layouts/template-detail', 'member/dashboard-detail2', $data);

        } else {
            // Pengambilan data untuk user yang belum login
            $data = guest('Detail Lagu');

            $this->template->load('layouts/template-guest', 'member/dashboard-detail', $data);
        }
    }

    public function tambahcount(){
        $idget = $this->input->post('idlagu');
        $this->load->model('Lagu_model');

        $this->Lagu_model->count($idget);
        echo json_encode(['status' => 'success']);
    }
    

    public function updateProfile()
    {
        // Fungsi ini digunakan untuk proses update profile pada akun user, 
        // dengan me-load model Auth_model, mengset beberapa rules validasi, 
        // jika validasinya benar, maka data akan dikumpulkan dan dikirimkan ke Auth_model fungsi update()
        $this->load->model('Auth_model'); 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]|max_length[50]');
        //menjalankan validasi sesuai dengan rules
        if ($this->form_validation->run() == true) {
            //jika benar akan diambil datanya
            $id = $this->session->userdata('id');
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

            //mengupload foto
            if (!empty($_FILES['photo']['name'])) {
                $upload = $this->_do_upload(); //me-load function upload gambar

                //delete file
                $user = $this->Auth_model->get_by_id($this->session->userdata('id'));
                if ($user->photo != 'default.jpeg' && file_exists('assets/uploads/images/foto_profil/'.$user->photo) && $user->photo) {
                    unlink('assets/uploads/images/foto_profil/'.$user->photo);
                }

                $data['photo'] = $upload;
            }
            $result = $this->Auth_model->update($data, $id);
            //memunculkan pesan setelah proses upload data profil
            if ($result > 0) {
                $this->updateProfil();
                $this->session->set_flashdata('msg', show_succ_msg('Data Profil Berhasil diubah'));
                redirect('auth/profile');
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }
    

    public function updatePassword()
    {
        //mengubah password user di halaman profil
        $this->load->model('Auth_model');
        $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');

        $id = $this->session->userdata('id');
        if ($this->form_validation->run() == true) {
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                    $this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
                    redirect('auth/profile');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Auth_model->update($data, $id);
                    if ($result > 0) {
                        $this->updateProfil();
                        $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
                        redirect('auth/profile');
                    } else {
                        $this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
                        redirect('auth/profile');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Password Salah'));
                redirect('auth/passwordchange/');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/passwordchange/');
        }
    }

    private function _do_upload()
    {
        //fungsi private upload foto profil
        $config['upload_path']          = 'assets/uploads/images/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }


    public function uploadpost1()
    {
        // Fungsi ini digunakan untuk mengupload data lagu, 
        // dengan mengset beberapa rules validasi, tambahkan if else 
        // untuk menetapkan rulesnya, dan jika berhasil akan dikirim datanya ke database
        $this->load->model('Lagu_model');
        $this->load->model('Person_model');
        $this->form_validation->set_rules('l_judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('l_artist', 'Nama Artist', 'trim|required');
        $this->form_validation->set_rules('l_album', 'Nama Album', 'trim|required');
        $this->form_validation->set_rules('l_tahun', 'Tahun Rilis', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // Untuk if else yang digunakan, pertama set terlebih dahulu 
            // variabel datanya menjadi null, setelah itu masukkan if else 
            // bagian upload file foto album, file mp3, file flac, dan file 
            // archive. Setelah itu data dikumpulkan dan dikirimkan ke Lagu_model fungsi simpanData().
            $thumb_data = null;
            $mp3_data = null;
            $flac_data = null;
            $arch_data = null;

            // Mengupload gambar
            if (!empty($_FILES['photo']['name'])) {
                $config = array(); //karena lebih dari satu data, diberi tanda array dahulu
                $config['upload_path']          = 'assets/uploads/images/thumbnail/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000; //set max size allowed in Kilobyte
                $config['max_width']            = 10000; // set max width image allowed
                $config['max_height']           = 10000; // set max height allowed
                $config['file_name']            = round(microtime(true) * 1000);
                $this->load->library('upload', $config, 'photo'); //buat custom objek berupa 'photo'
                $this->photo->initialize($config); //inisialisasi objek
                if ($this->photo->do_upload('photo')) {
                    $thumb_data = $this->photo->data('file_name'); //jika berhasil mengembalikan nama filenya
                } else {
                    $thumb_data = '#';
                }

            } else {
                
                $thumb_data = '#';
            }
            
            // Mengupload file mp3
            if(!empty($_FILES['mp3']['name'])){
                $config = array();
                $config['upload_path']          = 'assets/uploads/audio/mp3/';
                $config['allowed_types']        = 'mp3|aac|m4a|zip|rar|7z';
                $config['max_size']             = 150000; //set maksimal ukuran file
                $config['file_name']            = round(microtime(true) * 1000); //set nama otomatis
                $this->load->library('upload', $config, 'mp3m'); //buat custom objek berupa 'mp3m'
                $this->mp3m->initialize($config);//inisialisasi objek

                if ($this->mp3m->do_upload('mp3')) {
                    $mp3_data = $this->mp3m->data('file_name');
                } else {
                    $mp3_data = '#';
                    
                }

            } else {
                $mp3_data = '#';
            }
            
            // Mengupload file flac
            if(!empty($_FILES['flac']['name'])) {
                $config = array();
                $config['upload_path'] = 'assets/uploads/audio/flac/';
                $config['allowed_types']        = 'flac';
                $config['max_size']             = 200000; //set max size allowed in Kilobyte
                $config['file_name']            = round(microtime(true) * 1000);
                $this->load->library('upload', $config, 'flacm'); //buat custom objek
                $this->flacm->initialize($config);//inisialisasi objek

                if ($this->flacm->do_upload('flac')) {
                    $flac_data = $this->flacm->data('file_name');
                } else {
                    $flac_data = '#';
                    
                }

            } else {
                $flac_data = '#';
            }

            // Mengupload file archive
            if(!empty($_FILES['arch']['name'])) {
                $config = array();
                $config['upload_path'] = 'assets/uploads/audio/arch/';
                $config['allowed_types']        = 'rar|zip|7z|tgz';
                $config['max_size']             = 5000000; //set max size allowed in Kilobyte
                $config['file_name']            = round(microtime(true) * 1000);
                $this->load->library('upload', $config, 'archm'); //buat custom objek
                $this->archm->initialize($config);//inisialisasi objek

                if ($this->archm->do_upload('arch')) {
                    $arch_data = $this->archm->data('file_name');
                } else {
                    $arch_data = '#';
                    
                }

            } else {
                $arch_data = '#';
            }

            // Jika semua file berhasil diunggah, simpan data ke database
                $l_uploadwho = $this->input->post('l_uploadwho');
                $l_judul = $this->input->post('l_judul');
                $l_artist = $this->input->post('l_artist');
                $l_album = $this->input->post('l_album');
                $l_tahun = $this->input->post('l_tahun');
                $l_deskripsi = $this->input->post('l_deskripsi');
                $l_kategori = $this->input->post('l_kategori1');
                $date = date('Y-m-d H:i:s');
                $idget = $this->session->userdata('id');

                $data = array(
                    'judul_lagu' => $l_judul,
                    'artist' => $l_artist,
                    'album' => $l_album,
                    'tahun_rilis' => $l_tahun,
                    'tanggal_up' => $date,
                    'upload_by' => $l_uploadwho,
                    'link_mp3' => $mp3_data,
                    'link_flac' => $flac_data,
                    'link_archive' => $arch_data,
                    'deskripsi' => $l_deskripsi,
                    'footage' => $thumb_data,
                    'id_kategori' => $l_kategori,
                    'photo' => $thumb_data
                );


                $this->Lagu_model->simpanData($data, 'lagu');
                $this->Person_model->countuser($idget);
                echo json_encode(['status' => 'success']);
                redirect(base_url());
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/tambahpost');
        }
    }


    public function register()
    {
        // Fungsi ini untuk memanggil halaman registrasi
        $data = konfigurasi('Register');
        $this->template->load('authentication/layouts/template', 'authentication/register', $data);
    }

    public function check_register()
    {
        // Fungsi ini untuk menjalankan proses registrasi, 
        // dengan memanggil helper untuk memanggil modelnya, 
        // meng-set validasi form, dan menaruh logika if else.

        $data = konfigurasi('Register');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]');
        // Untuk logikanya, jika validasinya terdapat kesalahan akan dikembalikan ke halaman registrasi,
        // jika lainnya data untuk registrasi akan dikirimkan ke Auth_model dengan fungsi reg()
        // dan mengembalikan pesan sukses, lalu mengarahkan ke halaman login
        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $this->Auth_model->reg();
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box rounded-4" style="background-color: #BFE3DF;">
              <div class="info-box-icon rounded-4">
              <i class="fa fa-check-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">SUKSES</b><br>Pendaftaran berhasil, silakan login.</div>
              </div>
              </p>
            ');
            redirect('auth/login', 'refresh', $data);
        }
    }

    public function check_account()
    {
        // Untuk fungsi check_account berisikan pengambilan 
        // email dan password, kemudian dikirimkan ke model 
        // check_account() untuk diperiksa akunnya. Menunggu 
        // balasan dari model check_account() jika terdapat error
        // Jika email dan password benar, akan membuat userdata

        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($email, $password);
        // Berisikan pesan error, sesuai balasan berupa angka dari model check_account()
        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box rounded-4" style="background-color: #BFE3DF;">
        			<div class="info-box-icon rounded-4">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Email yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert','<p class="box-msg">
              <div class="info-box rounded-4" style="background-color: #BFE3DF;">
              <div class="info-box-icon rounded-4">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.</div>
              </div>
              </p>'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box rounded-4" style="background-color: #BFE3DF;">
        			<div class="info-box-icon rounded-4">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
                'id'            => $query->id,
                'nama'          => $query->nama,
                'username'      => $query->username,
                'email'         => $query->email,
                'password'      => $query->password,
                'negara'        => $query->negara,
                'kota'          => $query->kota,
                'tanggal_lahir' => $query->tanggal_lahir,
                'id_role'       => $query->id_role,
                'is_login'      => true,
                'created_at'    => $query->created_at,
                'updated_at'    => $query->updated_at,
                'profile'       => $query->profile,
                'last_login'    => $query->last_login,
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }

    public function login()
    {
        // Fungsi ini digunakan untuk halaman login, dan akan memanggil halaman login
        $data = konfigurasi('Login');
        // jika sebelumnya user sudah login, akan di pindahkan langsung ke halaman utama yang sesuai id_rolenya
        if ($this->session->userdata('id_role') == "1") {
            redirect('admin/home');
        }
        if ($this->session->userdata('id_role') == "2") {
            redirect('member/home');
        }

        // bagian logika untuk proses loginnya, dengan menetapkan validasi form untuk mengecek apakah sesuai 
        // dengan kriteria atau tidak. Memanggil fungsi check_account() dan model check_account() untuk memeriksa 
        // akunnya ada di database atau tidak

        if ($this->input->post('submit')) {
            // kriteria validasi form
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            // fungsi check_account()
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                // model check_account()
                $data = $this->Auth_model->check_account($this->input->post('email'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    redirect('admin/home');
                } elseif ($data->id_role == '2') {
                    redirect('member/home');
                }
            } else {
                $this->template->load('authentication/layouts/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layouts/template', 'authentication/login', $data);
        }
    }

    public function logout()
    {
        //fungsi logout akun
        $this->load->model('Auth_model');
        date_default_timezone_set('ASIA/JAKARTA');
        $date = array('last_login' => date('Y-m-d H:i:s'));
        $id = $this->session->userdata('id');
		$this->Auth_model->logout($date, $id);
		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
			if ($key!='__ci_last_regenerate' && $key != '__ci_vars')
			$this->session->unset_userdata($key);
		}
        $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-success">
              <div class="info-box-icon">
              <i class="fa fa-check-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">SUKSES</b><br>Log Out Berhasil</div>
              </div>
              </p>
			');
        redirect('auth/guest');
    }
}
