<?php

class Lagu_model extends CI_Model{
    public $idlagu = 'lagu.id_lagu';


    public function getAllLagu()
    {
        // Mengambil semua data dari tabel lagu menjadi result_array()
        return $this->db->get('lagu')->result_array();
    }

    public function getSecondLaguData() {
        // Mengambil semua data dari tabel lagu
        return $this->db->get('lagu');
    }

    public function simpanData($data = null)
    {
        // Fungsi ini digunakan untuk mengirim data ke database
        $this->db->insert('lagu', $data);
    }

    public function joinKategoriLagu($where)
    {
        $this->db->select('*');
        $this->db->from('lagu');
        $this->db->join('kategori','kategori.id_kategori = lagu.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    public function get_data_by_category($category) {
        // Mengambil data sesuai kategorinya dari tabel lagu 
        // dengan menetapkan kolomnya terlebih dahulu menjadi 
        // ‘id_kategori’ dan mengambil value ‘category’nya dari helper. 
        // Gunakan ‘order_by’ untuk mengurutkan data yang diambil sesuai 
        // banyaknya download dari kolom ‘downloaded’ dan di set ‘DESC’ 
        // (descending). Dan mengembalikan datanya menjadi ‘result_array()’.
        $this->db->where('id_kategori', $category); 
        $this->db->order_by('downloaded', 'DESC'); 
        $query = $this->db->get('lagu');
        return $query->result_array();
    }

    public function cari_data($keyword) {
        // Mengambil data yang mirip dengan keyword yang dimasukkan. 
        // Gunakan sintaks ‘like’, memilih kolom ‘judul_lagu’ dan valuenya 
        // sesuai dengan keyword yang dimasukkan dari helper. Dan 
        // mengembalikan datanya menjadi ‘result_array()’
        $this->db->like('judul_lagu', $keyword); 
        $query = $this->db->get('lagu');
        return $query->result_array();
    }

    public function getAllKat()
    {
        //mengambil semua kategori dari tabel kategori
        return $this->db->get('kategori')->result_array();
    }

    public function getnamakat($category){
        //mengambil nama kategori sesuai idnya
        $this->db->where('id_kategori', $category);
        $q = $this->db->get('kategori');
        return $q->row();
    }

    public function getAllKat1()
    {
        //mengambil semua kategori dari tabel kategori
        return $this->db->get('kategori')->result();
    }

    public function getSongById($idlagu)
    {
        // mengambil data lagu berdasarkan id_lagu. Gunakan sintaks 
        // get_where dengan pilih kolom lagu, kemudian menyamakan value 
        // dari variabel idlagu sesuai value dari kolom id_lagu.
        $query = $this->db->get_where('lagu', array('id_lagu' => $idlagu));
        return $query->row();
    }

    public function delete($idlagu)
    {
        //menghapus data lagu
        $this->db->where('id_lagu', $idlagu);
        $this->db->delete('lagu');
        return $this->db->affected_rows();
    }

    public function deleteplay($laguuserid, $idlagu){
        $this->db->where('user_id', $laguuserid);
        $this->db->where('id_lagu', $idlagu);
        $this->db->delete('playlist');
        return $this->db->affected_rows();
    }

    public function getLaguLimit(){
        // Fungsi ini mengambil data lagu tetapi 
        // dibatasi menjadi 10 buah data
        $this->db->select('*');
        $this->db->from('lagu');
        $this->db->limit(10, 0);
        return $this->db->get()->result_array();
    }

    public function getDataLagu($table, $lokasi)
    {
        $this->db->where($lokasi);
        return $this->db->get($table);
    }

    public function createTemp()
    {
        $this->db->query('CREATE TABLE IF NOT EXISTS playlist(user_id int(25), title varchar(255), url_lagu varchar(255))');
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function getdatabyuser($laguuserid) {
        $query = $this->db->get_where('playlist', array('user_id' => $laguuserid));
        return $query->result_array();
    }

    public function count($idget) {
        // Tingkatkan jumlah tampilan postingan di database
        $this->db->set('downloaded', 'downloaded+1', FALSE);
        $this->db->where('id_lagu', $idget);
        $this->db->update('lagu');
    }

    public function getdatadownloaded() {
        // Mengambil data dari tabel
        $this->db->select('*');
        $this->db->from('lagu'); // Gantilah 'your_table' dengan nama tabel Anda
        $this->db->where('downloaded >', 0); // Gantilah 'your_column' dengan nama kolom yang ingin Anda gunakan
        $this->db->order_by('downloaded', 'DESC'); // Gantilah 'your_column' dengan nama kolom yang ingin Anda gunakan
        $this->db->limit(5, 0);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getdatadownloadedall() {
        // Mengambil data dari tabel
        $this->db->select('*');
        $this->db->from('lagu'); // Gantilah 'your_table' dengan nama tabel Anda
        $this->db->where('downloaded >', 0); // Gantilah 'your_column' dengan nama kolom yang ingin Anda gunakan
        $this->db->order_by('downloaded', 'DESC'); // Gantilah 'your_column' dengan nama kolom yang ingin Anda gunakan
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateData($id, $data) {
        // Fungsi ini digunakan untuk mengupdate data lagu, sesuai dengan id lagu pada tabel lagu
        $this->db->where('id_lagu', $id);
        $this->db->update('lagu', $data);
    }


}