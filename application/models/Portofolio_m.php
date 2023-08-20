<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_portofolio');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		$params['id'] =  "";
		$params['user_id'] =  $this->session->id;
		$params['file'] =  $post['file'];
		$params['created'] = date("Y:m:d:h:i:sa");
		$this->db->insert('tb_portofolio', $params);
	}

	function update($post)
	{
		$params['file'] =  $post['file'];
		$this->db->where('user_id', $this->session->id);
		$this->db->update('tb_portofolio', $params);
	}
}
