<?php 
// Perintah yang sering dilakukan

class Fhe {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function userType($value) {
		$this->ci->db->from('tb_tipe_user');
		$this->ci->db->where("id",$value);
		$query = $this->ci->db->get();
		return $query->row();
	}

	function get($tabel) {		
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function getById($tabel,$colom,$value) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where($colom,$value);
		$query = $this->ci->db->get();
		return $query;
	}

	function get2w($tabel,$colom,$value,$colom2,$value2) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where($colom,$value);
		$this->ci->db->where($colom2,$value2);
		$query = $this->ci->db->get();
		return $query;
	}

	function get3w($tabel,$colom,$value,$colom2,$value2,$colom3,$value3) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where($colom,$value);
		$this->ci->db->where($colom2,$value2);
		$this->ci->db->where($colom3,$value3);
		$query = $this->ci->db->get();
		return $query;
	}

	function showTag($tag)
    {
        $data = str_replace([",",", "],[':',':'],$tag);
        $final = explode(":",$data);
        return $final;
    }

	function getProgressUser($user_id,$tema_id)
	{
		$this->ci->load->model("belajar_m");

		$progress = $this->ci->belajar_m->getProgressUser($user_id,$tema_id)->num_rows();
        $max_progress = $this->ci->belajar_m->getSubtema("",$tema_id)->num_rows();
        $total_progress = ($progress / $max_progress) * 100;
		return $total_progress;
	}

	function progressTest($pre,$post)
	{
		if ($post > $pre) {
			return '<span class="m-1 badge rounded-pill bg-success">Terjadi peningkatan</span>';
		} elseif ($pre == $post) {
			return '<span class="m-1 badge rounded-pill bg-info">Tidak mengalami peningkatan</span>';
		} elseif ($post < $pre ) {
			return '<span class="m-1 badge rounded-pill bg-danger">Penurunan Nilai</span>';
		}
	}
	
}
