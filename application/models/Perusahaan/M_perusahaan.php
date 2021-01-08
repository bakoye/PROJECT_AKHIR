<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_perusahaan extends CI_Model
{
    public function tampilin_user()
    {
        return $this->db->get('perusahaan');
    }
    public function tampil_user()
    {
        return $this->db->get('buat_lowongan');
    }
    public function tampil_data()
    {

        return $this->db->get('buat_lowongan');
        $data['buat_lowongan'] = $this->db->get_where('buat_lowongan', ['perusahaan_id' =>
        $this->session->userdata('perusahaan_id')])->row_array();
    }
    public function tambah_data($data)
    {
        return $this->db->insert('buat_lowongan', $data);
    }
    public function tambah_data2($data)
    {
        return $this->db->insert('perusahaan', $data);
    }
    public function detail_data($id)
    {
        $query = $this->db->get_where('perusahaan', array('id' => $id))->row();
        return $query;
    }
    public function detaili_data($perusahaan_id)
    {
        $query = $this->db->get_where('buat_lowongan', array('perusahaan_id' => $perusahaan_id))->row();
        return $query;
    }
    public function hapus_data2($where)
    {
        $this->db->where($where);
        $this->db->delete('perusahaan', $where);
    }
}
