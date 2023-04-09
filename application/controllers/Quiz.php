<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkLogin();
        $this->load->model("belajar_m");
    }

    public function index()
    {
        $this->load->model("treatment_m");
		$dataMenuBelajar = $this->treatment_m->getMenuBelajar();
        
        $data['menu'] = "UJI KEMAMPUAN DIRI";
        $data['menubelajar'] = $dataMenuBelajar;
        $this->template->load('template/detail', 'quiz/menu.php', $data);
    }

    public function start($tema_id)
    {
        // Cek Persyaratan
        // Tes Persyaratan Progress
        $progress = $this->fhe->getProgressUser($this->session->id,$tema_id);
        if ($progress != "100") {
            $this->session->set_flashdata('warning', 'Anda Belum Melakukan Jelajah Materi');
            redirect("quiz");
        } else {
            redirect("belajar/posttest/".$tema_id);
        }
    }

    public function result()
    {
        $data['menu'] = "HASIL POST TEST";
        $this->template->load('template/detail', 'quiz/result.php', $data);
    }

    public function rekomendasi()
    {
        $data['menu'] = "HASIL POST TEST";
        $this->template->load('template/detail', 'quiz/rekomendasi.php', $data);
    }
}
