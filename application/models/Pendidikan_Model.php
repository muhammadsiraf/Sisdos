<?php defined ('BASEPATH') OR exit ('no direct access allowed');

class Pendidikan_model extends CI_Model
{
    private $_table = "pendidikan";
    // private $_tableJabatan = ""
    public $id_pendidikan;
    public $id_dosen;
    public $jenjang;
    public $perguruan_tinggi;
    public $program_studi;
    public $negara;
    public $tahun_mulai;
    public $tahun_selesai;
    public $gelar;
    public $sumber_dana;


    public function rules()
    {
        return [
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getByDosen($id_dosen)
    {
        return $this->db->get_where($this->_table, ["id_dosen"=>$id_dosen])->result();
    }

    public function getByUsername($username)
    {
        return $this->db->get_where($this->_table, ["username"=>$username])->row();
    }


    public function addPendidikan()
    {
       $post = $this->input->post();
        $this->id_dosen = $post["id_dosen"];
        $this->jenjang = $post["jenjang"];
        $this->perguruan_tinggi = $post["perguruan_tinggi"];
        $this->program_studi = $post["program_studi"];
        $this->negara = $post["negara"];
        $this->tahun_mulai = $post["tahun_mulai"];
        $this->tahun_selesai = $post["tahun_selesai"];
        $this->gelar = $post["gelar"];
        $this->sumber_dana = $post["sumberdana"];

        $this->db->insert($this->_table, $this);
    }

    public function updatePendidikan()
    {
       
    }

    public function deletePendidikan($id)
    {

    }


}