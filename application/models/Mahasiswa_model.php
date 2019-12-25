<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    private $_table = "ms_mahasiswa";

    function autocom($keyword) {        
        $this->db->like("mhs_nama", $keyword);
        $query = $this->db->select("mhs_nim as id, mhs_nama as text")
        ->limit(10)
        ->get($this->_table);
        return $query->result();
    }

    public function getallmahasiswa(){
        return $this->db->get('ms_mahasiswa')->result();
    }

    public function rules()
    {
        return [
            ['field' => 'mhs_nim',
            'label' => 'NIM',
            'rules' => 'required'],
            ['field' => 'mhs_password',
            'label' => 'Password',
            'rules' => 'required'],
            ['field' => 'repassword',
            'label' => 'Re-Password',
            'rules' => 'required|matches[mhs_password]'],
            ['field' => 'mhs_nama',
            'label' => 'Nama',
            'rules' => 'required']
          
        ];
    }

    public function add()
    {
        $post = $this->input->post();
        $this->mhs_nim = $post["mhs_nim"];
        $this->mhs_nama = $post["mhs_nama"];
        $this->mhs_tempat_lahir = $post["mhs_tempat_lahir"];
        $this->mhs_tanggal_lahir = $post["mhs_tanggal_lahir"];
        $this->mhs_no_hp = $post["mhs_no_hp"];
        $this->mhs_jenis_kelamin = $post["mhs_jenis_kelamin"];
        $this->mhs_alamat = $post["mhs_alamat"];
        $this->db->insert($this->_table, $this);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getById($id)
    {
        $this->db->from("ms_mahasiswa");
        $this->db->where(["mhs_nim" => $id]);
        return $this->db->get()->row();
    }
    
    public function update($id)
    {
        $post = $this->input->post();
        $this->mhs_nim = $post["mhs_nim"];
        $this->mhs_nama = $post["mhs_nama"];
        $this->mhs_tempat_lahir = $post["mhs_tempat_lahir"];
        $this->mhs_tanggal_lahir = $post["mhs_tanggal_lahir"];
        $this->mhs_no_hp = $post["mhs_no_hp"];
        $this->mhs_jenis_kelamin = $post["mhs_jenis_kelamin"];
        $this->mhs_alamat = $post["mhs_alamat"];
        $this->db->update($this->_table, $this, array("mhs_nim" => $id));

        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete($id)
    {
        $this->db->delete($this->_table, array("mhs_nim" => $id));
        
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    function checknim($mhs_nim)
    {
        return $this->db->where("mhs_nim", $mhs_nim)->count_all_results($this->_table);
    }
}