<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkHp($this->session->id);
		checkGayaBelajar();
		checkPilihanMateri($this->session->id);
		checkPreTest($this->session->id);
	}

	public function index()
	{
		$this->load->model("treatment_m");
		$dataMenuBelajar = $this->treatment_m->getMenuBelajar();

		$data['title'] = "DASHBOARD - KM LEARNING SYSTEM";
		$data['menubelajar'] = $dataMenuBelajar;
        $this->template->load('template/dashboard', 'page/beranda/' . $this->session->tipe_user, $data);
	}
}
