<?php


class Crud extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->helper('url');
    }

    function index()
    {
        $data['user'] = $this->M_data->tampil_data()->result();
        $this->load->view('CRUD', $data);
    }

    function tambah()
    {
        $this->load->view('v_input');
    }

    function tambah_aksi()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
        $this->m_data->input_data($data, 'user');
        redirect('crud/index');
    }

    function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_data->hapus_data($where, 'user');
        redirect('crud/index');
    }

    function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();
        $where = array('id' => $id);
        $data['user'] = $this->m_data->edit_data($where, 'user')->result();
        $this->load->view('v_edit', $data);
    }
    function update()
    {
        $data['user'] = $this->db->get_where('user', ['Email' =>
        $this->session->userdata('Email')])->row_array();

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
        redirect('Crud/index');
    }
}
