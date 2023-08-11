<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		checkLogin();
        $this->load->model("forum_m");
    }

    public function index()
    {
        $data['menu'] = "Forum Terbaru";

		//Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('forum/index');
		$config['total_rows'] = $this->forum_m->get()->num_rows();
		$config['per_page'] = 4;
        
		//Halaman
		$config['start'] = $this->uri->segment(3);
		$config['full_tag_open'] = '<ul class="pagination justify-content-center pagination-one direction-rtl">';        
		$config['full_tag_close'] = '</ul>';        
		$config['first_link'] = 'First';        
		$config['last_link'] = 'Last';        
		$config['first_tag_open'] = '<li class="page-item"><a class="page-link">';        
		$config['first_tag_close'] = '</a></li>';        
		$config['prev_link'] = '<i class="bi bi-chevron-left"></i>';        
		$config['prev_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#">';        
		$config['prev_tag_close'] = '</a></li>';        
		$config['next_link'] = '<i class="bi bi-chevron-right"></i>';        
		$config['next_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';        
		$config['next_tag_close'] = '</a></li>';        
		$config['last_tag_open'] = '<li class="page-item"><a class="page-link">';        
		$config['last_tag_close'] = '</a></li>';        
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
		$config['cur_tag_close'] = '</a></li>';        
		$config['num_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';        
		$config['num_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		//Mulai
		$data['row'] = $this->forum_m->get_forum($config['per_page'], $config['start']);

        $data['menu'] = "CARI PENGETAHUAN DARI PENGALAMAN ORANG LAIN";
        $this->template->load('template/detail', 'forum/list.php', $data);
    }

    public function detail($id)
    {
        $query = $this->forum_m->get($id);
		if ($query->num_rows() > 0) {
			$data['data'] = $query->row();
			$data['komentar'] = $this->forum_m->getKomentar("",$id);
			$data['menu'] = "DETAIL FORUM";
			$this->template->load('template/detail', 'forum/detail.php', $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='" . site_url('forum') . "';</script>";
		}
    }

	public function tambahKomentar()
	{
		$post = $this->input->post(null, TRUE);
		$this->forum_m->saveKomentar($post);
		$this->session->set_flashdata('success', 'Berhasil tambah komentar');
		redirect("forum/detail/".$post['forum_id']);
	}

    public function tambah($tema_id)
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|max_length[200]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data forum";
			$data['header_script'] = "summernote-header";
			$data['footer_script'] = "summernote-footer";
			$this->template->load('template/detail', 'forum/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);

			//CEK GAMBAR
			$config['upload_path']          = 'assets/upload/img/foto-forum/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['file_name']            = $this->session->id."-".date("ymdhsi");

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('forum/tambah');
				}
			}

			$this->forum_m->simpan($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Publish');
			}
			redirect('forum');
		}
	}

    public function edit($id)
	{
		//Mencegah user yang bukan haknya
		isMe($this->fhe->get2w("tb_forum","user_id",$this->session->id,"id",$id)->row("user_id"),$this->session->id);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|max_length[200]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->forum_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data info";
				$data['header_script'] = "summernote-header";
				$data['footer_script'] = "summernote-footer";
				$this->template->load('template/detail', 'forum/edit', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('info') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);

			//CEK GAMBAR
			$config['upload_path']          = 'assets/upload/img/foto-forum/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['file_name']            = $post['user_id']."-".date("ymdhsi");

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('info/tambah');
				}
			}

			$this->forum_m->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('forum/detail/'.$post["id"]);
		}
	}

	function hapusfoto()
	{
		//Mencegah user yang bukan haknya
		$id = $this->uri->segment(3);

		//Action		  
		$itemfoto = $this->forum_m->get($id)->row();
		if ($itemfoto->foto != null) {
			$target_file = 'assets/upload/img/foto-forum/' . $itemfoto->foto;
			unlink($target_file);
		}
		$params['foto'] = "";
		$this->db->where('id', $id);
		$this->db->update('tb_forum', $params);
		redirect('forum/edit/' . $id);
	}

	function hapusfile()
	{
		//Mencegah user yang bukan haknya
		$id = $this->uri->segment(3);

		//Action		  
		$itemfile = $this->forum_m->get($id)->row();
		if ($itemfile->file != null) {
			$target_file = 'assets/uploud/img/file-forum/' . $itemfile->file;
			unlink($target_file);
		}
		$params['file'] = "";
		$this->db->where('id', $id);
		$this->db->update('tb_forum', $params);
		redirect('info/edit/' . $id);
	}

	function hapus()
	{
		//Mencegah user yang bukan haknya
		$id = $this->uri->segment(3);

		$itemfoto = $this->forum_m->get($id)->row();
		if ($itemfoto->foto != null) {
			$target_file = 'assets/upload/img/foto-forum/' . $itemfoto->foto;
			unlink($target_file);
		}

		$itemforum = $this->forum_m->get($id)->row();
		if ($itemforum->file != null) {
			$target_file = 'assets/uploud/img/file-forum/' . $itemforum->file;
			unlink($target_file);
		}

		$this->forum_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('forum');
	}

}
