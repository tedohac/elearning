<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dosens_model extends CI_Model
    {
        
        private $_table = "ms_dosen";
        
        function autocom($keyword) {        
            $this->db->like("dosen_nama", $keyword);
            $query = $this->db->select("dosen_nik as id, dosen_nama as text")
                        ->limit(10)
                        ->get($this->_table);
            return $query->result();
        }
    }