<?php

function konfigurasi($title, $c_des=null)
{
    // Fungsi ini digunakan untuk mengambilan semua data yang diperlukan untuk user yang login

    // Memanggil model yang diperlukan
    $CI = get_instance();
    $CI->load->model('Konfigurasi_model');
    $CI->load->model('Auth_model');
    $CI->load->model('Lagu_model');
    $CI->load->model('Person_model');
    $CI->load->model('Admin_model');

    // Memanggil fungsi model yang diperlukan untuk mengambil data
    $pengguna = $CI->Person_model->getUserLimit();
    $lagulimit = $CI->Lagu_model->getLaguLimit();
    $semuapengguna = $CI->Person_model->get_all();
    $auth = $CI->Auth_model->get_by_id('id');
    $site = $CI->Konfigurasi_model->listing();
    $lagulist = $CI->Lagu_model->getAllLagu();
    $lagusecond = $CI->Lagu_model->getSecondLaguData();

    // Mengambil data lagu dari nomor 2, untuk logikanya jika lagulist 
    // lebih dari 1, maka akan menghapus data pertama dan menyusun kembali datanya
    if ($lagusecond->num_rows() > 1) {
        $results = $lagusecond->result_array();
        unset($results[0]); 
        $datalagu = array_values($results); 
    }

    // Pada baris ini dibuat untuk membuat variabel dan menetapkan
    // valuenya terlebih dahulu. Kemudian, jika terdapat input dari
    // webnya, akan mengubah valuenya sesuai dengan input yang diambil
    $l_id = '1';
    if ($CI->input->post('l_id')) {
        $l_id = $CI->input->post('l_id');
    }
    $id_user = '1';
    if ($CI->input->post('iduser')) {
        $id_user = $CI->input->post('iduser');
    }
    $keyworduser = ' ';
    if ($CI->input->post('keyworduser')){
        $keyworduser = $CI->input->post('keyworduser');
    }
    $keyword = ' ';
    if ($CI->input->post('keyword')){
        $keyword = $CI->input->post('keyword');
    }
    $category = '1';
    if ($CI->input->post('category')){
        $category = $CI->input->post('category');
    }
    $role = '1';
    if ($CI->input->post('id_role')){
        $role = $CI->input->post('id_role');
    }

    
    $allkat = $CI->Lagu_model->getAllKat();
    $allkat1 = $CI->Lagu_model->getAllKat1();
    $personal = $CI->Person_model->get_by_id($id_user);
    $getlagu = $CI->Lagu_model->getSongById($l_id);
    $urutkategori = $CI->Lagu_model->get_data_by_category($category);
    $caridata = $CI->Lagu_model->cari_data($keyword);
    $cariuser = $CI->Person_model->cari_datauser($keyworduser);
    $getket = $CI->Lagu_model->getnamakat($category);
    $ketkategori = $getket->nama_kategori;

    $laguuserid = $CI->session->userdata('id');
    $getplaylist = $CI->Lagu_model->getdatabyuser($laguuserid);

    $getdataurutbig = $CI->Lagu_model->getdatadownloaded();
    $getdataurutbigall = $CI->Lagu_model->getdatadownloadedall();

    $getdataupload = $CI->Person_model->getdataupload();
    $getdatauploadall = $CI->Person_model->getdatauploadall();
    $allrole = $CI->Admin_model->getAllRole();
    $getrole = $CI->Admin_model->getidrole($role);
    
    // Menyatukan semua data menjadi satu, variabel bagian yang kiri
    // akan terbaca di bagian view dan bagian kanan untuk bagian modelnya
    $data = array(
        'title' => $title.' | '.$site['nama_website'],
        'logo' => $site['logo'],
        'favicon' => $site['favicon'],
        'email' => $site['email'],
        'no_telp' => $site['no_telp'],
        'alamat' => $site['alamat'],
        'facebook' => $site['facebook'],
        'instagram' => $site['instagram'],
        'keywords' => $site['keywords'],
        'metatext' => $site['metatext'],
        'about' => $site['about'],
        'site' => $site,
        'c_judul' => $title,
        'c_des' => $c_des,
        'userdata' => $auth,
        'listlagu' => $lagulist,
        'listsecond' => $datalagu,
        'daftarpengguna' => $pengguna,
        'daftarsemuapengguna' => $semuapengguna,
        'listlagulimit' => $lagulimit,
        

        'l_getlagu' => $getlagu,
        'l_id' => $getlagu->id_lagu,
        'l_judul' => $getlagu->judul_lagu,
        'l_artist' => $getlagu->artist,
        'l_album' => $getlagu->album,
        'l_tahun' => $getlagu->tahun_rilis,
        'l_tanggalupload' => $getlagu->tanggal_up,
        'l_uploadwho' => $getlagu->upload_by,
        'l_linkflac' => $getlagu->link_flac,
        'l_linkmp3' => $getlagu->link_mp3,
        'l_linkarch' => $getlagu->link_archive,
        'l_deskripsi' => $getlagu->deskripsi,
        'l_thumb' => $getlagu->photo,
        'l_footage' => $getlagu->footage,

        'getplaylist' => $getplaylist,
        'getdownloaded' => $getdataurutbig,
        'getdownloadedall' => $getdataurutbigall,

        'personal' => $personal,

        'getrole' => $getrole,
        'allrole' => $allrole,

        'cari_user' => $cariuser,
        'datauserupload' => $getdataupload,
        'datauseruploadall' => $getdatauploadall,

        'u_get' => $personal->id,
        'l_kategori' => $allkat,
        'l_kategori1' => $allkat1,
        'hasil_pencarian' => $caridata,
        'hasil_kategori' => $urutkategori,
        'pesan' => "Hasil pencarian untuk kata kunci; '$keyword'",
        'ketkategori' => "Hasil filter Kategori : '$ketkategori'"


    );

    return $data;
}

    function guest($title, $c_des=null){
        $CI = get_instance();
        $CI->load->model('Lagu_model'); // Memanggil Lagu_Model

        // Mengambil data lagu dari nomor 2, untuk logikanya jika 
        // lagulist lebih dari 1, maka akan menghapus data pertama 
        // dan menyusun kembali datanya
        $lagulist = $CI->Lagu_model->getSecondLaguData();
        
        if ($lagulist->num_rows() > 1) {
            $results = $lagulist->result_array();
            unset($results[0]); 
            $datalagu = array_values($results); 
        }

        // Pada baris ini dibuat untuk membuat variabel dan menetapkan 
        // valuenya terlebih dahulu. Kemudian, jika terdapat input dari 
        // webnya, akan mengubah valuenya sesuai dengan input yang diambil 
        
        $l_id = '1';
        if ($CI->input->post('l_id')) {
            $l_id = $CI->input->post('l_id');
        }
        $keyword = ' ';
        if ($CI->input->post('keyword')){
            $keyword = $CI->input->post('keyword');
        }
        $category = '1';
        if ($CI->input->post('category')){
            $category = $CI->input->post('category');
        }
        
        $allkat = $CI->Lagu_model->getAllKat();
        $urutkategori = $CI->Lagu_model->get_data_by_category($category);
        $caridata = $CI->Lagu_model->cari_data($keyword);
        $getket = $CI->Lagu_model->getnamakat($category);
        $ketkategori = $getket->nama_kategori;
        $getlagu = $CI->Lagu_model->getSongById($l_id);

        // Menyatukan semua data menjadi satu, variabel bagian yang kiri 
        // akan terbaca di bagian view dan bagian kanan untuk bagian modelnya
        $data = array(
            'listlagu' => $datalagu,
            'user' => "Pengunjung",
            'title' => "F-share Media",  

            'l_id' => $getlagu->id_lagu,
            'l_judul' => $getlagu->judul_lagu,
            'l_artist' => $getlagu->artist,
            'l_album' => $getlagu->album,
            'l_tahun' => $getlagu->tahun_rilis,
            'l_tanggalupload' => $getlagu->tanggal_up,
            'l_uploadwho' => $getlagu->upload_by,
            'l_linkflac' => $getlagu->link_flac,
            'l_linkmp3' => $getlagu->link_mp3,
            'l_linkarch' => $getlagu->link_archive,
            'l_deskripsi' => $getlagu->deskripsi,
            'l_thumb' => $getlagu->photo,

            'l_kategori' => $allkat,
            'hasil_pencarian' => $caridata,
            'hasil_kategori' => $urutkategori,
            'katakey' => $keyword,
            'pesan' => "Hasil pencarian untuk kata kunci : '$keyword'",
            'ketkategori' => "Hasil filter Kategori : '$ketkategori'"
            );
            return $data; 

    }

// Pada baris ini merupakan fungsi untuk memunculkan pesan, seperti pesan berhasil, pesan gagal, atau pesan peringatan
function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px')
{
    if ($content != '') {
        return  '<p class="box-msg" style="background-color: #BFE3DF;">
          <div class="info-box alert-' .$type .' rounded-4">
          <div class="info-box-icon rounded-4">
          <i class="fa ' .$icon .'"></i>
          </div>
          <div class="info-box-content" style="font-size:' .$size .'">
          ' .$content
          .'</div>
          </div>
          </p>';
    }
}

function show_succ_msg($content='', $size='14px')
{
    if ($content != '') {
        return   '<p class="box-msg">
          <div class="info-box rounded-4" style="background-color: #BFE3DF;">
          <div class="info-box-icon rounded-4">
          <i class="fa fa-check-circle"></i>
          </div>
          <div class="info-box-content" style="font-size:' .$size .'">
          <b style="font-size: 20px">SUKSES</b><br> ' .$content
          .'</div>
          </div>
          </p>';
    }
}

function show_err_msg($content='', $size='14px')
{
    if ($content != '') {
        return   '<p class="box-msg">
          <div class="info-box rounded-4" style="background-color: #BFE3DF;">
          <div class="info-box-icon rounded-4">
          <i class="fa fa-warning"></i>
          </div>
          <div class="info-box-content" style="font-size:' .$size .'">
          ' .$content
          .'</div>
          </div>
          </p>';
    }
}

function show_err_form_msg($content='', $size='14px')
{
    if ($content != '') {
        return   '<div class="box-body" style="text-align:center">
          <div class="alert alert-dismissible rounded-4" style="background-color: #BFE3DF;">'
          .$content.
          '</div>
          </div>';
    }
}

function alert($class, $title, $description)
{
    return '<div class="alert '.$class.' alert-dismissible rounded-4" style="background-color: #BFE3DF;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
      '.$description.'
      </div>';
}

// Fungsi ini digunakan untuk menetapkan tanggalan untuk 
// mensetting data user pada bagian terakhir kali login, 
// akun itu dibuat pada tanggal, dan akun itu diperbaharui kapan
function tanggal()
{
    date_default_timezone_set('Asia/Jakarta');
    return date('Y-m-d');
}

function tanggal_indo()
{
    date_default_timezone_set('Asia/Jakarta');
    return date('d-m-Y H:i:s');
}

function tanggal_new()
{
    date_default_timezone_set('Asia/Jakarta');
    /* script menentukan hari */
    $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
    $hr = $array_hr[date('N')];
    /* script menentukan tanggal */
    $tgl= date('j');
    /* script menentukan bulan */
    $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
    $bln = $array_bln[date('n')];
    /* script menentukan tahun */
    $thn = date('Y');
    /* script perintah keluaran*/
    return $hr . ", " . $tgl . " " . $bln . " " . $thn . " " . date('H:i');
}

function rupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return $rupiah;
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    $time = substr($tgl, 11, 5);
    return $tanggal . ' ' . bulan($bulan) . ' ' . $tahun;
}

function tgl_lengkap($tanggals)
{
    $tanggal = substr($tanggals, 8, 2);
    $bulan = substr($tanggals, 5, 2);
    $tahun = substr($tanggals, 0, 4);
    $time = substr($tanggals, 11, 5);
    return $tanggal . ' ' . bulan($bulan) . ' ' . $tahun . ' ' . $time;
}

function bulan($bln)
{
    switch ($bln) {
      case 1:
      return "Jan";
      break;
      case 2:
      return "Feb";
      break;
      case 3:
      return "Mar";
      break;
      case 4:
      return "Apr";
      break;
      case 5:
      return "Mei";
      break;
      case 6:
      return "Jun";
      break;
      case 7:
      return "Jul";
      break;
      case 8:
      return "Agt";
      break;
      case 9:
      return "Sep";
      break;
      case 10:
      return "Okt";
      break;
      case 11:
      return "Nov";
      break;
      case 12:
      return "Des";
      break;
    }
}

function nama_hari($tanggal)
{
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = $pecah[1];
    $thn = $pecah[0];
    $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
    $nama_hari = "";
    if ($nama == "Sunday") {
        $nama_hari = "Minggu";
    } elseif ($nama == "Monday") {
        $nama_hari = "Senin";
    } elseif ($nama == "Tuesday") {
        $nama_hari = "Selasa";
    } elseif ($nama == "Wednesday") {
        $nama_hari = "Rabu";
    } elseif ($nama == "Thursday") {
        $nama_hari = "Kamis";
    } elseif ($nama == "Friday") {
        $nama_hari = "Jumat";
    } elseif ($nama == "Saturday") {
        $nama_hari = "Sabtu";
    }
    return $nama_hari;
}

function xTimeAgo($oldTime, $newTime, $timeType)
{
    $timeCalc = strtotime($newTime) - strtotime($oldTime);
    if ($timeType == "x") {
        if ($timeCalc = 60) {
            $timeType = "m";
        }
        if ($timeCalc = (60*60)) {
            $timeType = "h";
        }
        if ($timeCalc = (60*60*24)) {
            $timeType = "d";
        }
    }
    if ($timeType == "s") {
        $timeCalc .= " seconds ago";
    }
    if ($timeType == "m") {
        $timeCalc = round($timeCalc/60) . " menit yang lalu";
    }
    if ($timeType == "h") {
        $timeCalc = round($timeCalc/60/60) . " jam yang lalu";
    }
    if ($timeType == "d") {
        $timeCalc = round($timeCalc/60/60/24) . " hari yang lalu";
    }

    return $timeCalc;
}

function timeAgo2($timestamp)
{
    date_default_timezone_set('Asia/Jakarta');
    $skrg=date("Y-m-d H:i:s");
    $isi= str_replace("-", "", xTimeAgo($skrg, $timestamp, "m"));
    $isi2= str_replace("-", "", xTimeAgo($skrg, $timestamp, "h"));
    $isi3= str_replace("-", "", xTimeAgo($skrg, $timestamp, "d"));
    $go="";
    if ($isi > 60) {
        $go=$isi2;
    } elseif ($isi2 > 24) {
        $go=$isi3;
    } elseif ($isi < 61) {
        $go=$isi;
    }
    return $go;
}
