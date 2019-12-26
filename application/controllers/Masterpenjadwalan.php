<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterpenjadwalan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
        $this->load->model("penjadwalans_model");
        
        if($this->session->userdata('user_name')==null || $this->session->userdata('user_role')!="adm"){
            redirect(site_url('login'));
            return;
        }
    }

    public function index()
    {
        $params['datas'] = $this->penjadwalans_model->getall();
        
        $this->load->view("master/penjadwalan", $params);
    }
    
    function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->penjadwalans_model->rules());

        if ($this->form_validation->run()) {
            
            if($this->penjadwalans_model->save())
            {
                $this->session->set_flashdata('success', 'Penjadwalan baru berhasil ditambahkan');
                redirect(site_url('masterpenjadwalan'));
                return;
            }
            else{
                $this->session->set_flashdata('error', 'Penjadwalan baru gagal ditambahkan');
                redirect(site_url('masterpenjadwalan'));
                return;

            }
        }
        
        $this->load->view("master/penjadwalan_add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('masterpenjadwalan'));
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->penjadwalans_model->rules());

        if ($this->form_validation->run()) {

            if($this->penjadwalans_model->update($id))
            {
                $this->session->set_flashdata('success', 'Penjadwalan berhasil diubah');
                redirect(site_url('masterpenjadwalan'));
                return;
            }
            else
            {
                $this->session->set_flashdata('error', 'Penjadwalan gagal diubah');
                redirect(site_url('masterpenjadwalan'));
                return;
    
            }
        }

        $data["datas"] = $this->penjadwalans_model->getById($id);
        if (!$data["datas"]) show_404();
        
        $this->load->view("master/penjadwalan_edit", $data);
    }

    public function delete()
    {
        $post = $this->input->post();

        if($this->penjadwalans_model->delete($post['delid']))
        {
            $this->session->set_flashdata('success', 'Penjadwalan berhasil dihapus');
            redirect(site_url('masterpenjadwalan'));
            return;
        }
        else
        {
            $this->session->set_flashdata('error', 'Penjadwalan gagal dihapus');
            redirect(site_url('masterpenjadwalan'));
            return;

        }
    }

    function autocom()
    {
        $json = [];

        if(!empty($this->input->get("q"))){
            $json = $this->penjadwalans_model->autocom($this->input->get("q"));
        }
        echo json_encode($json);
    }
}