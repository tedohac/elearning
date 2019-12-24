<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Users_model extends CI_Model
    {
        
        private $_table = "ms_user";
        
        public function rules()
        {
            return [
                ['field' => 'user_name',
                'label' => 'Username',
                'rules' => 'required'],
                ['field' => 'user_password',
                'label' => 'Password',
                'rules' => 'required']
            ];
        }

        function otentikasi()
        {
            $post = $this->input->post();

            $array = array(
                'user_name' => $post["user_name"],
                'user_status !=' => "0"
            );

            $data = $this->db->select("user_password")->where($array)->get($this->_table)->row_array();

            if(empty($data)) return false;
            
            if ($data["user_password"] == crypt($post["user_password"], $data["user_password"])) return true;
            else return false;
        }
        
        function cekrole($user_name, $user_role)
        {
            $array = array('user_name' => $user_name, 'user_role' => $user_role);
            $data = $this->db->where($array)->count_all_results($this->_table);

            if ($data > 0) return true;
            else return false;
        }
        
        function getrole($user_name)
        {
            return $this->db->select("user_role")->where("user_name", $user_name)->get($this->_table)->row()->user_role;
        }

        function checkusername($user_name)
        {
            return $this->db->where("user_name", $user_name)->count_all_results($this->_table);
        }

        function add($role)
        {
            $data = $this->input->post();
            $post_user['user_name'] = $data['user_name'];
            $post_user['user_password'] = ($data['dosen_password']);
            $post_user['user_role'] = $role;
            $post_user['user_status'] = "1";
            $this->db->insert($this->_table, $post_user);

            return $this->db->affected_rows();
        }

        function addDosen($role)
        {
            $data = $this->input->post();
            $post_user['user_name'] = $data['dosen_nik'];
            $post_user['user_password'] = ($data['dosen_password']);
            $post_user['user_role'] = $role;
            $post_user['user_status'] = "1";
            $this->db->insert($this->_table, $post_user);

            return $this->db->affected_rows();
        }
    }