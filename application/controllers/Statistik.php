<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkLogin();
    }

    public function index()
    {
        $this->load->model("validation_m");
        
        $data['menu'] = "STATISTIK PEMBELAJARAN";
        $data['login'] = $this->validation_m->getLogLogin($this->session->id,"6");
        $this->template->load('template/detail', 'statistik/home.php', $data);
    }

    function dataSiswa()
    {
        $data['menu'] = "DATA SISWA";
        $data['row'] = $this->fhe->get2w("tb_user","tipe_user","1","status","1");
        $this->template->load('template/detail', 'statistik/data_siswa.php', $data);
    }
}
