<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getByPhone($hp = null)
	{
		$this->db->from('tb_user');
		$this->db->where('hp', $hp);
		$query = $this->db->get();
		return $query;
	}

	public function getNonActive($id = null)
	{
		$this->db->from('tb_user');
		$this->db->where('status', "2");
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		$params['id'] =  "";
		$params['username'] =  $post['username'];
		$params['password'] =  sha1($post['password']);
		$params['nama'] =  $post['nama'];
		$params['tempat_lahir'] =  ucwords(strtolower($post['tempat_lahir']));
		$params['tgl_lahir'] =  $post['tgl_lahir'];
		$params['hp'] =  $post['hp'];
		$params['email'] =  $post['email'];
		$params['domisili'] =  $post['domisili'];
		$params['suku'] =  $post['suku'];
		$params['created'] =  date("Y:m:d:h:i:sa");
		$params['status'] =  "1";
		$params['tipe_user'] =  $post["tipe"];
		$this->db->insert('tb_user', $params);
	}

	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
	}

	function acc($id)
	{
		$params['status'] =  "1";

		$this->db->where('id', $id);
		$this->db->update('tb_user', $params);
	}
}
