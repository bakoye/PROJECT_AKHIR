<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'INFREELANCER|Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->login();
        }
    }
    private function login()
    {
        $email = $this->input->post('Email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['Email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'Email' => $user['Email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('User');
                        # code...
                    } elseif ($user['role_id'] == 3) {
                        redirect('perusahaan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password anda salah, Mohon Maaf
              </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email anda belum Actif sebagai user INFREELANCER, Mohon Maaf
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email anda belum terdaftar sebagai user INFREELANCER, Mohon Maaf
		  </div>');
            redirect('auth');
        }
    }
    public function register()
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
            $data['title'] = 'INFREELANCER|Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                // 'username' => htmlspecialchars($this->input->post('username', true)),
                'Email' => htmlspecialchars($this->input->post('Email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                // 'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                // 'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()

            ];
            $this->db->insert('user', $data);
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
