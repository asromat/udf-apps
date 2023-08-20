<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		checkLogin();
		$this->load->model("portofolio_m");
		$this->load->model("topik_m");
		$this->load->helper('form');
	}

	public function index()
	{
		redirect("portofolio/detail");
	}

	public function detail()
	{
		$data['menu'] = "PORTOFOLIO " . $this->session->nama;
		$data['portofolio'] = $this->portofolio_m->get($this->session->id);
		$data['topik'] = $this->topik_m->getById($this->session->id);
		$this->template->load('template/detail', 'portofolio/detail.php', $data);
	}

	public function status()
	{
		if ($this->session->tipe_user != "2") {
			redirect("portofolio/detail/");
		}

		$data['menu'] = "Tambah Portofolio";
		$data['portofolio'] = $this->portofolio_m->get($this->session->id);
		$this->template->load('template/detail', 'portofolio/status', $data);
	}

	public function tambah()
	{
		$post = $this->input->post(null, TRUE);

		$tgl = date('d-m-Y');

		$config['upload_path']          = 'files/portofolio/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 5000;
		$config['file_name']            = 'PORTOFOLIO-' . $this->session->id . '-' . $tgl;

		$this->load->library('upload', $config);


		if ($this->upload->do_upload('file')) {
			$post['file'] = $this->upload->data('file_name');
		} else {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('danger', $pesan);
			redirect('portofolio/status');
		}

		$cekdata = $this->portofolio_m->get($this->session->id)->num_rows();
		if ($cekdata == 0) {
			$this->portofolio_m->simpan($post, $id);
		} else {
			// echo "update tugas";
			$this->portofolio_m->update($post, $id);
		}


		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}

		redirect('portofolio/detail');
	}

	function hapus()
	{
		//Mencegah user yang bukan haknya
		isMe($this->session->id, $this->uri->segment(3));

		$id = $this->uri->segment(3);

		//Action          
		$this->load->model('portofolio_m');
		$item = $this->portofolio_m->get($id)->row();
		if ($item->file != null) {
			$target_file = 'files/portofolio/' . $item->file;
			unlink($target_file);
		}
		$params['file'] = null;
		$this->db->where('user_id', $id);
		$this->db->update('tb_portofolio', $params);
		redirect('portofolio/status');
	}
}
