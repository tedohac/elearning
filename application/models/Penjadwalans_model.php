<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Penjadwalans_model extends CI_Model
    {
        
        private $_table = "ms_penjadwalan";
        function autocom($keyword) {        
            $this->db->like("pjd_id", $keyword);
            $query = $this->db->select("pjd_id as text")
                        ->limit(10)
                        ->get($this->_table);
            return $query->result();
        }

        public function rules()
        {
            return [
                ['field' => 'pjd_pkl_id',
                'label' => 'ID Perkuliahan',
                'rules' => 'required'],
                ['field' => 'pjd_mhs_nim',
                'label' => 'NIM',
                'rules' => 'required']
            ];
        }

        public function getall()
        {
            $this->db->from("ms_penjadwalan pjd join ms_perkuliahan pkl on(pjd.pjd_pkl_id=pkl.pkl_id) join ms_mahasiswa m on(pjd.pjd_mhs_nim=m.mhs_nim)");
            return $this->db->get()->result();
        }
            
        public function save()
        {
            $post = $this->input->post();
            $this->pjd_pkl_id = $post["pjd_pkl_id"];
            $this->pjd_mhs_nim = $post["pjd_mhs_nim"];
            $this->db->insert($this->_table, $this);

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function getById($id)
        {
            $this->db->from("ms_penjadwalan pjd join ms_perkuliahan pkl on(pjd.pjd_pkl_id=pkl.pkl_id) join ms_mahasiswa mhs on(pjd.pjd_mhs_nim=mhs.mhs_nim)");
            $this->db->where(["pjd_id" => $id]);
            return $this->db->get()->row();
        }
        
        public function update($id)
        {
            $post = $this->input->post();
            $this->pjd_pkl_id = $post["pjd_pkl_id"];
            $this->pjd_mhs_nim = $post["pjd_mhs_nim"];
            $this->db->update($this->_table, $this, array('pjd_id' => $id));

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function delete($id)
        {
            $this->db->delete($this->_table, array("pjd_id" => $id));
            
            return ($this->db->affected_rows() > 0) ? true : false;
        }
    }