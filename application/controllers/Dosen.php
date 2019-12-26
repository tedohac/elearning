<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dosen extends CI_Controller
    {
        private $dosen_nik;

        public function __construct()
        {
            parent::__construct();
            $this->load->model("users_model");
            $this->load->model("dosens_model");
            
            if($this->session->userdata('user_name')==null || $this->session->userdata('user_role')!="dsn"){
                redirect(site_url('login'));
                return;
            }

            $this->dosen_nik = $this->session->userdata('user_name');
        }

        public function index()
        {
            $this->load->model("perkuliahans_model");
            
            $data['datas'] = $this->perkuliahans_model->getbydosen($this->dosen_nik);

            $this->load->view("index_dsn", $data);
        }

        public function penjadwalan($pkl_id)
        {
            $this->load->model("penjadwalans_model");
            
            $data['detail'] = $this->penjadwalans_model->getDetailByPkl($pkl_id);

            $data['datas'] = $this->penjadwalans_model->getJadwalByPkl($pkl_id);

            $this->load->view("dosen/penjadwalan", $data);
        }

        public function editforum($pjd_id)
        {
            $this->load->model("penjadwalans_model");
            $this->load->library('form_validation');

            $data['detail'] = $this->penjadwalans_model->getDetail($pjd_id);
            $this->form_validation->set_rules($this->penjadwalans_model->rules_forum());
            
            $post = $this->input->post();
            
            if ($this->form_validation->run())
            {
                $content_clean = str_replace("'", "", htmlspecialchars($post["pjd_forumcontent"]));
                $pjd['pjd_id'] = $pjd_id;
                $pjd['pjd_forumcontent'] = $content_clean;
                $pjd['pjd_forumcreated'] = date("Y-m-d h:i:s");
                
                if($this->penjadwalans_model->updateforum($pjd))
                {
                    $this->session->set_flashdata('success', 'Forum berhasil diisi');
                    redirect(site_url('dosen/penjadwalan/'.$data['detail']->pkl_id));
                }
                
                return;
            }
            
            $this->load->view("dosen/forum_edit", $data);
        }
    }