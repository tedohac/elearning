<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dosens_model extends CI_Model
    {
        
        private $_table = "ms_dosen";
        private $_userTable = "ms_user";

        public function rules()
        {
            return [
                ['field' => 'dosen_nik',
                'label' => 'NIK',
                'rules' => 'required'],
                ['field' => 'dosen_password',
                'label' => 'Password',
                'rules' => 'required'],
                ['field' => 'repassword',
                'label' => 'Re-Password',
                'rules' => 'required|matches[dosen_password]'],
                ['field' => 'dosen_nama',
                'label' => 'Nama Dosen',
                'rules' => 'required'],
            ];
        }

        public function getall()
        {
            $this->db->from("ms_dosen");
            return $this->db->get()->result();
        }

        public function add()
        {
            $post = $this->input->post();

            $this->dosen_nik = $post["dosen_nik"];
            $this->dosen_user_name = $post["dosen_nik"];
            $this->dosen_nama = $post["dosen_nama"];
            $this->dosen_tempat_lahir = $post["dosen_tempat_lahir"];
            $this->dosen_tanggal_lahir = $post["dosen_tanggal_lahir"];
            $this->dosen_no_hp = $post["dosen_no_hp"];
            $this->dosen_jenis_kelamin = $post["dosen_jenis_kelamin"];
            $this->dosen_alamat = $post["dosen_alamat"];
            $this->db->insert($this->_table, $this);

            return $this->db->affected_rows();
        }

        public function getById($id)
        {
            $this->db->from("ms_dosen");
            $this->db->where(["dosen_nik" => $id]);
            return $this->db->get()->row();
        }
        
        public function update($id)
        {
            $post = $this->input->post();
            $this->dosen_nik = $post["dosen_nik"];
            $this->dosen_user_name = $post["dosen_user_name"];
            $this->dosen_nama = $post["dosen_nama"];
            $this->dosen_tempat_lahir = $post["dosen_tempat_lahir"];
            $this->dosen_tanggal_lahir = $post["dosen_tanggal_lahir"];
            $this->dosen_no_hp = $post["dosen_no_hp"];
            $this->dosen_jenis_kelamin = $post["dosen_jenis_kelamin"];
            $this->dosen_alamat = $post["dosen_alamat"];
            $this->db->update($this->_table, $this, array('dosen_nik' => $id));

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function delete($id)
        {
            $this->db->delete($this->_table, array("dosen_nik" => $id));
            
            return ($this->db->affected_rows() > 0) ? true : false;
        }

        function checknik($dosen_nik)
        {
            return $this->db->where("dosen_nik", $dosen_nik)->count_all_results($this->_table);
        }
    }