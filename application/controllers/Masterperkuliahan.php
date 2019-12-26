<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterperkuliahan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
        $this->load->model("perkuliahans_model");
        
        if($this->session->userdata('user_name')==null || $this->session->userdata('user_role')!="adm"){
            redirect(site_url('login'));
            return;
        }
    }

    public function index()
    {
        $params['datas'] = $this->perkuliahans_model->getall();
        
        $this->load->view("master/perkuliahan", $params);
    }
    
    function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->perkuliahans_model->rules());

        if ($this->form_validation->run()) {
            
            if($this->perkuliahans_model->save())
            {
                $this->session->set_flashdata('success', 'Perkuliahan baru berhasil ditambahkan');
                redirect(site_url('masterperkuliahan'));
                return;
            }
            else{
                $this->session->set_flashdata('error', 'Perkuliahan baru gagal ditambahkan');
                redirect(site_url('masterperkuliahan'));
                return;

            }
        }
        
        $this->load->view("master/perkuliahan_add");
    }
    
    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('masterperkuliahan'));
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->perkuliahans_model->rules());

        if ($this->form_validation->run()) {

            if($this->perkuliahans_model->update($id))
            {
                $this->session->set_flashdata('success', 'Perkuliahan berhasil diubah');
                redirect(site_url('masterperkuliahan'));
                return;
            }
            else
            {
                $this->session->set_flashdata('error', 'Perkuliahan gagal diubah');
                redirect(site_url('masterperkuliahan'));
                return;
    
            }
        }

        $data["datas"] = $this->perkuliahans_model->getById($id);
        if (!$data["datas"]) show_404();
        
        $this->load->view("master/perkuliahan_edit", $data);
    }

    public function delete()
    {
        $post = $this->input->post();

        if($this->perkuliahans_model->delete($post['delid']))
        {
            $this->session->set_flashdata('success', 'Perkuliahan berhasil dihapus');
            redirect(site_url('masterperkuliahan'));
            return;
        }
        else
        {
            $this->session->set_flashdata('error', 'Perkuliahan gagal dihapus');
            redirect(site_url('masterperkuliahan'));
            return;

        }
    }

    function autocom()
    {
        $json = [];

        if(!empty($this->input->get("q"))){
            $json = $this->perkuliahans_model->autocom($this->input->get("q"));
        }
        echo json_encode($json);
    }
}