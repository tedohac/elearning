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
    }