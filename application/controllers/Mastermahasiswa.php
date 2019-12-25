<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastermahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
        $this->load->model("mahasiswas_model");
        
        if($this->session->userdata('user_name')==null && $this->session->userdata('user_role')!="adm"){
            redirect(site_url('login'));
            return;
        }
    }
  
    public function index()
    {
        $params['datas'] = $this->mahasiswa_model->getallmahasiswa();
        $this->load->view("master/mahasiswa", $params);
    }

    public function add()
    {
        $this->load->model('mahasiswa_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->mahasiswa_model->rules());

        if ($this->form_validation->run()) {

            if($_POST['mhs_password'] == $_POST['mhs_repassword']){

            if($this->users_model->addMahasiswa())
            {
                $this->session->set_flashdata('success', 'Mahasiswa baru berhasil ditambahkan sebagai user baru');
                // redirect(site_url('mastermahasiswa'));
                // return;
            }
            else{
                $this->session->set_flashdata('error', 'Mahasiswa baru gagal ditambahkan sebagai user baru');
                // redirect(site_url('mastermahasiswa'));
                // return;

            }
            
            if($this->mahasiswa_model->save())
            {
                $this->session->set_flashdata('success', 'mahasiswa baru berhasil ditambahkan');
                redirect(site_url('mastermahasiswa'));
                return;
            }
            else{
                $this->session->set_flashdata('error', 'mahasiswa baru gagal ditambahkan');
                redirect(site_url('mastermahasiswa'));
                return;

            }
        } else {
            $this->session->set_flashdata('error', 'Password dan RePassword Tidak Sama');
            redirect(site_url('mastermahasiswa'));
            return;
        }
        }
        
        $this->load->view("master/mahasiswa_add");
    }

    function jkautocom()
    {
        $json = [];

        if(!empty($this->input->get("q"))){
            $json = $this->mahasiswa_model->autocom($this->input->get("q"));
        }
        echo json_encode($json);
    }
 
    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('mastermahasiswa'));
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->mahasiswa_model->rules());

        if ($this->form_validation->run()) {

            if($this->mahasiswa_model->update($id))
            {
                $this->session->set_flashdata('success', 'mahasiswa berhasil diubah');
                redirect(site_url('mastermahasiswa'));
                return;
            }
            else
            {
                $this->session->set_flashdata('error', 'mahasiswa gagal diubah');
                redirect(site_url('mastermahasiswa'));
                return;
    
            }
        }

        $data["datas"] = $this->mahasiswa_model->getById($id);
        if (!$data["datas"]) show_404();
        
        $this->load->view("master/mahasiswa_edit", $data);
    }

    public function delete()
    {
        $post = $this->input->post();

        if($this->mahasiswa_model->delete($post['delid']))
        {
            $this->session->set_flashdata('success', 'mahasiswa berhasil dihapus');
            redirect(site_url('mastermahasiswa'));
            return;
        }
        else
        {
            $this->session->set_flashdata('error', 'mahasiswa gagal dihapus');
            redirect(site_url('mastermahasiswa'));
            return;

        }
    }
}