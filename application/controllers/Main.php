<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Main extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model("users_model");
            
            if($this->session->userdata('user_name')==null){
                redirect(site_url('login'));
                return;
            }
        }

        public function index()
        {
            $data = array();
            $role = $this->session->userdata('user_role');
            
            if($role=="adm")
                $this->load->view("index_adm", $data);
            elseif($role=="mhs")
                $this->load->view("index_mhs", $data);
            elseif($role=="dsn")
                $this->load->view("index_dsn", $data);
        }
    }