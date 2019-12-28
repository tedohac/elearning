<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Mahasiswa extends CI_Controller
    {
        private $mhs_nim;

        public function __construct()
        {
            parent::__construct();
            $this->load->model("users_model");
            $this->load->model("dosens_model");
            $this->load->model("mahasiswa_model");
            
            if($this->session->userdata('user_name')==null || $this->session->userdata('user_role')!="mhs"){
                redirect(site_url('login'));
                return;
            }

            $this->mhs_nim = $this->session->userdata('user_name');
        }

        public function index()
        {
            $this->load->model("perkuliahans_model");
            
            $data['datas'] = $this->perkuliahans_model->getall();
            $data['nim'] = $this->mhs_nim;

            $this->load->view("index_mhs", $data);
        }

        public function jadwal($pkl_id)
        {
            $data['nim'] = $this->mhs_nim;
            $this->load->model("penjadwalans_model");
            
            $data['detail'] = $this->penjadwalans_model->getDetailByPkl($pkl_id);

            $data['datas'] = $this->penjadwalans_model->getJadwalByPkl($pkl_id);

            $this->load->view("mahasiswa/jadwal", $data);
        }

        public function forum($pjd_id)
        {
            $data['nim'] = $this->mhs_nim;
            $this->load->model("penjadwalans_model");
            $this->load->model("replyforum_model");
            $data['detail'] = $this->penjadwalans_model->getDetail($pjd_id);
            $data['forums'] = $this->replyforum_model->getparentbypjd($pjd_id);

            foreach($data['forums'] as $forum)
            {
                $forum->child = $this->replyforum_model->getchild($forum->reply_id);

                if(substr($forum->reply_user_name,0,2)=="DS")
                    $forum->nama = $this->dosens_model->getnama($forum->reply_user_name)->dosen_nama;
                elseif(substr($forum->reply_user_name,0,3)=="MHS")
                    $forum->nama = $this->mahasiswa_model->getnama($forum->reply_user_name)->mhs_nama;
                else
                    $forum->nama = "";

                foreach($forum->child as $child)
                {
                    if(substr($child->reply_user_name,0,2)=="DS")
                        $child->nama = $this->dosens_model->getnama($child->reply_user_name)->dosen_nama;
                    elseif(substr($child->reply_user_name,0,3)=="MHS")
                        $child->nama = $this->mahasiswa_model->getnama($child->reply_user_name)->mhs_nama;
                    else
                        $child->nama = "";
                }
            }

            $this->load->view("mahasiswa/forum", $data);
        }
        
        public function replyparent($pjd_id)
        {
            $data['nim'] = $this->mhs_nim;
            $this->load->model("penjadwalans_model");
            $this->load->model("replyforum_model");
            $this->load->library('form_validation');

            $data['detail'] = $this->penjadwalans_model->getDetail($pjd_id);

            $parent = new stdClass();
            $parent->name = $data['detail']->dosen_nama;
            $parent->created = $data['detail']->pjd_forumcreated;
            $parent->content = $data['detail']->pjd_forumcontent;
            $data['parent'] = $parent;

            $this->form_validation->set_rules($this->replyforum_model->rules());
            
            $post = $this->input->post();
            
            if ($this->form_validation->run())
            {
                $content_clean = str_replace("'", "", htmlspecialchars($post["reply_content"]));
                $pjd['reply_pjd_id'] = $pjd_id;
                $pjd['reply_content'] = $content_clean;
                $pjd['reply_user_name'] = $this->mhs_nim;
                $pjd['reply_created'] = date("Y-m-d h:i:s");
                
                if($this->replyforum_model->saveparent($pjd))
                {
                    $this->session->set_flashdata('success', 'Berhasil membalas forum');
                    redirect(site_url('mahasiswa/forum/'.$pjd_id));
                }
                else
                {
                    $this->session->set_flashdata('success', 'Gagal membalas forum');
                    redirect(site_url('mahasiswa/forum/'.$pjd_id));
                }
                
                return;
            }
            
            $this->load->view("mahasiswa/forum_reply", $data);
        }

        public function replychild($pjd_id)
        {
            if(!isset($_GET['parent']) || $_GET['parent']=="")
            {
                show_404();
                return;
            }

            $parent_id = $_GET['parent'];
            $data['nim'] = $this->mhs_nim;
            $this->load->model("penjadwalans_model");
            $this->load->model("replyforum_model");
            $this->load->library('form_validation');

            $data['detail'] = $this->penjadwalans_model->getDetail($pjd_id);
            
            $parentReply = $this->replyforum_model->getbyid($parent_id);
            $parent = new stdClass();
            $parent->name = $parentReply->reply_user_name;
            $parent->created = $parentReply->reply_created;
            $parent->content = $parentReply->reply_content;
            $data['parent'] = $parent;

            $this->form_validation->set_rules($this->replyforum_model->rules());
            
            $post = $this->input->post();
            
            if ($this->form_validation->run())
            {
                $content_clean = str_replace("'", "", htmlspecialchars($post["reply_content"]));
                $pjd['reply_pjd_id'] = $pjd_id;
                $pjd['reply_content'] = $content_clean;
                $pjd['reply_user_name'] = $this->mhs_nim;
                $pjd['reply_created'] = date("Y-m-d h:i:s");
                $pjd['reply_parent'] = $parent_id;
                
                if($this->replyforum_model->savechild($pjd))
                {
                    $this->session->set_flashdata('success', 'Berhasil membalas forum');
                    redirect(site_url('mahasiswa/forum/'.$pjd_id));
                }
                else
                {
                    $this->session->set_flashdata('success', 'Gagal membalas forum');
                    redirect(site_url('mahasiswa/forum/'.$pjd_id));
                }
                
                return;
            }
            
            $this->load->view("mahasiswa/forum_reply", $data);
        }
    }