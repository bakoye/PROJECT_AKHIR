<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Freelance/M_freelance');
        $this->load->model('Perusahaan/M_perusahaan');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
    }
    public function index()
    {

        $data['title'] = 'INFREELANCER| Dashboard';
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();

        $this->load->view('Freelance/header', $data);
        $this->load->view('Freelance/sidebar', $data);
        $this->load->view('Freelance/topbar', $data);
        $this->load->view('Freelance/index', $data);
        $this->load->view('Freelance/footer');
    }
    public function CV()
    {
        $data['freelancer'] = $this->M_freelance->tampil_data()->result();
        $data['title'] = 'INFREELANCER| Dashboard';
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();
        $this->load->view('Freelance/header', $data);
        $this->load->view('Freelance/sidebar', $data);
        $this->load->view('Freelance/topbar', $data);
        $this->load->view('Freelance/CV');
        $this->load->view('Freelance/footer');
    }
    public function carilowongan()
    {
        // $data['perusahaan'] = $this->M_perusahaan->tampil_data()->result();
        $data['title'] = 'INFREELANCER| Dashboard';
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();
        $data['buat_lowongan'] = $this->M_perusahaan->tampil_data()->result();
        $this->load->view('Freelance/header', $data);
        $this->load->view('Freelance/sidebar', $data);
        $this->load->view('Freelance/topbar', $data);
        $this->load->view('Freelance/cari_lowongan', $data);
        $this->load->view('Freelance/footer');
    }

    public function editprofil()
    {
        // $data['perusahaan'] = $this->M_perusahaan->tampil_data()->result();
        $data['freelancer'] = $this->M_freelance->tampil_data()->result();
        $data['title'] = 'INFREELANCER| Dashboard';
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();
        $this->load->view('Freelance/header', $data);
        $this->load->view('Freelance/sidebar', $data);
        $this->load->view('Freelance/topbar', $data);
        $this->load->view('Freelance/editprofil', $data);
        $this->load->view('Freelance/footer');

        function edit($id)
        {
            $where = array('id' => $id);
            $data['user'] = $this->M_freelance->edit_data($where, 'freelancer')->result();
            // $this->load->view('editprofil', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Proyek anda sudah terdaftar
		  </div>');
            redirect('User/editprofil');
        }
        function update()
        {

            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $Email = $this->input->post('Email');

            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'Email' => $Email
            );

            $where = array(
                'id' => $id
            );

            $this->M_data->update_data($where, $data, 'user');
            redirect('User/CV');
        }
    }
    public function detail($perusahaan_id)
    {
        $this->load->model('M_freelance');
        $detail = $this->M_perusahaan->detaili_data($perusahaan_id);
        $data['detail'] = $detail;

        $data['title'] = 'INFREELANCER| Dashboard';
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();
        $data['freelancer'] = $this->M_freelance->tampil_user()->result();
        $this->load->view('Freelance/header', $data);
        $this->load->view('Freelance/sidebar', $data);
        $this->load->view('Freelance/topbar', $data);
        $this->load->view('Freelance/detail', $data);
        $this->load->view('Freelance/footer');
    }
}
