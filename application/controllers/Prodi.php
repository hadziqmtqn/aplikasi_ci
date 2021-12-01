<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Prodi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Prodi_model");
    }

    public function index()
    {
        $data["title"] = 'Data Prodi';
        $data["data_prodi"] = $this->Prodi_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('master/prodi/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $Prodi = $this->Prodi_model;
        $validation = $this->form_validation;
        $validation->set_rules($Prodi->rules());

        if ($validation->run()) {
            $Prodi->save();
            $this->session->set_flashdata('messege', '<div class"alert alert-succes alert-dismissable fade show" role="alert">
            Data berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">$times;</span>
            </button></div>');
            redirect("prodi");
        }
        $data["title"] = "Tambah Data Prodi";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('master/prodi/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('prodi');

        $Prodi = $this->Prodi_model;
        $validation = $this->form_validation;
        $validation->set_rules($Prodi->rules());

        if ($validation->run()) {
            $Prodi->update();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Prodi berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect("prodi");
        }
        
        $data["title"] = "Edit Data Prodi";
        $data["data_prodi"] = $Prodi->getById($id);
        if (!$data["data_prodi"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('master/prodi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if(!isset($id)) show_404();
        $this->Prodi_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Prodi berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}