<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Users_model extends CI_Model
    {
        
        private $_table = "appcenter_user";
        
        public function rules()
        {
            return [
                ['field' => 'user_name',
                'label' => 'Username',
                'rules' => 'required'],
                ['field' => 'user_pass',
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

            $data = $this->db->select("user_pass")->where($array)->get($this->_table)->row_array();

            if(empty($data)) return false;
            
            if ($data["user_pass"] == crypt($post["user_pass"], $data["user_pass"])) return true;
            else return false;
        }

        function authorisasi()
        {
            $post = $this->input->post();

            $array = array('user_name' => $post["user_name"]);
            $data = $this->db->select("user_role")->where($array)->get("cmip_user")->row_array();
    
            return $data["user_role"];
        }
        
        function cekrole($user_name, $role_code)
        {
            $array = array('auth_user_name' => $user_name, 'auth_role_code' => $role_code, );
            $data = $this->db->where($array)->count_all_results("appcenter_auth");

            if ($data > 0) return true;
            else return false;
        }

        function appaccess($user_name, $role_cat)
        {
            $this->db->where("auth_user_name", $user_name);
            $this->db->where("role_cat", $role_cat);
            $this->db->from("appcenter_role r join appcenter_auth a on(r.role_code=a.auth_role_code)");
            return $this->db->get()->result();
        }

        function appdetail($role_code)
        {
            $this->db->where("role_code", $role_code);
            return $this->db->get("appcenter_role")->row();
        }

        function iskey($user_name)
        {
            $this->db->where("user_name", $user_name);
            $userdetail = $this->db->get($this->_table)->row();

            if ($userdetail->user_status=="2") return true;
            else return false;
        }

        function getPriviledge($user_name)
        {
            $this->db->where("user_name", $user_name);
            return $this->db->get($this->_table)->row()->user_priviledge;
        }
    }