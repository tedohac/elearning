<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Penjadwalans_model extends CI_Model
    {
        
        private $_table = "ms_penjadwalan";

        public function rules()
        {
            return [
                ['field' => 'pjd_pkl_id',
                'label' => 'ID Perkuliahan',
                'rules' => 'required'],
                ['field' => 'pjd_tglmulai',
                'label' => 'Tanggal Mulai',
                'rules' => 'required'],
                ['field' => 'pjd_tglselesai',
                'label' => 'Tanggal Selesai',
                'rules' => 'required'],
                ['field' => 'pjd_pertemuan',
                'label' => 'Pertemuan',
                'rules' => 'required|numeric']
            ];
        }

        public function rules_forum()
        {
            return [
                ['field' => 'pjd_forumcontent',
                'label' => 'Konten',
                'rules' => 'required'],
            ];
        }

        public function rules_modul()
        {
            return [
                ['field' => 'pjd_modulurl',
                'label' => 'Modul',
                'rules' => 'trim|xss_clean'],
            ];
        }

        public function getall()
        {
            $this->db->from("ms_penjadwalan pjd join ms_perkuliahan pkl on(pjd.pjd_pkl_id=pkl.pkl_id)");
            return $this->db->get()->result();
        }
            
        public function save()
        {
            $post = $this->input->post();
            $this->pjd_pkl_id = $post["pjd_pkl_id"];
            $this->pjd_tglmulai = $post["pjd_tglmulai"];
            $this->pjd_tglselesai = $post["pjd_tglselesai"];
            $this->pjd_pertemuan = $post["pjd_pertemuan"];
            $this->db->insert($this->_table, $this);

            return ($this->db->affected_rows() > 0) ? true : false;
        }
        
        public function getById($id)
        {
            $this->db->from("ms_penjadwalan pjd join ms_perkuliahan pkl on(pjd.pjd_pkl_id=pkl.pkl_id)");
            $this->db->where(["pjd_id" => $id]);
            return $this->db->get()->row();
        }

        public function getDetailByPkl($pjd_pkl_id)
        {
            $this->db->from("ms_penjadwalan pjd join ms_perkuliahan pkl on(pjd.pjd_pkl_id=pkl.pkl_id) join ms_matkul m on(pkl.pkl_matkul_id=m.matkul_id) join ms_dosen d on(pkl.pkl_dosen_nik=d.dosen_nik)");
            $this->db->where(["pjd.pjd_pkl_id" => $pjd_pkl_id]);
            return $this->db->get()->row();
        }

        public function getDetail($pjd_id)
        {
            $this->db->from("ms_penjadwalan pjd join ms_perkuliahan pkl on(pjd.pjd_pkl_id=pkl.pkl_id) join ms_matkul m on(pkl.pkl_matkul_id=m.matkul_id) join ms_dosen d on(pkl.pkl_dosen_nik=d.dosen_nik)");
            $this->db->where(["pjd_id" => $pjd_id]);
            return $this->db->get()->row();
        }
        
        public function getJadwalByPkl($pjd_pkl_id)
        {
            $this->db->from("ms_penjadwalan pjd join ms_perkuliahan pkl on(pjd.pjd_pkl_id=pkl.pkl_id)");
            $this->db->where(["pjd.pjd_pkl_id" => $pjd_pkl_id]);
            $this->db->order_by("pjd_tglmulai asc");
            return $this->db->get()->result();
        }
        
        public function update($id)
        {
            $post = $this->input->post();
            $this->pjd_pkl_id = $post["pjd_pkl_id"];
            $this->pjd_tglmulai = $post["pjd_tglmulai"];
            $this->pjd_tglselesai = $post["pjd_tglselesai"];
            $this->db->update($this->_table, $this, array('pjd_id' => $id));

            return ($this->db->affected_rows() > 0) ? true : false;
        }
        
        public function updateforum($data)
        {
            $this->pjd_forumcontent = $data["pjd_forumcontent"];
            $this->pjd_forumcreated = $data["pjd_forumcreated"];
            $this->db->update($this->_table, $this, array('pjd_id' => $data['pjd_id']));

            return ($this->db->affected_rows() > 0) ? true : false;
        }
        
        public function updatemodul($data)
        {
            $this->pjd_modulurl = $data["pjd_modulurl"];
            $this->pjd_modulcreated = $data["pjd_modulcreated"];
            $this->db->update($this->_table, $this, array('pjd_id' => $data['pjd_id']));

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function delete($id)
        {
            $this->db->delete($this->_table, array("pjd_id" => $id));
            
            return ($this->db->affected_rows() > 0) ? true : false;
        }
    }