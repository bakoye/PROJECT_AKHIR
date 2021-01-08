<?php
defined('BASEPATH') or exit('No direct script access allowed');

class perusahaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Freelance/M_freelance');
        $this->load->model('Perusahaan/M_perusahaan');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'INFREELANCER| Dashboard';
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['nama'];


        $this->load->view('Freelance/header', $data);
        $this->load->view('perusahaan/sidebar', $data);
        $this->load->view('Freelance/topbar', $data);
        $this->load->view('perusahaan/index', $data);
        $this->load->view('Freelance/footer');
        $this->load->view('perusahaan/buat_proyek');
    }
    public function buatproyek()
    {
        $data['title'] = 'INFREELANCER| Dashboard';
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['nama'];


        $this->load->view('Freelance/header', $data);
        $this->load->view('perusahaan/sidebar', $data);
        $this->load->view('Freelance/topbar', $data);
        $this->load->view('perusahaan/buat_proyek', $data);
        $this->load->view('Freelance/footer');
    }
    public function tambahproyek()
    {
        $nama_perusahaan    = $this->input->post('nama_perusahaan');
        $judul              = $this->input->post('judul');
        $kota               = $this->input->post('kota');
        $provinsi           = $this->input->post('provinsi');
        $alamat             = $this->input->post('alamat');
        $bidang_pekerjaan  = $this->input->post('bidang_pekerjaan');
        $deskripsi          = $this->input->post('deskripsi');
        $persyaratan        = $this->input->post('persyaratan');
        $gaji               = $this->input->post('gaji');

        $data = array(
            'nama_perusahaan' => $nama_perusahaan,
            'judul'           => $judul,
            'kota'            => $kota,
            'provinsi'        => $provinsi,
            'alamat'          => $alamat,
            'bidang_pekerjaan' => $bidang_pekerjaan,
            'deskripsi'       => $deskripsi,
            'persyaratan'     => $persyaratan,
            'gaji'            => $gaji,

        );
        $this->M_perusahaan->tambah_data($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Proyek anda sudah terdaftar
		  </div>');
        redirect('perusahaan/buatproyek');
    }
    public function profil()
    {
        $data['freelancer'] = $this->M_freelance->tampil_data()->result();
        $dataa['perusahaan'] = $this->M_perusahaan->tampil_data()->result();
        $data['title'] = 'INFREELANCER| Dashboard';
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();
        $this->load->view('perusahaan/header', $data);
        $this->load->view('perusahaan/sidebar', $data);
        $this->load->view('perusahaan/topbar', $data);

        $this->load->view('perusahaan/profil', $dataa);
        $this->load->view('perusahaan/footer');
    }
}
