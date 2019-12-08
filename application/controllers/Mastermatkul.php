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

       public function index()
    {
        $params['datas'] = $this->matkuls_model->getall();
        
        $this->load->view("master/matakuliah", $params);
    }
    
    function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->matkuls_model->rules());

        if ($this->form_validation->run()) {
            
            if($this->matkuls_model->save())
            {
                $this->session->set_flashdata('success', 'matakuliah baru berhasil ditambahkan');
                redirect(site_url('mastermatkul'));
                return;
            }
            else{
                $this->session->set_flashdata('error', 'matakuliah baru gagal ditambahkan');
                redirect(site_url('mastermatkul'));
                return;

            }
        }
        
        $this->load->view("master/matakuliah_add");
    }
    
    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('mastermatkul'));
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->matkuls_model->rules());

        if ($this->form_validation->run()) {

            if($this->matkuls_model->update($id))
            {
                $this->session->set_flashdata('success', 'Matakuliah berhasil diubah');
                redirect(site_url('mastermatkul'));
                return;
            }else{            
                $this->session->set_flashdata('error', 'Matakuliah gagal diubah');
                redirect(site_url('mastermatkul'));
                return;
    
            }
        }

        $data["datas"] = $this->matkuls_model->getById($id);
        if (!$data["datas"]) show_404();
        
        $this->load->view("master/matakuliah_edit", $data);
    }

    public function delete()
    {
        $post = $this->input->post();

        if($this->matkuls_model->delete($post['delid']))
        {
            $this->session->set_flashdata('success', 'Matakuliah berhasil dihapus');
            redirect(site_url('mastermatkul'));
            return;
        }
        else
        {
            $this->session->set_flashdata('error', 'Matakuliah gagal dihapus');
            redirect(site_url('mastermatkul'));
            return;

        }
    }
}
