<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model("users_model");
        }


        function index()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules($this->users_model->rules());
            //------------------------------
            // $salt = bin2hex(openssl_random_pseudo_bytes(22));
            // $hash = crypt("mercu", $salt);
            // echo $hash;
            //------------------------------

            if ($this->form_validation->run()) {
                if($this->users_model->otentikasi())
                {
                    $post = $this->input->post();

                    $role = $this->users_model->getrole($post["user_name"]);

                    $data_session = array(
                        'user_name' => $post["user_name"],
                        'user_role' => $role
                    );
                    
                    $this->session->set_userdata($data_session);

                    redirect(site_url('main'));
        
               }else{
                   $this->session->set_flashdata('error', 'Invalid username or password');
                   redirect(site_url('login'));
                   return;
               }
            }

            $this->load->view("login");
        }

        function logout(){
            $this->session->sess_destroy();
            redirect(site_url());
        }

    }