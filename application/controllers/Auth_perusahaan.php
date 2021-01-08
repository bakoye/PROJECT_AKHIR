<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_perusahaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function registerperusahaan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[user.nama]', [
            'is_unique' => 'Nama sudah digunakan'
        ]);
        $this->form_validation->set_rules('Email', 'Email', 'required|trim|valid_email|is_unique[user.Email]', [
            'is_unique' => 'Email sudah digunakan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sama',
            'min_length' => 'password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $datap['title'] = 'INFREELANCER|Registrasi';
            $this->load->view('templates/auth_header', $datap);
            $this->load->view('auth/registerperusahaan');
            $this->load->view('templates/auth_footer');
        } else {
            $datap = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                // 'username' => htmlspecialchars($this->input->post('username', true)),
                'Email' => htmlspecialchars($this->input->post('Email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                // 'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                // 'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'role_id' => 3,

                'date_created' => time()

            ];
            $this->db->insert('user', $datap);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Selamat anda sudah terdaftar sebagai user INFREELANCER, silahkan login !
		  </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('Email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Selamat anda sudah keluar !
		  </div>');
        redirect('auth');
    }
}
