<?php defined('BASEPATH') or exit('No direct script access allowed');

class Belajar_m extends CI_Model
{

    public function getTema($id = null)
    {
        $this->db->from('tb_tema');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->where('id', $this->session->id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getSubtema($id = null,$tema_id = null)
    {
        $this->db->from('tb_subtema');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        if ($tema_id != null) {
            $this->db->where("tema_id", $tema_id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function getProgressUser($id = null, $tema_id = null,$subtema_id = null)
    {
        $this->db->from('tb_progress_tema');
        if ($id != null) {
            $this->db->where('user_id', $id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        if ($subtema_id != null) {
            $this->db->where("subtema_id", $subtema_id);
        }
        if ($tema_id != null) {
            $this->db->where("tema_id", $tema_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function saveProgressSubtema($params)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tema_id'] =  $params["tema_id"];
        $params['subtema_id'] =  $params["subtema_id"];
        $params['keterangan'] =  $params["keterangan"];
        $params['created'] =  date("Y-m-d H:i:s");

        $this->db->insert('tb_progress_tema', $params);
    }
}
