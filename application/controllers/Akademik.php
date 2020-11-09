<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("akademik_model");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["data_mahasiswa"] = $this->akademik_model->getAll();
        $this->load->view("akademik/list_mahasiswa", $data);
    }

    public function detail($NIM)
     {
            $data["mahasiswa"] = $this->akademik_model->detail($NIM);
        $this->load->view("akademik/detail_mahasiswa", $data);
     }

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