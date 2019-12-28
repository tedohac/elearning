<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Perkuliahans_model extends CI_Model
    {
        
        private $_table = "ms_perkuliahan";

        function autocom($keyword) {        
            $this->db->like("pkl_id", $keyword);
            $query = $this->db->select("pkl_id as id, pkl_id as text")
                        ->limit(10)
                        ->get($this->_table);
            return $query->result();
        }

        
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

        public function getById($id)
        {
            $this->db->from("ms_perkuliahan pkl join ms_matkul m on(pkl.pkl_matkul_id=m.matkul_id) join ms_dosen d on(pkl.pkl_dosen_nik=d.dosen_nik)");
            $this->db->where(["pkl_id" => $id]);
            return $this->db->get()->row();
        }

        public function getbydosen($pkl_dosen_nik)
        {
            $this->db->from("ms_perkuliahan pkl join ms_matkul m on(pkl.pkl_matkul_id=m.matkul_id) join ms_dosen d on(pkl.pkl_dosen_nik=d.dosen_nik)");
            $this->db->where(["pkl_dosen_nik" => $pkl_dosen_nik]);
            return $this->db->get()->result();
        }
        
        public function update($id)
        {
            $post = $this->input->post();
            $this->pkl_matkul_id = $post["pkl_matkul_id"];
            $this->pkl_dosen_nik = $post["pkl_dosen_nik"];
            $this->pkl_hari = $post["pkl_hari"];
            $this->pkl_ruang = $post["pkl_ruang"];
            $this->pkl_mulai = $post["pkl_mulai"];
            $this->pkl_selesai = $post["pkl_selesai"];
            $this->db->update($this->_table, $this, array('pkl_id' => $id));

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function delete($id)
        {
            $this->db->delete($this->_table, array("pkl_id" => $id));
            
            return ($this->db->affected_rows() > 0) ? true : false;
        }
    }