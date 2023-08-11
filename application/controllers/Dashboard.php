<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		checkLogin();
	}

	public function index()
	{
		$data['title'] = "DASHBOARD - KM LEARNING SYSTEM";
        $this->template->load('template/dashboard', 'page/beranda/' . $this->session->tipe_user, $data);
	}
}
