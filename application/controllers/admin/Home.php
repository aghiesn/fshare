<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
        $this->load->library('cors');
        $this->cors->handle();
    }

    public function index() //Mengakses Halaman Utama Admin
    {
        $data = konfigurasi('Halaman Admin Utama');
        $this->template->load('layouts/template-admin', 'admin/dashboard-lagu', $data);
    }

    public function datahome(){
        // Memanggil halaman kelola data pada akun admin
        $data = konfigurasi('Halaman Pengelola Data');
        $this->template->load('layouts/template-admin', 'admin/dashboard', $data);
    }

    public function allaccount(){
        // Fungsi ini untuk memunculkan halaman semua data akun
        $data = konfigurasi('Semua Pengguna'); 
        $this->template->load('layouts/template-admin', 'admin/dashboard-daftarakun', $data);
    }

    public function hasil_pencarian_user() {
        // Fungsi ini digunakan untuk mencari user sesuai dengan keyword yang dimasukkan
        $data = konfigurasi('Hasil Pencaharian User');

        $this->form_validation->set_rules('keyworduser', 'Keyword User', 'trim|required|min_length[2]');
        //menjalankan validasi sesuai dengan rules
        if ($this->form_validation->run() == true) {
            $this->template->load('layouts/template-admin', 'admin/dashboard-cariuser-admin', $data);
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('admin/home/allaccount');
        }
    }

    public function hasil_pencarian_lagu() {
        // Fungsi ini untuk mencari data lagu yang akan di kelola berdasarkan keyword yang dimasukkan
        $data = konfigurasi('Hasil Pencaharian Lagu');

        $this->form_validation->set_rules('keyword', 'Keyword Lagu', 'trim|required|min_length[2]');
        //menjalankan validasi sesuai dengan rules
        if ($this->form_validation->run() == true) {
            $this->template->load('layouts/template-admin', 'admin/dashboard-carilagu-admin', $data);
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('admin/home/allsongs');
        }
    }

    public function delaccount(){
        // Fungsi ini digunakan untuk menghapus sebuah akun berdasarkan id usernya
        $this->load->model('Person_model'); //me-load model
        $iddelete = $this->input->post('iduserdel'); //mengambil id user

        $this->Person_model->delete($iddelete); //menghapus user
        $this->session->set_flashdata('msg', show_succ_msg('Data Berhasil Dihapus'));
        redirect('admin/home/allaccount'); //kembali ke menu sebelumnya
    }

    public function delsong(){
        // Fungsi ini digunakan untuk menghapus data lagu dari bagian 
        // admin dan menghapus file yang ada juga pada directory
        $this->load->model('Lagu_model'); //me-load model
        $iddelete = $this->input->post('idlagudel'); //mengambil id lagu
        $dapat_data = $this->Lagu_model->getSongById($iddelete);
        unlink('assets/uploads/audio/mp3/'.$dapat_data->link_mp3);
        unlink('assets/uploads/audio/flac/'.$dapat_data->link_flac);
        unlink('assets/uploads/audio/arch/'.$dapat_data->link_archive);
        unlink('assets/uploads/images/thumbnail/'.$dapat_data->photo);
        unlink('assets/uploads/audio/arch/'.$dapat_data->footage);

        $this->Lagu_model->delete($iddelete); //menghapus lagu
        $this->session->set_flashdata('msg', show_succ_msg('Data Berhasil Dihapus'));
        redirect('admin/home/allsongs'); //kembali ke menu sebelumnya
    }

    public function detailedsong(){ 
        // Fungsi ini digunakan untuk detail lagu seperti user, namun digunakan untuk akun admin, karena file templatenya berbeda
        $this->load->helper('url');
        $this->load->model('Lagu_model');
        
        
        $idlagu = $this->input->post('l_id'); //mengambil id
        $getlagu = $this->Lagu_model->getSongById($idlagu);//mengambil data sesuai id lagu
        $data = konfigurasi('Detail Lagu');

        $this->template->load('layouts/template-detail-admin', 'admin/dashboard-detail-admin', $data);

    }

    public function tambahpost(){
        // Memanggil halaman untuk menambah postingan bagian akun admin
        $data = konfigurasi('Profile', 'Kelola Profile');
        $this->template->load('layouts/template-admin', 'member/tambahpostingan', $data);
    }

    public function editprofile(){
        // Fungsi ini digunakan untuk memunculkan halaman dan data ubah profil sebuah user pada akun admin
        $this->load->helper('url');
        $this->load->model('Person_model');
        $this->load->model('Admin_model');

        $data   = konfigurasi('Edit Profile Admin');
        $id_user = $this->input->post('iduser');

        $personal = $this->Person_model->get_by_id($id_user);
        $this->template->load('layouts/template-admin', 'admin/profile-admin', $data);
    }

    public function editpassworduser(){
        // Fungsi ini digunakan untuk membuka halaman edit 
        // password bagian admin, dengan mengambil id user 
        // kemudian diambil datanya sesuai id user
        $this->load->helper('url');
        $this->load->model('Person_model');

        $id_user = $this->input->post('iduser');
        $personal = $this->Person_model->get_by_id($id_user);
        $data = konfigurasi('Manajemen Password User');

        $this->template->load('layouts/template-admin', 'admin/ubahpassword', $data);
    }

    public function updatepassworduser()
    {
        // Fungsi ini digunakan untuk mengirimkan password yang akan diubah ke database, 
        // dengan memeriksa akun yang digunakan dahulu, kemudian diset rules validasi. 
        // Jika lulus, passwordnya akan diubah ke hash terlebih dahulu kemudian dikirmkan 
        // ke Auth_model fungsi updatePassword
        $this->load->model('Admin_model');
        // Pastikan hanya admin yang dapat mengakses fungsi ini
        if ($this->session->userdata('id_role') != '1') {
            $iduser = $this->input->post('iduser');
            $this->session->set_flashdata('msg', show_err_msg('Tolong gunakan akun admin'));
            $this->editpassworduser($iduser); // Redirect ke halaman login jika bukan admin
        } else {
            // Meng-set validasi form input
            $this->form_validation->set_rules('current_password', 'Current Password', 'required');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
            $iduser = $this->input->post('iduser');
            $personal = $this->Admin_model->get_by_id($iduser);
    
            if ($this->form_validation->run() === FALSE) {
                // Jika validasi gagal, tampilkan kembali halaman form ganti password
                $id_user = $iduser;
                $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
                $this->editpassworduser($id_user);
            } else {
                // Ambil data pengguna yang sedang login
                $user = $this->Admin_model->getUserPassById($iduser);
    
                // Periksa apakah password saat ini cocok dengan yang dimasukkan pengguna
                $currentPassword = $this->input->post('current_password');
                if (!password_verify($currentPassword, $user['password'])) {
                    // Jika password saat ini tidak cocok, tampilkan pesan kesalahan
                    $id_user = $iduser;
                    $this->session->set_flashdata('msg', show_err_msg('Password Lama Tidak Cocok'));
                    $this->editpassworduser($id_user);
                } else{
                    // Jika password saat ini cocok, hash password baru
                    $newPassword = $this->input->post('new_password');
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
                    // Update password baru ke dalam database
                    $this->Admin_model->updatePassword($user['id'], $hashedPassword);
        
                    // Tampilkan pesan sukses
                    $id_user = $iduser;
                    $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
                    $this->editpassworduser($id_user);
                }
    
            }

        }
    }


    public function updateProfile()
    {
        // Fungsi ini untuk mengupdate data user, dengan mengset rules validasinya dahulu, 
        // kemudian data akan dikumpulkan dan di kirim ke Auth_model fungsi update(). 

        // Untuk logika upload fotonya, jika file yang dimasukkan tidak kosong, maka jalankan 
        // fungsi upload. Kemudian hapus filenya sesuai id user, jika file fotonya bukan bernama 
        // default.jpeg dan fotonya sudah ada yang lama, maka hapus file yang lama, dan masukkan 
        // data nama file yang baru

        $this->load->model('Auth_model'); //me-load model
        //mengset rulesnya terlebih dahulu
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]|max_length[50]');
        //menjalankan validasi sesuai dengan rules
        $id = $this->input->post('iduser');
        if ($this->form_validation->run() == true) {
            //jika benar akan diambil datanya
            $id = $this->input->post('iduser');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $negara = $this->input->post('negara');
            $kota = $this->input->post('kota');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $id_role = $this->input->post('id_role');


            $data = array(
                'nama' => $nama,
                'username' => $username,
                'id_role' => $id_role,
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
                $id_user = $id;
                $this->session->set_flashdata('msg', show_succ_msg('Data Profil Berhasil diubah'));
                $this->editprofile($id_user);
            } else {
                $id_user = $id;
                $this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
                $this->editprofile($id_user);
            }
        } else {
            $id_user = $id;
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            $this->editprofile($id_user);
        }
    }

    public function updatepost(){
        // Fungsi ini digunakan untuk memperbaharui data lagu yang ada. 
        // Dengan mengambil data lagu sesuai idnya, kemudian diset rules validasinya,
        // jika ada file yang akan diperbaharui, akan menggunakan data baru.
        // dan jika tidak ada yang berubah, akan menggunakan data lama
        // Data-data itu akan dikumpulkan dan kirim ke Lagu_model dengan fungsi updateData()
        
        $this->load->model('Lagu_model');
        $idlagu = $this->input->post('l_id');
        $dapat_data = $this->Lagu_model->getSongById($idlagu);
        $this->form_validation->set_rules('l_judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('l_artist', 'Nama Artist', 'trim|required');
        $this->form_validation->set_rules('l_album', 'Nama Album', 'trim|required');
        $this->form_validation->set_rules('l_tahun', 'Tahun Rilis', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
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
                    unlink('assets/uploads/images/thumbnail/'.$dapat_data->photo);
                    $thumb_data = $this->photo->data('file_name'); //jika berhasil mengembalikan nama filenya
                } else {
                    $thumb_data = $dapat_data->photo;
                }
            } else {
                //kalau tidak ada akan dimasukkan data sebelumnya
                $thumb_data = $dapat_data->photo;
            }

            if(!empty($_FILES['mp3']['name'])){
                $config = array();
                $config['upload_path']          = 'assets/uploads/audio/mp3/';
                $config['allowed_types']        = 'mp3|aac|m4a|zip|rar|7z';
                $config['max_size']             = 150000; //set maksimal ukuran file
                $config['file_name']            = round(microtime(true) * 1000); //set nama otomatis
                $this->load->library('upload', $config, 'mp3m'); //buat custom objek berupa 'mp3m'
                $this->mp3m->initialize($config);//inisialisasi objek

                if ($this->mp3m->do_upload('mp3')) {
                    unlink('assets/uploads/audio/mp3/'.$dapat_data->link_mp3);
                    $mp3_data = $this->mp3m->data('file_name');
                } else {
                    $mp3_data = $dapat_data->link_mp3;
                    
                }

            } else {
                $mp3_data = $dapat_data->link_mp3;
            }
            
            if(!empty($_FILES['flac']['name'])) {
                $config = array();
                $config['upload_path'] = 'assets/uploads/audio/flac/';
                $config['allowed_types']        = 'flac';
                $config['max_size']             = 200000; //set max size allowed in Kilobyte
                $config['file_name']            = round(microtime(true) * 1000);
                $this->load->library('upload', $config, 'flacm'); //buat custom objek
                $this->flacm->initialize($config);//inisialisasi objek

                if ($this->flacm->do_upload('flac')) {
                    unlink('assets/uploads/audio/flac/'.$dapat_data->link_flac);
                    $flac_data = $this->flacm->data('file_name');
                } else {
                    $flac_data = $dapat_data->link_flac;
                    
                }

            } else {
                $flac_data = $dapat_data->link_flac;
            }

            if(!empty($_FILES['arch']['name'])) {
                $config = array();
                $config['upload_path'] = 'assets/uploads/audio/arch/';
                $config['allowed_types']        = 'rar|zip|7z|tgz';
                $config['max_size']             = 5000000; //set max size allowed in Kilobyte
                $config['file_name']            = round(microtime(true) * 1000);
                $this->load->library('upload', $config, 'archm'); //buat custom objek
                $this->archm->initialize($config);//inisialisasi objek

                if ($this->archm->do_upload('arch')) {
                    unlink('assets/uploads/audio/arch/'.$dapat_data->link_archive);
                    $arch_data = $this->archm->data('file_name');
                } else {
                    $arch_data = $dapat_data->link_archive;
                    
                }

            } else {
                $arch_data = $dapat_data->link_archive;
            }

            if(!empty($_FILES['footage']['name'])) {
                $config = array();
                $config['upload_path'] = 'assets/uploads/audio/footage/';
                $config['allowed_types']        = 'mp4';
                $config['max_size']             = 25000; //set max size allowed in Kilobyte
                $config['file_name']            = round(microtime(true) * 1000);
                $this->load->library('upload', $config, 'footagem'); //buat custom objek
                $this->footagem->initialize($config);//inisialisasi objek

                if ($this->footagem->do_upload('footage')) {
                    unlink('assets/uploads/audio/footage/'.$dapat_data->footage);
                    $footage_data = $this->footagem->data('file_name');
                } else {
                    $footage_data = $dapat_data->footage;
                    
                }

            } else {
                $footage_data = $dapat_data->footage;
            }

            $l_uploadwho = $this->input->post('l_uploadwho');
            $l_judul = $this->input->post('l_judul');
            $l_artist = $this->input->post('l_artist');
            $l_album = $this->input->post('l_album');
            $l_tahun = $this->input->post('l_tahun');
            $l_deskripsi = $this->input->post('l_deskripsi');
            $l_kategori = $this->input->post('l_kategori1');
            $date = date('Y-m-d H:i:s');

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
                'footage' => $footage_data,
                'deskripsi' => $l_deskripsi,
                'id_kategori' => $l_kategori,
                'photo' => $thumb_data
            );


            $this->Lagu_model->updateData($idlagu, $data);
            $this->session->set_flashdata('msg', show_succ_msg('Data Berhasil Diubah'));
            redirect(base_url());
        }else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/editlagu');
        }
    }


    public function allsongs(){
        // Fungsi ini digunakan untuk memanggil halaman daftar data lagu
        $data = konfigurasi('Semua Lagu');
        $this->template->load('layouts/template-admin', 'admin/dashboard-daftarlagu', $data);
    }

    public function exportToPdf() {
        $id_user = $this->session->userdata('id');

        $data = konfigurasi('Cetak PDF');

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot."/fshare-jadi2/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('admin/cetak-stat', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("cetak-stat-$id_user.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
        
    }

    public function exportToExcel() {
        $data = konfigurasi('Statistik Top Download');
        $this->load->view('admin/cetak-statexcel', $data);
    }

    public function printdata() {
        $data = konfigurasi('Print Statistik Top Download');
        $this->load->view('admin/cetak', $data);
        
    } 

}
