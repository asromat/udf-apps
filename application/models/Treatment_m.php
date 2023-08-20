<?php defined('BASEPATH') or exit('No direct script access allowed');

class Treatment_m extends CI_Model
{

    public function getPraktisiByTopik($topik)
    {
        $this->db->from('tb_topik');
        $this->db->like("deskripsi",$topik,"match");
        $query = $this->db->get();
        return $query;
    }

    function getPraktisiList($status = null, $kondisi = null, $id = null)
    {
        $this->db->from('tb_praktisi');
        if ($status != null) { $this->db->where("status",$status); }
        if ($id != null) { $this->db->where($kondisi,$id); }
        $query = $this->db->get();
        return $query;
    }

    function prosesPraktisi($post)
	{
		$params['id'] =  "";
		$params['topik'] =  $post['topik'];
		$params['praktisi_id'] =  $post['praktisi'];
		$params['guru_id'] =  $this->session->id;
		$params['created'] =  date("Y:m:d:h:i:sa");

		$this->db->insert('tb_praktisi', $params);
	}

    function batalkanPraktisi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_praktisi');
	}

    function terimaPraktisi($id)
	{
		$params['status'] =  "diterima";

		$this->db->where('id', $id);
		$this->db->update('tb_praktisi', $params);
	}

}
