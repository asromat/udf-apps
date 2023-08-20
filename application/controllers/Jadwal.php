<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkLogin();

        $this->load->model('jadwal_m');

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

    function belajar()
	{
		$data['menu'] = "List Jadwal Belajar";
		if ($this->session->tipe_user == "1") {
			$tipe = null;
			$id = null;
		} elseif ($this->session->tipe_user == "2") {
			$tipe="praktisi_id";
			$id = $this->session->id; 
		} elseif ($this->session->tipe_user == "3") {
			$tipe="guru_id";
			$id = $this->session->id; 
		}
		$data['row'] = $this->jadwal_m->getJadwal($tipe,$id);
		$this->template->load('template/detail','jadwal/listJadwal_'.$this->session->tipe_user,$data);
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
			$data['menu'] = "Tambah Jadwal Belajar";
			$this->template->load('template/detail','jadwal/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->jadwal_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Topik berhasil ditambahkan');
	        }	
	        redirect('jadwal/belajar');	        	
	    }
	}

    public function edit($id)
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
			$data['row'] = $this->jadwal_m->get($id);
			$this->template->load('template/detail','jadwal/edit',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->jadwal_m->update($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Jadwal berhasil diedit');
	        }	
	        redirect('jadwal/belajar');	        	
	    }
	}

    function hapus($id)
    {
        $id = $this->uri->segment(3);
        $this->jadwal_m->hapus($id);
        $this->session->set_flashdata('danger', 'Jadwal berhasil dihapus');
        redirect('jadwal/belajar');
    }


}
