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
            $this->load->view("index", $data);
        }
    }