<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Perkuliahans_model extends CI_Model
    {
        
        private $_table = "ms_perkuliahan";
        
        public function rules()
        {
            return [
                ['field' => 'pkl_matkul_id',
                'label' => 'Matkul',
                'rules' => 'required'],
                ['field' => 'pkl_dosen_nik',
                'label' => 'Dosen',
                'rules' => 'required'],
                ['field' => 'pkl_ruang',
                'label' => 'Ruang',
                'rules' => 'required'],
                ['field' => 'pkl_hari',
                'label' => 'Hari',
                'rules' => 'required'],
                ['field' => 'pkl_mulai',
                'label' => 'Mulai',
                'rules' => 'required'],
                ['field' => 'pkl_selesai',
                'label' => 'Selesai',
                'rules' => 'required']
            ];
        }

        public function getall()
        {
            $this->db->from("ms_perkuliahan pkl join ms_matkul m on(pkl.pkl_matkul_id=m.matkul_id) join ms_dosen d on(pkl.pkl_dosen_nik=d.dosen_nik)");
            return $this->db->get()->result();
        }
            
        public function save()
        {
            $post = $this->input->post();
            $this->pkl_matkul_id = $post["pkl_matkul_id"];
            $this->pkl_dosen_nik = $post["pkl_dosen_nik"];
            $this->pkl_hari = $post["pkl_hari"];
            $this->pkl_ruang = $post["pkl_ruang"];
            $this->pkl_mulai = $post["pkl_mulai"];
            $this->pkl_selesai = $post["pkl_selesai"];
            $this->db->insert($this->_table, $this);

            return ($this->db->affected_rows() > 0) ? true : false;
        }
    }