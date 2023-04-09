<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_forum');
		if ($id != null) {
			$this->db->where('id', $id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function getKomentar($id = null,$forum_id = null)
	{
		$this->db->from('tb_komentar');
		if ($id != null) {
			$this->db->where('id', $id);
		}

		if ($forum_id != null) {
			$this->db->where('forum_id', $forum_id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function saveKomentar($post)
	{
		$params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['komentar'] =  $post['komentar'];
        $params['forum_id'] =  $post['forum_id'];
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_komentar', $params);
	}

	public function get_forum($limit, $start)
	{
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get('tb_forum', $limit, $start);
		return $query;
	}

	function simpan($post)
	{
		if ($post['judul'] == "") {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('error', 'Ojo Main refresh ae bat...');
			redirect('forum/tambah');
		}

		$params['id'] =  "";
		$params['judul'] =  ucwords($post['judul']);
		$params['deskripsi'] =  $post['deskripsi'];
		$params['foto'] =  $post['foto'];
		$params['tema_id'] =  $post['tema_id'];
		$params['user_id'] =  $this->session->id;
		$params['created'] =  date("Y-m-d H:i:s");

		$this->db->insert('tb_forum', $params);
	}

	function update($post)
	{

		$params['id'] =  $post['id'];
		$params['judul'] =  ucwords($post['judul']);
		$params['deskripsi'] =  $post['deskripsi'];
		$params['user_id'] =  $this->session->id;
		if (isset($post['foto'])) {
			$params['foto'] =  $post['foto'];
		}

		$this->db->where('id', $params['id']);
		$this->db->update('tb_forum', $params);
	}

	function hapus($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('tb_forum');
	}
}
