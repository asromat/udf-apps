<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Topik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkLogin();

        $this->load->model('topik_m');

        //Agar tidak ada form resubmission
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    // LOAD DATA AJA
    public function index()
    {
        redirect('pendaftaran/pendaftaran_data');
    }

    public function tambah()
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {			
			$data['menu'] = "Tambah Topik yang Relevan dengan Kamu";
			$data['topik'] = $this->topik_m->getById($this->session->id);
			$this->template->load('template/detail','topik/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->topik_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Topik berhasil ditambahkan');
	        }	
	        redirect('portofolio/detail');	        	
	    }
	}

    public function edit()
	{	

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {			
			$data['menu'] = "Edit Topik Kamu";
			$data['topik'] = $this->topik_m->getById($this->session->id);
			$this->template->load('template/detail','topik/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->topik_m->update($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Topik berhasil diedit');
	        }	
	        redirect('portofolio/detail');	        	
	    }
	}


}
