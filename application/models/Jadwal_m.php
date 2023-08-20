<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_jadwal');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    function getJadwal($kondisi = null, $id = null)
    {
        $this->db->from('tb_jadwal');
        if ($id != null and $kondisi != null) { $this->db->where($kondisi,$id); }
        $this->db->order_by("created","DESC");
		$this->db->limit("20","0");
        $query = $this->db->get();
        return $query;
    }

    public function getById($id = null)
	{
		$this->db->from('tb_jadwal');
		if ($id != null) {
			$this->db->where('pembuat', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		$params['id'] =  "";
		$params['topik'] =  $post['topik'];
		$params['tanggal'] =  $post['tanggal'];
		$params['link'] =  $post['link'];
		$params['praktisi_id'] =  $post['praktisi_id'];
		$params['guru_id'] =  $this->session->id;
		$params['created'] =  date("Y:m:d:h:i:sa");

		$this->db->insert('tb_jadwal', $params);
	}

	function update($post)
	{
		$params['id'] =  $post['id'];
		$params['topik'] =  $post['topik'];
		$params['tanggal'] =  $post['tanggal'];
		$params['link'] =  $post['link'];
		$params['praktisi_id'] =  $post['praktisi_id'];

		$this->db->where('id', $params['id']);
		$this->db->update('tb_jadwal', $params);
	}

	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_jadwal');
	}

}
