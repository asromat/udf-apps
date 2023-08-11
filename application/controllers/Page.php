<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		checkLogin();
	}

	public function index()
	{
		redirect("test");
	}

	public function test()
	{
		$data['menu'] = "Dashboard";
		$this->template->load('template/full','p/splash',$data);
	}

	public function p()
	{
		$page = $this->uri->segment("2");
		if($page != null){
			$data['menu'] = str_replace("-"," ",strtoupper($page));
			$this->template->load('template/detail','page/'.$page,$data);
		} else {
			redirect();
		}
	}

}


