<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Dosen extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dosen_model");
    }

    public function index()
    {
        $data["title"] = 'Data List Dosen';
        $data["data_dosen"] = $this->Dosen_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('dosen/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $Dosen = $this->Dosen_model;
        $validation = $this->form_validation;
        $validation->set_rules($Dosen->rules());

        if ($validation->run()) {
            $Dosen->save();
            $this->session->set_flashdata('messege', '<div class"alert alert-succes alert-dismissable fade show" role="alert">
            Data berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">$times;</span>
            </button></div>');
            redirect("dosen");
        }
        $data["title"] = "Tambah Data Dosen";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('dosen/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('dosen');

        $Dosen = $this->Dosen_model;
        $validation = $this->form_validation;
        $validation->set_rules($Dosen->rules());

        if ($validation->run()) {
            $Dosen->update();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mahasiswa berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect("dosen");
        }
        
        $data["title"] = "Edit Data Dosen";
        $data["data_dosen"] = $Dosen->getById($id);
        if (!$data["data_dosen"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('dosen/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if(!isset($id)) show_404();
        $this->Dosen_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Dosen berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}