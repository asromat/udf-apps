<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function splash()
	{
		$data['menu'] = "Dashboard";
		$this->template->load('template/full','p/splash',$data);
	}

    public function index()
	{
		$data['menu'] = "Dashboard";
		$this->template->load('template/full','p/login',$data);
	}

	public function p()
	{
		$page = $this->uri->segment("3");
		if($page != null){
			$data['menu'] = "Dashboard";
			$this->template->load('template/dashboard','page/'.$page,$data);
		} else {
			redirect();
		}
	}

}


