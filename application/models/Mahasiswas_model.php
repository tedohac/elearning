<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Mahasiswas_model extends CI_Model
    {
        
        private $_table = "ms_mahasiswa";
        
        function autocom($keyword) {        
            $this->db->like("mhs_nim", $keyword);
            $query = $this->db->select("mhs_nim as id, mhs_nama as text")
                        ->limit(10)
                        ->get($this->_table);
            return $query->result();
        }

        public function rules()
        {
            return [
                ['field' => 'mhs_nim',
                'label' => 'NIM',
                'rules' => 'required'],
                ['field' => 'mhs_user_name',
                'label' => 'Username',
                'rules' => 'required'],
                ['field' => 'mhs_nama',
                'label' => 'Nama',
                'rules' => 'required'],
                ['field' => 'mhs_tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required'],
                ['field' => 'mhs_tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'],
                ['field' => 'mhs_jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'],
                ['field' => 'mhs_no_hp',
                'label' => 'HP',
                'rules' => 'required'],
                ['field' => 'mhs_alamat',
                'label' => 'Alamat',
                'rules' => 'required']
            ];
        }

        public function getall()
        {
            $this->db->from("ms_mahasiswa");
            return $this->db->get()->result();
        }

         public function getById($id)
        {
            $this->db->from("ms_mahasiswa");
            $this->db->where(["mhs_nim" => $id]);
            return $this->db->get()->row();
        }
    }