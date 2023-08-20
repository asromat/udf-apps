<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topik_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_topik');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function getById($id = null)
	{
		$this->db->from('tb_topik');
		if ($id != null) {
			$this->db->where('pembuat', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		$params['id'] =  "";
		$params['deskripsi'] =  $post['deskripsi'];
		$params['pembuat'] =  $this->session->id;
		$params['created'] =  date("Y:m:d:h:i:sa");

		$this->db->insert('tb_topik', $params);
	}

	function update($post)
	{
		$params['id'] =  $post['id'];
		$params['deskripsi'] =  $post['deskripsi'];

		$this->db->where('pembuat', $this->session->id);
		$this->db->update('tb_topik', $params);
	}

}
