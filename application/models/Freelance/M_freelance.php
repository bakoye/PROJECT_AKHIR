<?php

class M_freelance extends CI_Model
{

    public function tampil_user()
    {
        return $this->db->get('freelancer');
    }
    public function tampil_data()
    {
        return $this->db->get('freelancer');
        $data['freelancer'] = $this->db->get_where('freelancer', ['id_fre' =>
        $this->session->userdata('id_fre')])->row_array();
    }
    public function tambah_data($data)
    {
        return $this->db->insert('user', $data);
    }
    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('freelancer', $where);
    }
    public function hapus_data2($where)
    {
        $this->db->where($where);
        $this->db->delete('perusahaan', $where);
    }
    public function tambah($data)
    {
        $insert_data['nama_lengkap'] = $data['nama_lengkap'];
        $insert_data['alamat'] = $data['alamat'];
        $insert_data['kota'] = $data['kota'];
        $insert_data['provinsi'] = $data['provinsi'];
        $insert_data['no_telp'] = $data['no_telp'];
        $insert_data['jenis_kelamin'] = $data['jenis_kelamin'];
        $insert_data['agama'] = $data['agama'];
        $insert_data['image'] = $data['image'];
        $query = $this->db->insert('freelancer', $insert_data);
    }
    public function tambah2($data)
    {
        return $this->db->insert('freelancer', $data);
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function _uploadImage()
    {
        $config['upload_path']          = '../assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img')) {
            return $this->upload->data("file_name");
        }

        // return "default.jpg";
    }
    public function detail_data($id_fre)
    {
        $query = $this->db->get_where('freelancer', array('id_fre' => $id_fre))->row();
        return $query;
    }
}
