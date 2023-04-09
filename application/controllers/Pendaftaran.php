<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkLogged();
        
        $this->load->model('pendaftaran_m');
        $this->load->library('encryption');
        $this->load->library("wa");

        //Agar tidak ada form resubmission
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    // LOAD DATA AJA
    public function index()
    {
        check_not_login();
        redirect('pendaftaran/pendaftaran_data');
    }

    public function data()
    {
        $previllage = 3;
        check_super_user($this->session->tipe_user, $previllage);
        $data['menu'] = "Data Pendaftar";
        $data['row'] = $this->pendaftaran_m->getNonActive();
        $this->template->load('template/tanpa-buttom', 'pendaftaran/data', $data);
    }

    public function dataAll()
    {
        $previllage = 3;
        check_super_user($this->session->tipe_user, $previllage);
        $data['menu'] = "Data Pengguna";
        $data['row'] = $this->pendaftaran_m->get();
        $this->template->load('template/tanpa-buttom', 'pendaftaran/dataAll', $data);
    }

    public function detail()
    {
        $previllage = 3;
        check_super_user($this->session->tipe_user, $previllage);
        $id = $this->uri->segment(3);
        $data['menu'] = "Detail Pendaftar";
        $data['row'] = $this->pendaftaran_m->get($id)->row();
        $this->template->load('template/dashboard', 'pendaftaran/pendaftaran_detail', $data);
    }

    // FORM EKSEKUSI
    public function tambah()
    {
        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('username', 'username', 'min_length[3]|is_unique[tb_user.username]|max_length[20]|alpha_dash');
        $this->form_validation->set_rules('email', 'email', 'min_length[3]|is_unique[tb_user.email]');
        $this->form_validation->set_rules('hp', 'hp', 'min_length[3]|is_unique[tb_user.hp]|max_length[20]|alpha_dash');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="m-1 badge rounded-pill bg-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Pendaftaran User";
            $this->template->load('template/full', 'pendaftaran/tambah', $data);
        } else {
            $post = $this->input->post(null, TRUE);

            $this->pendaftaran_m->simpan($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Pendaftaran Berhasil, silahkan login menggunakan nomor HP yang telah anda daftarkan');
            }
            $kalimat = "Terima kasih, *" . $post['nama'] . "*. Anda telah melakukan pendaftaran pada sistem Knowledge Management System Penelitian. \n \n" . "Berikut Informasi akun anda : \n\nEmail : " . $post['email'] . "\nHP terdaftar : " . $post['hp'] . "\n \nSelamat menjelajah.\nSalam Hangat dari saya, *Fitrah Izul Falaq* \nhttps://ceo.bikinkarya.com";
            $this->wa->send($post['hp'], $kalimat);
            redirect('auth/login');
        }
    }


    //PERINTAH EKSEKUSI DATA
    function hapus()
    {
        $previllage = 3;
        check_super_user($this->session->tipe_user, $previllage);

        $id = $this->uri->segment(3);
        $this->pendaftaran_m->hapus($id);
        $this->session->set_flashdata('danger', 'Berhasil Di Hapus');
        redirect('pendaftaran/pendaftaran_data');
    }

    function acc()
    {
        $id = $this->uri->segment(3);
        $this->pendaftaran_m->acc($id);
        $this->session->set_flashdata('success', 'Pengguna Berhasil Di ACC');
        redirect('pendaftaran/data');
    }

    public function forget()
    {
        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[50]');
        $this->form_validation->set_rules('hp', 'hp', 'min_length[11]|max_length[15]');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Konfirmasi WA";
            $this->template->load('template/full', 'pendaftaran/forget', $data);
        } else {
            $post = $this->input->post(null, TRUE);

            $data = $this->pendaftaran_m->getByPhone($post['hp']);
            if ($data->num_rows() != null) {
                $kalimat = "Identitas Akun *KM Learning System anda sebagai berikut* \n\nNama : " . $data->row("nama") . "\nEmail : " . $data->row("email") . "\nNo HP: " . $data->row("hp") . "\n\nJika anda lupa password, bisa login menggunakan No HP yang telah didaftarkan.";
                $this->wa->send($post['hp'], $kalimat);
                $this->session->set_flashdata('success', 'Informasi akun berhasil dikirim melalui Whatsapp');
                redirect("pendaftaran/forget");
            } else {
                $this->session->set_flashdata('warning', 'Nomor Tidak Terdaftar');
                redirect("pendaftaran/forget");
            }
        }
    }
}
