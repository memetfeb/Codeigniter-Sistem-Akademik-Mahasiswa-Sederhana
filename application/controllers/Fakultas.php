<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("fakultas_model");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["mhs_fakultas"] = $this->fakultas_model->getAllFakultas($this->session->userdata('id_fakultas'));
        $data["nama_fakultas"] = $this->fakultas_model->getNamaFakultas($this->session->userdata('id_fakultas'));
        $data["prodi"] = $this->fakultas_model->getProdi($this->session->userdata('id_fakultas'));
        // $data["tahun"] = $this->pemasukkan_lain_model->getTahunPemasukkanLain();
        $this->load->view("fakultas/list_mahasiswa_fakultas", $data);
    }

    public function detail($NIM)
     {
        $data["prodi"] = $this->fakultas_model->getProdi($this->session->userdata('id_fakultas'));
        $data["mahasiswa"] = $this->fakultas_model->detail($NIM);
        $this->load->view("fakultas/detail_mahasiswa_fakultas", $data);
     }

    public function delete($NIM=null)
    {
        if (!isset($NIM)) show_404();
        if ($this->fakultas_model->delete($NIM)) 
        {
            redirect(site_url('fakultas'));
        }
    }

    public function add()
     {
        $post = $this->input->post();
        $NIM = $post["NIM"];
        if($this->fakultas_model->cekNIM($NIM) == 0){
            if ($this->fakultas_model->saveMahasiswa()) 
            {
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
        }else{$this->session->set_flashdata('Gagal', 'NIM sudah digunakan');
        }
        redirect(site_url('fakultas'));
     }

    public function edit($id_mahasiswa)
     {
         $post = $this->input->post();
        if ($this->fakultas_model->editMahasiswa($id_mahasiswa)) 
            {
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
        else{$this->session->set_flashdata('Gagal', 'NIM sudah digunakan');
        }
        redirect(site_url('fakultas'));
     }

    // public function getPemasukkanLainByKategoriBulanTahun()
    // {
    //     $data["pemasukkan_lain"] = $this->pemasukkan_lain_model->getPemasukkanLainByKategoriBulanTahun();
    //     $data["kategori"] = $this->pemasukkan_lain_model->getKategori();
    //     $data["tahun"] = $this->pemasukkan_lain_model->getTahunPemasukkanLain();
    //     $this->load->view("admin/pemasukkan_lain/list_pemasukkan_lain", $data);
    // }

    // public function list_kategori_pemasukkan_lain()
    // {
    //     $data["kategori"] = $this->pemasukkan_lain_model->getKategori();
    //     $this->load->view("admin/pemasukkan_lain/list_kategori_pemasukkan_lain", $data);
    // }

    // public function add()
    // {
    //     $data["kategori"] = $this->pemasukkan_lain_model->getKategori();
    //     $data["bulan"] = date('m');
    //     $data["tahun"] = date('Y');
    //     $data["tanggal"] = date('d/m/Y');      
    //     $pemasukkan_lain = $this->pemasukkan_lain_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($pemasukkan_lain->rulesPemasukkanLain());
    //     if ($validation->run()) {
    //         $pemasukkan_lain->savePemasukkanLain();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }
    //     $this->load->view("admin/pemasukkan_lain/tambah_pemasukkan_lain", $data);
    // }

    // public function addKategori()
    // {
    //     $pemasukkan_lain = $this->pemasukkan_lain_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($pemasukkan_lain->rulesKategori());
    //     $post = $this->input->post();
    //     if ($validation->run()) {
    //         if ($pemasukkan_lain->cekKodePL($post["kode_kategori"]) == 0){
    //             $pemasukkan_lain->saveKategori();
    //             $this->session->set_flashdata('success', 'Berhasil disimpan');   
    //         }else{
    //             $this->session->set_flashdata('error', 'Kode Kategori sudah ada');
    //         }            
    //         $this->list_kategori_pemasukkan_lain();
    //     }
    // }

    // public function addPemasukkanLain()
    // {
    //     $pemasukkan_lain = $this->pemasukkan_lain_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($pemasukkan_lain->rulesPemasukkanLain());
    //     if ($validation->run()) {
    //         $pemasukkan_lain->savePemasukkanLain();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }
    //     redirect(site_url('admin/pemasukkan_lain'));
    // }

    // public function editKategori($id_kategori)
    // {
    //     if (!isset($id_kategori)) redirect('admin/pemasukkan_lain/list_kategori_pemasukkan_lain');
    //     $post = $this->input->post();
    //     $pemasukkan_lain = $this->pemasukkan_lain_model;
    //     $kode_lama = $pemasukkan_lain->getKodeById($id_kategori);
    //     if($kode_lama->kode == $post["kode_kategori"]){
    //         $pemasukkan_lain->updateKategori($id_kategori);
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //         redirect(site_url('admin/pemasukkan_lain/list_kategori_pemasukkan_lain'));    
    //     }else{
    //         if($pemasukkan_lain->cekKodePL($post["kode_kategori"]) == 0){
    //           $pemasukkan_lain->updateKategori($id_kategori);
    //           $this->session->set_flashdata('success', 'Berhasil disimpan');
    //           redirect(site_url('admin/pemasukkan_lain/list_kategori_pemasukkan_lain'));  
    //       }else{
    //         $this->session->set_flashdata('error', 'Kode Kategori sudah ada');
    //         redirect(site_url('admin/pemasukkan_lain/list_kategori_pemasukkan_lain'));
    //       }
    //     }
    // }

    // public function editPemasukkanLain($no)
    // {
    //     if (!isset($no)) redirect('admin/pemasukkan_lain');
    //     $pemasukkan_lain = $this->pemasukkan_lain_model;
    //     $pemasukkan_lain->updatePemasukkanLain($no);
    //     $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     redirect(site_url('admin/pemasukkan_lain'));
    // }

    // public function deleteKategori($no=null)
    // {
    //     if (!isset($no)) show_404();
    //     if ($this->pemasukkan_lain_model->deleteKategori($no)) {
    //         redirect(site_url('admin/pemasukkan_lain/list_kategori_pemasukkan_lain'));
    //     }
    // }

    // public function deletePemasukkanLain($no=null)
    // {
    //     if (!isset($no)) show_404();
    //     if ($this->pemasukkan_lain_model->deletePemasukkanLain($no)) {
    //         redirect(site_url('admin/pemasukkan_lain/'));
    //     }
    // }

    // public function rekapPemasukkanLain()
    // {
    //     $bulan = date('m');
    //     $tahun = date('Y');
    //     $pemasukkan_lain = $this->pemasukkan_lain_model;
    //     $data["bulan"] = $bulan;
    //     $data["tahun"] = $tahun;
    //     $data["tahun_pemasukkan_lain"] = $this->pemasukkan_lain_model->getTahunPemasukkanLain();
    //     $data["nominal_pemasukkan_lain"] = $pemasukkan_lain->getNominalPemasukkanLain($bulan,$tahun);
    //     $data["pemasukkan_lain_group"] = $pemasukkan_lain->getPemasukkanLainGroupByBulanTahun($bulan,$tahun);
    //     $data["list_pemasukkan_lain"] = $pemasukkan_lain->getListPemasukkanLainByBulanTahun($bulan,$tahun);
    //     $this->load->view("admin/pemasukkan_lain/rekapPemasukkanLain", $data);
    // }

    // public function rekapPemasukkanLainGo()
    // {
    //     $post = $this->input->post();
    //     $bulan = $post["bulan"];
    //     $tahun = $post["tahun"];
    //     if((!isset($post["bulan"])) OR (!isset($post["tahun"]))) {
    //         redirect(site_url('admin/pemasukkan_lain/rekapPemasukkanLain'));
    //     }
    //     $pemasukkan_lain = $this->pemasukkan_lain_model;
    //     $data["bulan"] = $bulan;
    //     $data["tahun"] = $tahun;
    //     $data["tahun_pemasukkan_lain"] = $pemasukkan_lain->getTahunPemasukkanLain();
    //     $data["nominal_pemasukkan_lain"] = $pemasukkan_lain->getNominalPemasukkanLain($bulan,$tahun);
    //     $data["pemasukkan_lain_group"] = $pemasukkan_lain->getPemasukkanLainGroupByBulanTahun($bulan,$tahun);
    //     $data["list_pemasukkan_lain"] = $pemasukkan_lain->getListPemasukkanLainByBulanTahun($bulan,$tahun);
    //     $this->load->view("admin/pemasukkan_lain/rekapPemasukkanLain", $data);
    // }
}