<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		$this->load->model("user_m");
		$this->load->model("treatment_m");
	}

	public function index()
	{
		redirect();
	}

	function pilihPraktisi()
	{
		$q = $this->input->get();
        if ($q == null) {
            $query = "fitrah izul falaq";
        } else {
            $query = urldecode($q['query']);
        }
        
        $dataPraktisi = $this->treatment_m->getPraktisiByTopik($query);
		// test($dataPraktisi->result());
        
        if (!isset($dataPraktisi)) {
            $this->session->set_flashdata('danger', 'Praktisi dengan keahlian sesuai dengan kata kunci terkait tidak ditemukan');
            redirect("treatment/pilihPraktisi");
        }

		$data['menu'] = "Cari Praktisi Sesuai Kebutuhan";
        $data['query'] = $query;
        $data['praktisis'] = $dataPraktisi;
        $this->template->load('template/detail', 'treatment/searchPraktisi.php', $data);
	}

	function prosesPraktisi($id)
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
			$data['menu'] = "PORTOFOLIO " . $this->session->nama;
			$data['praktisi'] = $this->fhe->getById("tb_user","id",$id);
			$this->template->load('template/detail', 'treatment/prosesPraktisi.php', $data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->treatment_m->prosesPraktisi($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Permintaan Rekretment di Proses. Akan otomatis tampil setelah di ACC');
	        }	
	        redirect('treatment/pilihpraktisi');	        	
	    }
	}

	function batalkanPraktisi($id)
    {
        $id = $this->uri->segment(3);
        $this->treatment_m->batalkanPraktisi($id);
        $this->session->set_flashdata('danger', 'Berhasil Di Batalkan');
        redirect('treatment/praktisiList/');
    }

	function terimaPraktisi($id)
    {
        $id = $this->uri->segment(3);
        $this->treatment_m->terimaPraktisi($id);
        $this->session->set_flashdata('success', 'Tawaran berhasil diterima');
        redirect('treatment/praktisiList/');
    }

	function praktisiList()
	{
		$data['menu'] = "List Pengajuan Praktisi";
		if ($this->session->tipe_user == "2"){$tipe = "praktisi_id";}else{$tipe="guru_id";}
		$data['row'] = $this->treatment_m->getPraktisiList("",$tipe,$this->session->id);
		$this->template->load('template/detail','treatment/listPraktisi_'.$this->session->tipe_user,$data);
	}
	
}
