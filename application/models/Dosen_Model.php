<?php defined ('BASEPATH') OR exit ('no direct access allowed');

class Dosen_model extends CI_Model
{
    private $_table = "dosen";

    public $id_dosen;
    public $NIDN;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $gelar_depan;
    public $gelar_belakang;
    public $jenis_kelamin;
    public $jafa;
    public $tmtjafa;
    public $angka_kredit;
    public $username;

    public $photo="default.jpg";

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
            ],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'
            ],

            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_dosen"=>$id])->row();
    }

    public function getByUsername($username)
    {
        return $this->db->get_where($this->_table, ["username"=>$username])->row();
    }


    public function save()
    {

    }

    public function update()
    {

    }


}