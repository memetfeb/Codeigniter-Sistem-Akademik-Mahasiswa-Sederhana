<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik_model extends CI_Model
{  
    public function getAll()
    {
        $sql = "SELECT a.*, b.nama_fakultas, c.nama_prodi FROM mahasiswa as a, fakultas as b, prodi as c WHERE a.id_fakultas = b.id_fakultas AND a.id_prodi = c.id_prodi ORDER BY a.id_mahasiswa DESC";
        return $this->db->query($sql)->result();
    }
    public function detail($NIM)
    {
        $sql = "SELECT a.*, b.nama_fakultas, c.nama_prodi FROM mahasiswa as a, fakultas as b, prodi as c WHERE a.id_fakultas = b.id_fakultas AND a.id_prodi = c.id_prodi AND a.NIM = $NIM ";
        return $this->db->query($sql)->row();
    }

    
}