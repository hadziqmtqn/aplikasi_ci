<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    private $table = 'mahasiswa';
    private $proditable = 'prodi';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form
    public function rules()
    {
        return [
            [
                'field' => 'Nama',  //samakan dengan atribute name pada tags input
                'label' => 'Nama',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'JenisKelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'Alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'Agama',
                'label' => 'Agama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'NoHp',
                'label' => 'No Hp',
                'rules' => 'trim|required|numeric|min_length[9]|max_length[15]'
            ],
            [
                'field' => 'Email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'prodi_id',
                'label' => 'Prodi',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["IdMhsw" => $id])->row();
        //query diatas seperti halnya query pada mysql
        //select * from mahasiswa where IdMhsw='$id'
    }

    //menampilkan semua data mahasiswa
    public function getAll()
    {
        // $this->db->from($this->table);
        // $this->db->order_by("IdMhsw", "desc");
        // $query = $this->db->get();
        // return $query->result();
        //fungsi diatas seperti halnya query
        //select * from mahasiswa order by IdMhsw desc
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodi_id = prodi.id');
        $query = $this->db->order_by("created_at","desc")->get();
        return $query->result();
    }

    //menyimpan data mahasiswa
    public function save()
    {
        $data = array(
            "Nama" => $this->input->post('Nama'),
            "JenisKelamin" => $this->input->post('JenisKelamin'),
            "Alamat" => $this->input->post('Alamat'),
            "Agama" => $this->input->post('Agama'),
            "NoHp" => $this->input->post('NoHp'),
            "Email" => $this->input->post('Email'),
            "prodi_id" => $this->input->post('prodi_id')
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data mahasiswa
    public function update()
    {
        $data = array(
            "Nama" => $this->input->post('Nama'),
            "JenisKelamin" => $this->input->post('JenisKelamin'),
            "Alamat" => $this->input->post('Alamat'),
            "Agama" => $this->input->post('Agama'),
            "NoHp" => $this->input->post('NoHp'),
            "Email" => $this->input->post('Email')
        );
        return $this->db->update($this->table, $data, array('IdMhsw' => $this->input->post('IdMhsw')));
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, array("IdMhsw" => $id));
    }

}
