<?php

function test($x)
{
	var_dump($x);
	die();
}

// Cek Sudah Login
function checkLogged()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('username');
	if ($user_session) {
		redirect('dashboard');
	}
}

// Cek Harus Login
function checkLogin()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('username');
	if (!$user_session) {
		redirect('auth/login');
	}
}

function checkGayaBelajar()
{
	$ci = &get_instance();
	$ci->load->model("treatment_m");
	$user_session = $ci->session->userdata('gaya_belajar');
	if (!$user_session and $ci->treatment_m->getGayaBelajar()->row("gaya_belajar") == null) {
		$ci->session->set_flashdata('danger', 'Yuk selesaikan tes berikut untuk mengetahui gaya belajar kamu');
		redirect('treatment/gayaBelajar');
	}
}

function checkPreTest($id)
{
	$ci = &get_instance();
	$ci->db->from('tb_penilaian_pretest');
	$ci->db->where('user_id',$id);
	$query = $ci->db->get();
	if ($query->num_rows() == null) {
		$ci->session->set_flashdata('danger', 'Bantu kami menyajikan materi sesuai kebutuhan dan keinginanmu dengan mengisi pre-test berikut ya....');
		redirect('treatment/preTest');
	}
}

function checkPilihanMateri($id)
{
	$ci = &get_instance();
	$ci->db->from('tb_materi_pilihan');
	$ci->db->where('user_id',$id);
	$query = $ci->db->get();
	if ($query->num_rows() == null) {
		redirect('treatment/materiPilihan');
	}
}

function checkHp($id)
{
	$ci = &get_instance();
	$ci->db->from('tb_user');
	$ci->db->where('id',$id);
	$query = $ci->db->get();
	if ($query->row("hp") == null) {
		redirect('profil/setHP/'.$id);
	}
	
	if ($query->row("domisili") == null) {
		$ci->session->set_flashdata('success', 'Akun berhasil dibuat. Selamat Belajar');
		redirect('profil/edit/'.$id);
	}
}

function isMe($id, $user_id)
{
	$ci = &get_instance();
	if ($id != $user_id) {
		$ci->session->set_flashdata('warning', 'Hanya Bisa mengedit miliknya sendiri');
		redirect('dashboard');
	}
}

/*
	AKSES MINIMAL
	Fungsi untuk memfavalidasi hak Akses yang dibutuhkan pada masing-masing user
	Kode akses :
		1. Pengguna
		2. Widyaiswara
		3. Admin
		4. Super User

	penulisan :
	akses("level")
	Ex: akses("tp")
*/
function akses($level)
{
	$ci = &get_instance();
	// Level Akses
	if ($level == "pengguna") {
		$level = "1";
	} else if ($level == "widyaiswara") {
		$level = "2";
	} else if ($level == "admin") {
		$level = "3";
	} else {
		$level = "1";
	}
	// Kondisi Sesuai Level
	if ($ci->session->userdata('tipe_user') < $level) {
		redirect('auth/login');
	}
}

/*
	Memberi batasan waktu untuk melakukan pengisian
	Penulisan dengan cukup dengan tanggal mulai dan tanggal akhir dengan format Ymd

	Ex : timevalidation("20221220","20221225")
	Artinya, dimulai tanggal 20 Desember dan berakhir tanggal 25 Desember
*/
function timeValidation($start, $end, $redirect)
{
	$ci = &get_instance();
	if (date("Ymd") > date("Ymd", strtotime($start)) && date("Ymd") < date("Ymd", strtotime($end))) {
	} else {
		$ci->session->set_flashdata('danger', 'Waktu Belum Dimulai atau Sudah Melewati Batas');
		redirect($redirect);
	}
}
