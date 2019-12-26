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
            $data['nik'] = $this->dosen_nik;
            $this->load->model("perkuliahans_model");
            
            $data['datas'] = $this->perkuliahans_model->getbydosen($this->dosen_nik);

            $this->load->view("index_dsn", $data);
        }

        public function penjadwalan($pkl_id)
        {
            $data['nik'] = $this->dosen_nik;
            $this->load->model("penjadwalans_model");
            
            $data['detail'] = $this->penjadwalans_model->getDetailByPkl($pkl_id);

            $data['datas'] = $this->penjadwalans_model->getJadwalByPkl($pkl_id);

            $this->load->view("dosen/penjadwalan", $data);
        }

        public function editforum($pjd_id)
        {
            $data['nik'] = $this->dosen_nik;
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
                    $this->session->set_flashdata('success', 'Berhasil menyimpan forum');
                    redirect(site_url('dosen/penjadwalan/'.$data['detail']->pkl_id));
                }
                else
                {
                    $this->session->set_flashdata('success', 'Gagal menyimpan forum');
                    redirect(site_url('dosen/penjadwalan/'.$data['detail']->pkl_id));
                }
                
                return;
            }
            
            $this->load->view("dosen/forum_edit", $data);
        }

        public function editmodul($pjd_id)
        {
            $data['nik'] = $this->dosen_nik;
            $this->load->model("penjadwalans_model");
            $this->load->library('form_validation');

            $data['detail'] = $this->penjadwalans_model->getDetail($pjd_id);
            $this->form_validation->set_rules($this->penjadwalans_model->rules_modul());
            
            $post = $this->input->post();

            if ($this->form_validation->run())
            {

                $config['upload_path']          = './upload/modul/';
                $config['allowed_types']        = 'pdf';
                $config['file_name']            = 'modul-pertemuan-'.$data['detail']->pjd_pertemuan;
                $config['overwrite']			= true;
                $config['max_size']             = 2048;
                
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('pjd_modulurl')) 
                {    
                    $pjd['pjd_id'] = $pjd_id;
                    $pjd['pjd_modulurl'] = $this->upload->data("file_name");
                    $pjd['pjd_modulcreated'] = date("Y-m-d h:i:s");

                    if($this->penjadwalans_model->updatemodul($pjd))
                    {
                        $this->session->set_flashdata('success', 'Modul berhasil disimpan');
                        redirect(site_url('dosen/penjadwalan/'.$data['detail']->pkl_id));
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Modul gagal disimpan: '.$this->upload->display_errors());
                    redirect(site_url('dosen/editmodul/'.$data['detail']->pkl_id));
                }
                
                return;
            }
            
            $this->load->view("dosen/modul_edit", $data);
        }

    }