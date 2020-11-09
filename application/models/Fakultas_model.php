<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{
    private $_table = "mahasiswa";
  
    public function getAllFakultas($id_fakultas)
    {
        $sql = "SELECT a.*, b.nama_fakultas, c.nama_prodi FROM mahasiswa as a, fakultas as b, prodi as c WHERE a.id_fakultas = b.id_fakultas AND a.id_prodi = c.id_prodi AND a.id_fakultas = $id_fakultas  ORDER BY a.id_mahasiswa DESC";
        return $this->db->query($sql)->result();
    }
    public function detail($NIM)
    {
        $sql = "SELECT a.*, b.nama_fakultas, c.nama_prodi FROM mahasiswa as a, fakultas as b, prodi as c WHERE a.id_fakultas = b.id_fakultas AND a.id_prodi = c.id_prodi AND a.NIM = $NIM ";
        return $this->db->query($sql)->row();
    }

    public function getNamaFakultas($id_fakultas){
        $sql = "SELECT nama_fakultas FROM fakultas WHERE id_fakultas = $id_fakultas ";
        return $this->db->query($sql)->row();   
    }

    public function getProdi($id_fakultas){
        $sql = "SELECT * FROM prodi";
        return $this->db->query($sql)->result();   
    }

    public function delete($NIM)
    {
        return $this->db->delete($this->_table, array("NIM" => $NIM));
    }
    public function cekNIM($NIM){
        $sql = "SELECT NIM FROM mahasiswa WHERE NIM = $NIM ";
        $query = $this->db->query($sql); 
     return $total = $query->num_rows();
    }

    public function saveMahasiswa()
    {
        $post = $this->input->post();
        $data = array(
             'NIM' => $post["NIM"],
             'nama_mhs' => $post["nama_mahasiswa"],
             'id_prodi' => $post["prodi"],
             'alamat' => $post["alamat"],
             'tgl_lahir' => $post["tanggal_lahir"],
             'gender' => $post["gender"],
             'agama' => $post["agama"],
             'id_fakultas' => $this->session->userdata('id_fakultas'),
        );
        $this->db->insert('mahasiswa', $data);
    }

    public function editMahasiswa($id_mahasiswa)
    {
        $post = $this->input->post();
        $this->db->set("NIM", $post["NIM"]);
        $this->db->set("nama_mhs", $post["nama_mahasiswa"]);
        $this->db->set("id_prodi", $post["prodi"]);
        $this->db->set("alamat", $post["alamat"]);
        $this->db->set("tgl_lahir", $post["tanggal_lahir"]);
        $this->db->set("gender", $post["gender"]);
        $this->db->set("agama", $post["agama"]);
        $this->db->where("id_mahasiswa", $id_mahasiswa);
        $this->db->update("mahasiswa");
    }

    
}