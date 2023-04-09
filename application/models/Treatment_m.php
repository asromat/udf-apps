<?php defined('BASEPATH') or exit('No direct script access allowed');

class Treatment_m extends CI_Model
{

    public function getGayaBelajar($id = null)
    {
        $this->db->select('gaya_belajar');
        $this->db->from('tb_user');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->where('id', $this->session->id);
        }
        $query = $this->db->get();
        return $query;
    }

    function updateGayaBelajar($gaya_belajar, $user_id = null)
    {
        if ($user_id != null) {
            $params['id'] =  $user_id;
        } else {
            $params['id'] =  $this->session->id;
        }
        $params['gaya_belajar'] =  $gaya_belajar;

        $this->db->where('id', $params['id']);
        $this->db->update('tb_user', $params);
    }

    #############################################

    function getMateriPilihan($id = null)
    {
        $this->db->from('tb_materi_pilihan');
        if ($id != null) {
            $this->db->where('user_id', $id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        $query = $this->db->get();
        return $query;
    }

    function saveMateriPilihan($post)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['pilihan'] =  implode(",", $post['pil']);
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_materi_pilihan', $params);
    }

    #############################################

    function getSoalTest($id = null, $tema_id = null)
    {
        $this->db->from('tb_soal_test');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getTema($id = null)
    {
        $this->db->from('tb_tema');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getSubtema($id = null, $tema_id = null)
    {
        $this->db->from('tb_subtema');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getSkorTest($status, $soal_id = null, $user_id = null, $tema_id = null)
    {
        $this->db->from('tb_skor_test');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        if ($soal_id != null) {
            $this->db->where('soal_id', $soal_id);
        }
        $this->db->where("status", $status);
        $query = $this->db->get();
        return $query;
    }

    function getPrioritas($user_id = null, $tema_id = null)
    {
        $this->db->from('tb_materi_pilihan');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        $this->db->like("pilihan", "," . $tema_id, "both");
        $query = $this->db->get();
        return $query;
    }


    function getPretestUser($id = null)
    {
        $this->db->from('tb_penilaian_pretest');
        if ($id != null) {
            $this->db->where('user_id', $id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getPosttestUser($id = null)
    {
        $this->db->from('tb_penilaian_posttest');
        if ($id != null) {
            $this->db->where('user_id', $id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        $query = $this->db->get();
        return $query;
    }

    function cekJawabanPretest($soal_id)
    {
        $this->db->from('tb_jawaban_pretest');
        $this->db->where('user_id', $this->session->id);
        $this->db->where('soal_id', $soal_id);
        $query = $this->db->get();
        return $query;
    }

    function cekJawabanPosttest($soal_id)
    {
        $this->db->from('tb_jawaban_posttest');
        $this->db->where('user_id', $this->session->id);
        $this->db->where('soal_id', $soal_id);
        $query = $this->db->get();
        return $query;
    }

    function saveJawabanPretest($soal_id, $jawaban)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['soal_id'] =  $soal_id;
        $params['jawaban'] =  $jawaban;
        $params['created'] =  date("Y-m-d H:i:s");

        $this->db->insert('tb_jawaban_pretest', $params);
    }

    function saveJawabanPosttest($soal_id, $jawaban)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['soal_id'] =  $soal_id;
        $params['jawaban'] =  $jawaban;
        $params['created'] =  date("Y-m-d H:i:s");

        $this->db->insert('tb_jawaban_posttest', $params);
    }

    function savePreTest($post)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['skor'] =  $post['skor'];
        $params['benar'] =  $post['benar'];
        $params['salah'] =  $post['salah'];
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_penilaian_pretest', $params);
    }

    function savePostTest($post)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['skor'] =  $post['skor'];
        $params['benar'] =  $post['benar'];
        $params['salah'] =  $post['salah'];
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_penilaian_posttest', $params);
    }

    function saveSkorTest($soal_id, $tema_id, $status)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['soal_id'] =  $soal_id;
        $params['tema_id'] =  $tema_id;
        $params['status'] =  $status;
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_skor_test', $params);
    }

    #############################################

    function getMenuBelajar($tema_id = null, $user_id = null)
    {
        $this->db->from('tb_menu_belajar');
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        $this->db->order_by("skor", "DESC");
        $this->db->order_by("prioritas", "DESC");
        $query = $this->db->get();
        return $query;
    }

    function getMenuHasilBelajar($tema_id = null, $user_id = null)
    {
        $this->db->from('tb_menu_hasilbelajar');
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        $this->db->order_by("skor", "DESC");
        $this->db->order_by("prioritas", "DESC");
        $query = $this->db->get();
        return $query;
    }

    function saveMenuBelajar($tema_id = null, $skor, $prioritas)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tema_id'] =  $tema_id;
        $params['skor'] =  $skor;
        $params['prioritas'] =  $prioritas;
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_menu_belajar', $params);
    }

    function saveMenuHasilBelajar($tema_id = null, $skor, $prioritas)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tema_id'] =  $tema_id;
        $params['skor'] =  $skor;
        $params['prioritas'] =  $prioritas;
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_menu_hasilbelajar', $params);
    }

    #############################################

    function getPreSubtemaUser($id = null, $subtema_id = null)
    {
        $this->db->from('tb_penilaian_subtema');
        if ($id != null) {
            $this->db->where('user_id', $id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        if ($subtema_id != null) {
            $this->db->where("subtema_id", $subtema_id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getSoalTema($id = null, $tema_id = null, $subtema_id = null)
    {
        $this->db->from('tb_soal');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        if ($subtema_id != null) {
            $this->db->where('subtema_id', $subtema_id);
        }
        $query = $this->db->get();
        return $query;
    }

    function cekJawabanTema($status, $soal_id)
    {
        $this->db->from('tb_jawaban_tema');
        $this->db->where('user_id', $this->session->id);
        $this->db->where('soal_id', $soal_id);
        $this->db->where('status', $status);
        $query = $this->db->get();
        return $query;
    }

    function saveJawabanTema($status, $soal_id, $jawaban)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['soal_id'] =  $soal_id;
        $params['jawaban'] =  $jawaban;
        $params['status'] =  $status;
        $params['created'] =  date("Y-m-d H:i:s");

        $this->db->insert('tb_jawaban_tema', $params);
    }

    function getSkorTema($status, $soal_id = null, $user_id = null, $tema_id = null, $subtema_id = null)
    {
        $this->db->from('tb_skor_tema');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        if ($subtema_id != null) {
            $this->db->where('subtema_id', $subtema_id);
        }
        if ($soal_id != null) {
            $this->db->where('soal_id', $soal_id);
        }
        $this->db->where("status", $status);
        $query = $this->db->get();
        return $query;
    }

    function saveSkorTema($soal_id, $tema_id, $subtema_id, $status)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['soal_id'] =  $soal_id;
        $params['tema_id'] =  $tema_id;
        $params['subtema_id'] =  $subtema_id;
        $params['status'] =  $status;
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_skor_tema', $params);
    }

    function getTemaUser($status = null, $user_id = null, $tema_id = null)
    {
        $this->db->from('tb_penilaian_tema');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        if ($status != null) {
            $this->db->where('status', $status);
        }
        $query = $this->db->get();
        return $query;
    }

    function saveTema($post)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tema_id'] =  $post['tema_id'];
        $params['skor'] =  $post['skor'];
        $params['benar'] =  $post['benar'];
        $params['salah'] =  $post['salah'];
        $params['status'] =  $post['status'];
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_penilaian_tema', $params);
    }

    #############################################

    function getMateriBelajar($subtema_id = null, $tema_id = null, $user_id = null)
    {
        $this->db->from('tb_menu_materi');
        if ($subtema_id != null) {
            $this->db->where('subtema_id', $subtema_id);
        }
        if ($tema_id != null) {
            $this->db->where('tema_id', $tema_id);
        }
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        } else {
            $this->db->where('user_id', $this->session->id);
        }
        $this->db->order_by("skor", "DESC");
        $this->db->order_by("prioritas", "DESC");
        $query = $this->db->get();
        return $query;
    }

    function saveMateriBelajar($subtema_id = null, $tema_id = null, $skor, $prioritas)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['subtema_id'] =  $subtema_id;
        $params['tema_id'] =  $tema_id;
        $params['skor'] =  $skor;
        $params['prioritas'] =  $prioritas;
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_menu_materi', $params);
    }

    #############################################


}
