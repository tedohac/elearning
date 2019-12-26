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
                redirect(site_url('main/dosen'));
        }

        public function dosen()
        {
            if($this->session->userdata('user_name')==null || $this->session->userdata('user_role')!="dsn"){
                redirect(site_url('login'));
                return;
            }

            $this->load->model("dosens_model");
            $this->load->model("perkuliahans_model");

            $dosen_nik = $this->session->userdata('user_name');
            
            $data['datas'] = $this->perkuliahans_model->getbydosen($dosen_nik);

            $this->load->view("index_dsn", $data);
        }
    }