<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Matkuls_model extends CI_Model
    {
        
        private $_table = "ms_matkul";
        
        function autocom($keyword) {        
            $this->db->like("matkul_nama", $keyword);
            $query = $this->db->select("matkul_id as id, matkul_nama as text")
                        ->limit(10)
                        ->get($this->_table);
            return $query->result();
        }

               public function rules()
        {
            return [
                ['field' => 'matkul_id',
                'label' => 'matkul_id',
                'rules' => 'required'],
                ['field' => 'matkul_nama',
                'label' => 'matkul_nama',
                'rules' => 'required'],
            ];
        }

        public function getall()
        {
            $this->db->from("ms_matkul");
            return $this->db->get()->result();
        }
            
        public function save()
        {
            $post = $this->input->post();
            $this->matkul_id = $post["matkul_id"];
            $this->matkul_nama = $post["matkul_nama"];
            $this->db->insert($this->_table, $this);

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function getById($id)
        {
            $this->db->from("ms_matkul");
            $this->db->where(["matkul_id" => $id]);
            return $this->db->get()->row();
        }
        
        public function update($id)
        {
            $post = $this->input->post();
            $this->matkul_id = $post["matkul_id"];
            $this->matkul_nama = $post["matkul_nama"];
            $this->db->update($this->_table, $this, array('matkul_id' => $id));

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function delete($id)
        {
            $this->db->delete($this->_table, array("matkul_id" => $id));
            
            return ($this->db->affected_rows() > 0) ? true : false;
        }
    }
