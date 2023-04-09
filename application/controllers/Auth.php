<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validation_m');
    }

    /*
		Template halaman login
	*/
    public function splash()
    {
        checkLogged();
        $this->template->load('template/full', 'p/splash');
    }

    public function login()
    {
        checkLogged();
        $this->template->load('template/full', 'page/login/main');
    }

    public function loginOTP()
    {
        checkLogged();
        $this->template->load('template/full', 'page/login/otp');
    }

    public function loginOTPConfirm()
    {
        checkLogged();
        $this->template->load('template/full', 'page/login/validation_otp');
    }

    /*
		Controller Pemrosesan
	*/
    public function process()
    {
        $post = $this->input->post(null, TRUE);

        if (isset($post['login'])) {
            $query = $this->validation_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'nama' => $row->nama,
                    'hp' => $row->hp,
                    'email' => $row->email,
                    'tempat_lahir' => $row->tempat_lahir,
                    'tgl_lahir' => $row->tgl_lahir,
                    'domisili' => $row->domisili,
                    'tipe_user' => $row->tipe_user,
                    'gaya_belajar' => $row->gaya_belajar,
                );
                $this->session->set_userdata($params);
                $this->validation_m->saveLog();
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('danger', 'Login Gagal. Pastikan email dan password sudah benar');
                redirect("auth/login");
            }
        } else {
            echo "Mau Main2 ya";
            redirect('auth/login');
        }
    }

    /*
		Perintah login by OTP.
		Cukup arahkan ke url base_url(auth/loginOTP);
	*/
    public function checkOTP()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('validation_m');
            $this->load->library('wa');

            $query = $this->validation_m->cekHp($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id' => $row->id,
                    'nama' => $row->nama,
                    'email' => $row->email,
                    'hp' => $row->hp,
                );
                $params['otp'] = rand(100000, 999999);
                $this->session->set_userdata($params);
                $kalimat = "*Kode OTP* KAMU : " . $params['otp'] . "\n\nKM LEARNING MANAGEMENT SYSTEM, Aplikasi Pembelajaran Online berbasis Knowledge Management";
                $this->wa->send(($post['hp']), $kalimat);
                $this->validation_m->insertOtp($params);
                $this->session->set_flashdata('success', 'Kode OTP telah Dikirim Melalui WA');
                redirect('auth/loginOTPConfirm');
            } else {
                $this->session->set_flashdata('danger', 'Nomor tidak ditemukan');
                redirect("auth/loginOTP");
            }
        } else {
            echo "Mau Main2 ya";
            redirect('auth/login');
        }
    }

    public function validationOTP()
    {
        $post = $this->input->post(null, TRUE);

        if (isset($post['login'])) {
            $this->load->model('validation_m');
            $query = $this->validation_m->validationOTP($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'nama' => $row->nama,
                    'hp' => $row->hp,
                    'email' => $row->email,
                    'tempat_lahir' => $row->tempat_lahir,
                    'tgl_lahir' => $row->tgl_lahir,
                    'domisili' => $row->domisili,
                    'tipe_user' => $row->tipe_user,
                    'gaya_belajar' => $row->gaya_belajar,
                );
                $this->session->set_userdata($params);
                $this->validation_m->saveLog();
                $this->session->set_flashdata('success', 'Login Berhasil');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('danger', 'Kode OTP Tidak Valid. Pastikan KODE OTP	 yang diinputkan benar)');
                redirect("auth/login");
            }
        } else {
            echo "Mau Main2 ya";
            redirect('auth/login');
        }
    }

    /*
		Perintah login by Google.
		Cukup arahkan ke url base_url(auth/google);
	*/
    function google()
    {
        // Konfigurasi kredensial google
        $clientID = '916270909408-mdb6k20uf85s5oeu0hfdmhsmude5kjnh.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = base_url() . 'auth/google';

        // Buat Perintah Request ke API Google
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");

        // create Client Request to access Google API
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");

        // authenticate code from Google OAuth Flow
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email =  $google_account_info->email;

            $query = $this->validation_m->loginGoogle($email);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'nama' => $row->nama,
                    'hp' => $row->hp,
                    'email' => $row->email,
                    'tempat_lahir' => $row->tempat_lahir,
                    'tgl_lahir' => $row->tgl_lahir,
                    'domisili' => $row->domisili,
                    'tipe_user' => $row->tipe_user,
                    'gaya_belajar' => $row->gaya_belajar,
                );
                $this->session->set_userdata($params);
                $this->validation_m->saveLog();
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('danger', 'Email Tidak Terdaftar');
                // Buat akun menggunakan email diatas
                $this->validation_m->makeAccountWithGoogle($email);
                $query = $this->validation_m->loginGoogle($email);
                if ($query->num_rows() > 0) {
                    $row = $query->row();
                    $params = array(
                        'id' => $row->id,
                        'username' => $row->username,
                        'nama' => $row->nama,
                        'hp' => $row->hp,
                        'email' => $row->email,
                        'tempat_lahir' => $row->tempat_lahir,
                        'tgl_lahir' => $row->tgl_lahir,
                        'domisili' => $row->domisili,
                        'tipe_user' => $row->tipe_user,
                        'gaya_belajar' => $row->gaya_belajar,
                    );
                    $this->session->set_userdata($params);
                    $this->validation_m->saveLog();
                    redirect('dashboard');
                }
                redirect("auth/login");
            }
            // now you can use this profile info to create account in your website and make user logged in.
        } else {
            redirect($client->createAuthUrl());
        }
    }

    public function logout()
    {
        $params = array('id', 'username', 'tipe_user');
        $this->session->unset_userdata($params);
        $this->session->set_flashdata('success', 'Berhasil Logout');
        redirect('auth/login');
    }
}
