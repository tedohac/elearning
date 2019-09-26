<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastermatkul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
        $this->load->model("matkuls_model");
        
        if($this->session->userdata('user_name')==null && $this->session->userdata('user_role')!="adm"){
            redirect(site_url('login'));
            return;
        }
    }
    
    function autocom()
    {
        $json = [];

        if(!empty($this->input->get("q"))){
            $json = $this->matkuls_model->autocom($this->input->get("q"));
        }
        echo json_encode($json);
    }
}