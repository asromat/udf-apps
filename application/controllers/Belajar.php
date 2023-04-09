<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Belajar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkLogin();
        $this->load->model("belajar_m");
        $this->load->model("treatment_m");
    }

    public function index()
    {
        $data['menu'] = "PILIH MATERI";
        $this->template->load('template/detail', 'belajar/list.php', $data);
    }

    public function menu()
    {
		$dataMenuBelajar = $this->treatment_m->getMenuBelajar();
        
        $data['menu'] = "PELAJARI MATERI";
        $data['menubelajar'] = $dataMenuBelajar;
        $this->template->load('template/detail', 'belajar/menu.php', $data);
    }
    
    public function preTest($tema_id)
    {
		// Ambil Data yang dibutuhkan
		$dataPretest = $this->treatment_m->getTemaUser("pretest",$this->session->id,$tema_id);
        
		// Cek sudah pre-test
		if ($dataPretest->num_rows() > 0) {
			$this->session->set_flashdata('warning', 'Anda Sudah Melakukan Pre-Test untuk Materi Ini');
			redirect("belajar/rekomendasimateri/".$tema_id);
		}

        $data['menu'] = "DETAIL MATERI";
        $data['tema_id'] = $tema_id;
        $data['row'] = $this->treatment_m->getSoalTema("",$tema_id);
        $this->template->load('template/detail', 'belajar/pre_test.php', $data);
    }

    public function resultPreTest()
    {
        $post = $this->input->post(null, TRUE);
        if ($post == null ) {
		    redirect('belajar','refresh');
		}

		$jumlah = $post["jumlah"];
		$tema_id = $post["tema_id"];
		$pilihan = $post["pilihan"];
		$id_soal = $post["id"];        
		$user_id = $this->session->id;        
		            
		$score = 0;
		$benar = 0;
		$salah = 0;
		$kosong = 0;

        for ($i=0; $i < $jumlah; $i++) { 
		    $nomor = $id_soal[$i];

		    if (empty($pilihan[$nomor])) {
		        $kosong++;
		    } else {
		        // $jawaban = $pilihan[$nomor];
		        $jawaban = substr($pilihan[$nomor], 1);

		        //Input Riwayat Jawaban di DB
				$cekJawaban = $this->treatment_m->cekJawabanTema("pretest",$nomor)->num_rows();
				if ($cekJawaban == null) {
					$this->treatment_m->saveJawabanTema("pretest",$nomor, $jawaban);
				}

		        //Cocokkan dengan jawaban di db
		        $this->db->where("id",$nomor);
		        $this->db->where("kunci",$jawaban);
		        $cek = $this->db->get("tb_soal")->num_rows();

                // Data Soal
                $soal = $this->treatment_m->getSoalTema($nomor)->row();

		        if ($cek) {
		            $benar++;
                    $cekSkorTema = $this->treatment_m->getSkorTema("pretest",$nomor,$user_id,$soal->tema_id,$soal->subtema_id)->num_rows();
					if ($cekSkorTema == null) {
						$this->treatment_m->saveSkorTema($nomor,$soal->tema_id,$soal->subtema_id, "pretest");
					}
		        } else {
		            $salah++;
		        }               
		    }

		}
        
        // Rata-rata
		$hasil = 100 / $jumlah * $benar;
		$skor = number_format($hasil, 0);

		// Data Akhir
		$params['tema_id'] = $tema_id;
		$params['benar'] = $benar;
		$params['salah'] = $salah;
		$params['kosong'] = $kosong;
		$params['skor'] = $skor;
		$params['status'] = "pretest";

		// Simpan Hasil Di DB
		$cekPretest = $this->treatment_m->getTemaUser("pretest",$this->session->id,$tema_id)->num_rows();
		if ($cekPretest == null) {
			$this->treatment_m->saveTema($params);
		}
		redirect("belajar/rekomendasiMateri/".$tema_id);
    }

    function rekomendasiMateri($tema_id)
	{
        // Ambil Data yang dibutuhkan
		$dataPretest = $this->treatment_m->getTemaUser("pretest",$this->session->id,$tema_id);
		$dataPosttest = $this->treatment_m->getTemaUser("posttest",$this->session->id,$tema_id);
		$dataMateriBelajar = $this->treatment_m->getMateriBelajar("",$tema_id,$this->session->id);
		
		// Cek sudah pre-test
		if ($dataPretest->num_rows() != "1") {
			redirect("belajar/pretest/".$tema_id);
		}

		// Cek gaya belajar
		if ($dataMateriBelajar->num_rows() == 0) {
			redirect("belajar/prosesRekomendasiMateri/".$tema_id);
		}


		$data['pretest'] = $dataPretest->row();
		$data['posttest'] = $dataPosttest;
		$data['materibelajar'] = $dataMateriBelajar;
		$data['menu'] = "REKOMENDASI";
		$data['tema_id'] = $tema_id;
		$this->template->load('template/detail', 'belajar/rekomendasi', $data);
	}

    function prosesRekomendasiMateri($tema_id)
	{
        // Load data tema
		$temas = $this->treatment_m->getSubtema("",$tema_id);
		foreach ($temas->result() as $key => $data) {
			// Dapatkan Skor Total: total dari tb_skor_test / tb_soal_test
			$perolehan_soal = $this->treatment_m->getSkorTema("pretest","",$this->session->id,$data->tema_id,$data->id)->num_rows();
			$total_soal = $this->treatment_m->getSoalTema("",$data->tema_id,$data->id)->num_rows();
			$skor = number_format($perolehan_soal / $total_soal * 100,0);
			// Cocokkan dengan priotitas1
			$prioritas = $this->treatment_m->getPrioritas($this->session->id,$data->id)->num_rows();

			$getPrioritas = $this->treatment_m->getMateriBelajar($data->id,$data->tema_id,$this->session->id)->num_rows();
            if ($getPrioritas == null) {
				// Simpan ke Database
				$this->treatment_m->saveMateriBelajar($data->id,$data->tema_id,$skor,$prioritas);		
			}
		}
		redirect("belajar/rekomendasimateri/".$tema_id);
	}

	public function postTest($tema_id)
    {
		// Ambil Data yang dibutuhkan
		$dataPosttest = $this->treatment_m->getTemaUser("posttest",$this->session->id,$tema_id);
        
		// Cek sudah pre-test
		if ($dataPosttest->num_rows() > 0) {
			$this->session->set_flashdata('warning', 'Anda Sudah Melakukan Post Test untuk Materi Ini');
			redirect("belajar/rekomendasimateri/".$tema_id);
		}

        $data['menu'] = "DETAIL MATERI";
        $data['tema_id'] = $tema_id;
        $data['row'] = $this->treatment_m->getSoalTema("",$tema_id);
        $this->template->load('template/detail', 'belajar/post_test.php', $data);
    }

    public function resultPostTest()
    {
        $post = $this->input->post(null, TRUE);
        if ($post == null ) {
		    redirect('belajar','refresh');
		}

		$jumlah = $post["jumlah"];
		$tema_id = $post["tema_id"];
		$pilihan = $post["pilihan"];
		$id_soal = $post["id"];        
		$user_id = $this->session->id;        
		            
		$score = 0;
		$benar = 0;
		$salah = 0;
		$kosong = 0;

        for ($i=0; $i < $jumlah; $i++) { 
		    $nomor = $id_soal[$i];

		    if (empty($pilihan[$nomor])) {
		        $kosong++;
		    } else {
		        // $jawaban = $pilihan[$nomor];
		        $jawaban = substr($pilihan[$nomor], 1);

		        //Input Riwayat Jawaban di DB
				$cekJawaban = $this->treatment_m->cekJawabanTema("posttest",$nomor)->num_rows();
				if ($cekJawaban == null) {
					$this->treatment_m->saveJawabanTema("posttest",$nomor, $jawaban);
				}

		        //Cocokkan dengan jawaban di db
		        $this->db->where("id",$nomor);
		        $this->db->where("kunci",$jawaban);
		        $cek = $this->db->get("tb_soal")->num_rows();

                // Data Soal
                $soal = $this->treatment_m->getSoalTema($nomor)->row();

		        if ($cek) {
		            $benar++;
                    $cekSkorTema = $this->treatment_m->getSkorTema("posttest",$nomor,$user_id,$soal->tema_id,$soal->subtema_id)->num_rows();
					if ($cekSkorTema == null) {
						$this->treatment_m->saveSkorTema($nomor,$soal->tema_id,$soal->subtema_id, "posttest");
					}
		        } else {
		            $salah++;
		        }               
		    }

		}
        
        // Rata-rata
		$hasil = 100 / $jumlah * $benar;
		$skor = number_format($hasil, 0);

		// Data Akhir
		$params['tema_id'] = $tema_id;
		$params['benar'] = $benar;
		$params['salah'] = $salah;
		$params['kosong'] = $kosong;
		$params['skor'] = $skor;
		$params['status'] = "posttest";

		// Simpan Hasil Di DB
		$cekPosttest = $this->treatment_m->getTemaUser("posttest",$this->session->id,$tema_id)->num_rows();
		if ($cekPosttest == null) {
			$this->treatment_m->saveTema($params);
		}
		$this->session->set_flashdata('success', 'Kamu telah berhasil mengerjakan POST-TEST');
		redirect("belajar/rekomendasiMateri/".$tema_id);
    }

    public function detail($id)
    {
        $dataSubtema = $this->belajar_m->getSubTema($id);
		$gayaBelajar = $this->fhe->getById("tb_user","id",$this->session->id)->row("gaya_belajar");

        $data['menu'] = "DETAIL MATERI";
        $data['materi'] = $dataSubtema->row();
        $data['gayaBelajar'] = $gayaBelajar;
        $this->template->load('template/detail', 'belajar/detail.php', $data);
    }

    public function insightJurnal()
    {
        $q = $this->input->get();
        if ($q == null) {
            $query = "universitas%20negeri%20malang";
        } else {
            $query = str_replace(" ","%20",$q['query']);
        }

        $getData = json_decode(file_get_contents("https://api.semanticscholar.org/graph/v1/paper/search?query=".$query."&fields=title,url,year,authors,abstract,venue,referenceCount,citationCount,isOpenAccess&limit=50&offset=50"));

        if (!isset($getData)) {
            $this->session->set_flashdata('danger', 'Jurnal dengan kata kunci terkait tidak ditemukan');
            redirect("belajar/insightJurnal");
        }

        $data['menu'] = "TEMUKAN JURNAL";
        $data['query'] = $query;
        $data['jurnal'] = $getData;
        $this->template->load('template/detail', 'belajar/insightJurnal.php', $data);
    }

    public function insightVideo()
    {
        $q = $this->input->get();
        if ($q == null) {
            $query = "knowledge%20management";
        } else {
            $query = str_replace(" ","%20",$q['query']);
        }
        
        $getData = json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/search?key=AIzaSyC7e61c7dikzuFXUt6LeAW7TQ8qRc-7R6k&q=".$query."&videoCaption=any&part=snippet&maxResults=50&type=video"));
        
        if (!isset($getData)) {
            $this->session->set_flashdata('danger', 'Video dengan kata kunci terkait tidak ditemukan');
            redirect("belajar/insightVideo");
        }

        $data['menu'] = "CARI VIDEO";
        $data['query'] = $query;
        $data['video'] = $getData;
        $this->template->load('template/detail', 'belajar/insightVideo.php', $data);
    }

	function pahamMateri($subtema_id)
	{
		$dataSubtema = $this->treatment_m->getSubtema($subtema_id);
		$cekSudahPaham = $this->fhe->get2w("tb_progress_tema","user_id",$this->session->id,"subtema_id",$subtema_id)->num_rows();
		if ($cekSudahPaham == null) {
			$params['tema_id'] = $dataSubtema->row("tema_id");
			$params['subtema_id'] = $dataSubtema->row("id");
			$params['keterangan'] = "memahami subtema / materi";
			$this->belajar_m->saveProgressSubtema($params);
			$this->session->set_flashdata('success', 'Sudah memahami materi');
            redirect("belajar/detail/".$dataSubtema->row("id"));
		} else {
			$this->session->set_flashdata('danger', 'Anda sudah memahami materi');
            redirect("belajar/detail/".$dataSubtema->row("id"));
		}
	}

}
