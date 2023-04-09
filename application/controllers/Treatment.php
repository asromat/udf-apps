<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		$this->load->model("treatment_m");
	}

	public function index()
	{
		redirect();
	}

	function gayaBelajar()
	{
		$cekGayaBelajar = $this->treatment_m->getGayaBelajar()->row("gaya_belajar");
		if ($cekGayaBelajar != null) {
			$this->session->set_flashdata('warning', 'Anda telah melakukan tes gaya belajar sebelumnya');
			$data['gaya_belajar'] = $cekGayaBelajar;
			redirect("dashboard");
		} else {
			$data['menu'] = "TEST GAYA BELAJAR";
			$this->template->load('template/detail', 'treatment/gaya_belajar', $data);
		}
	}

	function resultGayaBelajar()
	{
		$post = $this->input->post(null, TRUE);
		// Cek apakah bypass ke url, jika ada inputan post akan mengeksekusi uji tes
		if ($post == null) {
			// APakah sudah mengisi sebelumnya
			$cekGayaBelajar = $this->treatment_m->getGayaBelajar()->row("gaya_belajar");
			if ($cekGayaBelajar != null) {
				$this->session->set_flashdata('warning', 'Anda telah melakukan tes gaya belajar sebelumnya');
				redirect("dashboard");
			}
		} else {
			$jumlah = "17";
			$pilihan = $post["soal"];

			$a = 0;
			$b = 0;
			$c = 0;
			$d = 0;

			for ($i = 1; $i < $jumlah; $i++) {
				$nomor = $i;

				if (empty($pilihan[$nomor])) {
					$this->session->set_flashdata('warning', 'Harap mengisi terlebih dahulu');
					redirect();
				} else {
					if ($pilihan[$nomor] == "A") {
						$a++;
					} elseif ($pilihan[$nomor] == "B") {
						$b++;
					} elseif ($pilihan[$nomor] == "C") {
						$c++;
					} elseif ($pilihan[$nomor] == "D") {
						$d++;
					}
				}
			}

			// Cek Hasil
			// test($a . "-" . $b . "-" . $c);
			// SUmber https://elearning.ut.ac.id/apput/ikbm/igb_skor.php
			if ($a > $b and $a > $c) {
				$data['gaya_belajar'] = "visual";
			} elseif ($b > $a and $b > $c) {
				$data['gaya_belajar'] = "auditori";
			} elseif ($c > $a and $c > $b) {
				$data['gaya_belajar'] = "kinestetik";
			} elseif ($a = $b) {
				$data['gaya_belajar'] = "visual-auditori";
			} elseif ($a = $c) {
				$data['gaya_belajar'] = "visual-kinestetik";
			} elseif ($b = $c) {
				$data['gaya_belajar'] = "auditori-kinestetik";
			}

			// Simpan ke database		
			$this->treatment_m->updateGayaBelajar($data['gaya_belajar']);
			$this->session->set_flashdata('success', 'Selamat! Gaya Belajarmu adalah ' . $data['gaya_belajar']);

			$data['menu'] = "HASIL GAYA BELAJAR";
			$this->template->load('template/detail', 'treatment/gaya_belajar_result', $data);
		}
	}

	function materiPilihan()
	{
		// APakah sudah mengisi sebelumnya
		$cekMateriPilihan = $this->treatment_m->getMateriPilihan()->num_rows();
		if ($cekMateriPilihan > 0) {
			$this->session->set_flashdata('warning', 'Kamu telah menentukan prioritas belajarmu sebelumnya');
			redirect("treatment/preTest");
		}

		$data['menu'] = "PILIH MATERI";
		$this->template->load('template/detail', 'treatment/pilihan_materi', $data);
	}

	function resultMateriPilihan()
	{
		$post = $this->input->post(null, TRUE);

		// Cek apakah bypass ke url, jika ada inputan post akan mengeksekusi uji tes
		if ($post == null) {
			// APakah sudah mengisi sebelumnya
			$cekMateriPilihan = $this->treatment_m->getMateriPilihan()->num_rows();
			if ($cekMateriPilihan > 0) {
				$this->session->set_flashdata('warning', 'Kamu telah menentukan prioritas belajarmu sebelumnya');
				redirect("treatment/preTest");
			}
		} else {
			// Simpan ke database		
			$this->treatment_m->saveMateriPilihan($post);
			$this->session->set_flashdata('success', 'Prioritas materimu telah kami simpan. Datamu akan diproses oleh sistem.');
			redirect("treatment/preTest");
		}
	}

	function preTest()
	{
		// APakah sudah mengisi sebelumnya
		$cekPretest = $this->treatment_m->getPretestUser()->num_rows();
		if ($cekPretest > 0) {
			$this->session->set_flashdata('warning', 'Kamu telah melakukan PRE-TEST sebelumnya. Silahkan lanjut ke menu belajar dengan menekan tombol "Lanjut Belajar" dibawah rekomendasi');
			redirect("treatment/rekomendasi");
		}

		$data['menu'] = "PRE-TEST PLATFORM";
		$data['row'] = $this->treatment_m->getSoalTest();
		$this->template->load('template/detail', 'treatment/pre_test', $data);
	}

	public function resultPreTest()
	{
		$post = $this->input->post(null, TRUE);

		if ($post == null) {
			redirect('treatment/pretest', 'refresh');
		}

		$jumlah = $post["jumlah"];
		$pilihan = $post["pilihan"];
		$id_soal = $post["id"];
		// $tema[] = null;

		$benar = 0;
		$salah = 0;
		$kosong = 0;

		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_soal[$i];

			if (empty($pilihan[$nomor])) {
				$kosong++;
			} else {
				$jawaban = substr($pilihan[$nomor], 1);

				//Input Riwayat Jawaban di DB
				$cekJawaban = $this->treatment_m->cekJawabanPretest($nomor)->num_rows();
				if ($cekJawaban == null) {
					$this->treatment_m->saveJawabanPretest($nomor, $jawaban);
				}

				//Cocokkan dengan jawaban di db
				$this->db->where("id", $nomor);
				$this->db->where("kunci", $jawaban);
				$cek = $this->db->get("tb_soal_test")->num_rows();

				if ($cek) {
					$benar++;
					$cekSkorTest = $this->treatment_m->getSkorTest("pretest",$nomor)->num_rows();
					if ($cekSkorTest == null) {
						$this->treatment_m->saveSkorTest($nomor, $this->treatment_m->getSoalTest($nomor)->row("tema_id"), "pretest");
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
		$params['benar'] = $benar;
		$params['salah'] = $salah;
		$params['kosong'] = $kosong;
		$params['skor'] = $skor;

		// Simpan Hasil Di DB
		$cekPretest = $this->treatment_m->getPretestUser()->num_rows();
		if ($cekPretest == null) {
			$this->treatment_m->savePretest($params);
		}
		redirect("treatment/rekomendasi");
	}

	function rekomendasi()
	{
		// Ambil Data yang dibutuhkan
		$dataPretest = $this->treatment_m->getPretestUser();
		$dataGayaBelajar = $this->treatment_m->getGayaBelajar();
		$dataMenuBelajar = $this->treatment_m->getMenuBelajar();
		// Cek sudah pre-test dan tes gaya belajar
		if ($dataPretest->num_rows() == 0 or $dataGayaBelajar->num_rows() == 0) {
			$this->session->set_flashdata('warning', 'Silahkan Melakukan Tes Gaya Belajar dan Pre-Test Terlebih Dahulu');
			redirect("treatment/gayabelajar");
		}

		// Cek gaya belajar
		if ($dataMenuBelajar->num_rows() == 0) {
			redirect("treatment/prosesRekomendasi");
		}


		$data['pretest'] = $dataPretest->row();
		$data['gayabelajar'] = $dataGayaBelajar->row("gaya_belajar");
		$data['menubelajar'] = $dataMenuBelajar;
		$data['menu'] = "REKOMENDASI";
		$this->template->load('template/detail', 'treatment/rekomendasi', $data);
	}

	function prosesRekomendasi()
	{
		// Load data tema
		$temas = $this->treatment_m->getTema();
		foreach ($temas->result() as $key => $data) {
			// Dapatkan Skor Total: total dari tb_skor_test / tb_soal_test
			$perolehan_soal = $this->treatment_m->getSkorTest("pretest","",$this->session->id,$data->id)->num_rows();
			$total_soal = $this->treatment_m->getSoalTest("",$data->id)->num_rows();
			$skor = number_format($perolehan_soal / $total_soal * 100,0);
			// Cocokkan dengan priotitas
			$prioritas = $this->treatment_m->getPrioritas($this->session->id,$data->id)->num_rows();

			$getPrioritas = $this->treatment_m->getMenuBelajar($data->id,$this->session->id)->num_rows();
			if ($getPrioritas == null) {
				// Simpan ke Database
				$this->treatment_m->saveMenuBelajar($data->id,$skor,$prioritas);		
			}
		}
		redirect("treatment/rekomendasi");
	}

	function postTest()
	{
		// APakah sudah mengisi sebelumnya
		$cekPretest = $this->treatment_m->getPosttestUser()->num_rows();
		if ($cekPretest > 0) {
			$this->session->set_flashdata('warning', 'Kamu telah melakukan POST-TEST sebelumnya.');
			redirect("treatment/hasilbelajar/");
		}

		$data['menu'] = "PRE-TEST PLATFORM";
		$data['row'] = $this->treatment_m->getSoalTest();
		$this->template->load('template/detail', 'treatment/post_test', $data);
	}

	public function resultPostTest()
	{
		$post = $this->input->post(null, TRUE);

		if ($post == null) {
			redirect('treatment/posttest', 'refresh');
		}

		$jumlah = $post["jumlah"];
		$pilihan = $post["pilihan"];
		$id_soal = $post["id"];
		// $tema[] = null;

		$benar = 0;
		$salah = 0;
		$kosong = 0;

		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_soal[$i];

			if (empty($pilihan[$nomor])) {
				$kosong++;
			} else {
				$jawaban = substr($pilihan[$nomor], 1);

				//Input Riwayat Jawaban di DB
				$cekJawaban = $this->treatment_m->cekJawabanPosttest($nomor)->num_rows();
				if ($cekJawaban == null) {
					$this->treatment_m->saveJawabanPosttest($nomor, $jawaban);
				}

				//Cocokkan dengan jawaban di db
				$this->db->where("id", $nomor);
				$this->db->where("kunci", $jawaban);
				$cek = $this->db->get("tb_soal_test")->num_rows();

				if ($cek) {
					$benar++;
					$cekSkorTest = $this->treatment_m->getSkorTest("posttest",$nomor)->num_rows();
					if ($cekSkorTest == null) {
						$this->treatment_m->saveSkorTest($nomor, $this->treatment_m->getSoalTest($nomor)->row("tema_id"), "posttest");
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
		$params['benar'] = $benar;
		$params['salah'] = $salah;
		$params['kosong'] = $kosong;
		$params['skor'] = $skor;

		// Simpan Hasil Di DB
		$cekPretest = $this->treatment_m->getPosttestUser()->num_rows();
		if ($cekPretest == null) {
			$this->treatment_m->savePosttest($params);
		}
		redirect("treatment/hasilbelajar");
	}

	function hasilbelajar()
	{
		// Ambil Data yang dibutuhkan
		$dataPretest = $this->treatment_m->getPretestUser();
		$dataPosttest = $this->treatment_m->getPosttestUser();
		$dataGayaBelajar = $this->treatment_m->getGayaBelajar();
		$dataMenuBelajar = $this->treatment_m->getMenuBelajar();
		// Cek sudah pre-test dan tes gaya belajar
		if ($dataPretest->num_rows() == 0 or $dataGayaBelajar->num_rows() == 0) {
			$this->session->set_flashdata('warning', 'Silahkan Melakukan Tes Gaya Belajar dan Pre-Test Terlebih Dahulu');
			redirect("treatment/gayabelajar");
		}

		// Cek gaya belajar
		if ($dataMenuBelajar->num_rows() == 0) {
			redirect("treatment/prosesHasilBelajar");
		}


		$data['pretest'] = $dataPretest->row();
		$data['posttest'] = $dataPosttest->row();
		$data['gayabelajar'] = $dataGayaBelajar->row("gaya_belajar");
		$data['menubelajar'] = $dataMenuBelajar;
		$data['menu'] = "HASIL BELAJAR";
		$this->template->load('template/detail', 'treatment/hasilbelajar', $data);
	}

	function prosesHasilBelajar()
	{
		// Load data tema
		$temas = $this->treatment_m->getTema();
		foreach ($temas->result() as $key => $data) {
			// Dapatkan Skor Total: total dari tb_skor_test / tb_soal_test
			$perolehan_soal = $this->treatment_m->getSkorTest("posttest","",$this->session->id,$data->id)->num_rows();
			$total_soal = $this->treatment_m->getSoalTest("",$data->id)->num_rows();
			$skor = number_format($perolehan_soal / $total_soal * 100,0);
			// Cocokkan dengan priotitas
			$prioritas = $this->treatment_m->getPrioritas($this->session->id,$data->id)->num_rows();

			$getPrioritas = $this->treatment_m->getMenuHasilBelajar($data->id,$this->session->id)->num_rows();
			if ($getPrioritas == null) {
				// Simpan ke Database
				$this->treatment_m->saveMenuHasilBelajar($data->id,$skor,$prioritas);		
			}
		}
		redirect("treatment/hasilbelajar");
	}
}
