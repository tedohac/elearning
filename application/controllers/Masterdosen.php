<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
        $this->load->model("dosens_model");
        
        if($this->session->userdata('user_name')==null && $this->session->userdata('user_role')!="adm"){
            redirect(site_url('login'));
            return;
        }
    }

    public function index()
    {
        $params['datas'] = $this->dosens_model->getall();
        
        $this->load->view("master/dosen", $params);
    }

    function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->dosens_model->rules());

        if ($this->form_validation->run()) 
        {
            
            $post = $this->input->post();

            if($this->dosens_model->checknik($post["dosen_nik"]))
            {
                $this->session->set_flashdata('error', 'NIK sudah digunakan!');
                redirect(site_url('masterdosen/add'));
                return;
            }
            elseif($this->users_model->checkusername($post["dosen_nik"])) 
            {
                $this->session->set_flashdata('error', 'NIK sudah digunakan sebagai username!');
                redirect(site_url('masterdosen/add'));
                return;
            }
            else
            {
                if(!$this->users_model->add($post["dosen_nik"], "dsn"))
                {
                    $this->session->set_flashdata('error', 'Dosen baru gagal ditambahkan sebagai user baru');
                    redirect(site_url('masterdosen'));
                    return;
                }
                
                if($this->dosens_model->add())
                {
                    $this->session->set_flashdata('success', 'Dosen baru berhasil ditambahkan');
                    redirect(site_url('masterdosen'));
                    return;
                }
                else{
                    $this->session->set_flashdata('error', 'Dosen baru gagal ditambahkan');
                    redirect(site_url('masterdosen'));
                    return;
                }
            }
            
        }
        
        $this->load->view("master/dosen_add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('masterdosen'));
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->dosens_model->rules());

        if ($this->form_validation->run()) {

            if($this->dosens_model->update($id))
            {
                $this->session->set_flashdata('success', 'Dosen berhasil diubah');
                redirect(site_url('masterdosen'));
                return;
            }
            else
            {
                $this->session->set_flashdata('error', 'Dosen gagal diubah');
                redirect(site_url('masterdosen'));
                return;
    
            }
        }

        $data["datas"] = $this->dosens_model->getById($id);
        if (!$data["datas"]) show_404();
        
        $this->load->view("master/dosen_edit", $data);
    }

    public function delete()
    {
        $post = $this->input->post();

        if($this->dosens_model->delete($post['delid']))
        {
            $this->session->set_flashdata('success', 'Dosen berhasil dihapus');
            redirect(site_url('masterdosen'));
            return;
        }
        else
        {
            $this->session->set_flashdata('error', 'Dosen gagal dihapus');
            redirect(site_url('masterdosen'));
            return;

        }
    }
}