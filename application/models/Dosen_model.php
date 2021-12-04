<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    private $table = 'dosen';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'nama',  //samakan dengan atribute name pada tags input
                'label' => 'Nama',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'prodi_id',
                'label' => 'Prodi',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No HP',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data dosen berdasarkan id dosen
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from dosen where id='$id'
    }

    //menampilkan semua data dosen
    public function getAll()
    {
        $this->db->select('dosen.*,prodi.nama as nama_prodi');
        // jika nama kolom pada primaty key sama dengan nama kolom pada table foreign key
        $this->db->from('dosen');
        $this->db->join('prodi', 'dosen.prodi_id = prodi.id');
        $query = $this->db->get();
        return $query->result();
    }

    //menyimpan data dosen
    public function save()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "prodi_id" => $this->input->post('prodi_id'),
            "no_hp" => $this->input->post('no_hp'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data dosen
    public function update()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "prodi_id" => $this->input->post('prodi_id'),
            "no_hp" => $this->input->post('no_hp'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    //hapus data dosen
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}