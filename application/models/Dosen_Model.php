<?php defined ('BASEPATH') OR exit ('no direct access allowed');

class Dosen_model extends CI_Model
{
    private $_table = "dosen";
    // private $_tableJabatan = ""
    public $id_dosen;
    public $NIDN_NUPN;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $gelar_depan;
    public $gelar_belakang;
    public $jenis_kelamin;
    public $JAFA;
    public $TMT_JAFA;
    public $angka_kredit;
    public $username;

    public $photo="default.jpg";

    public function rules()
    {
        return [
            
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


    public function saveProfile()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->tempat_lahir = $post["tempatLahir"];
        $this->tanggal_lahir = $post["tanggalLahir"];
        $this->gelar_depan = $post["gelarDepan"];
        $this->gelar_belakang = $post["gelarBelakang"];
        $this->jenis_kelamin = $post["jenisKelamin"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->NIDN_NUPN = $post["nupn"];
        $this->tempat_lahir = $post["tempatlahir"];
        $this->tanggal_lahir = $post["tanggallahir"];
        $this->gelar_depan = $post["gelardepan"];
        $this->gelar_belakang = $post["gelarbelakang"];
        $this->jenis_kelamin = $post["jeniskelamin"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id']));
    }

    public function updateProfil()
    {
        $dosen=$this->session->userdata('dosen');
        $post = $this->input->post();
        $this->id_dosen = $this->session->userdata('dosen')->id_dosen;
        $this->nama = $post["nama"];
        $this->NIDN_NUPN = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->tempat_lahir = $post["tempatlahir"];
        $this->tanggal_lahir = $post["tanggallahir"];
        $this->gelar_depan = $post["gelardepan"];
        $this->gelar_belakang = $post["gelarbelakang"];
        $this->jenis_kelamin = $post["jeniskelamin"];
        $this->JAFA = $this->session->userdata('dosen')->JAFA;
        $this->TMT_JAFA = $this->session->userdata('dosen')->TMT_JAFA;
        $this->angka_kredit = $this->session->userdata('dosen')->angka_kredit;
        $this->username = $this->session->userdata('dosen')->username;
        $this->photo = $post["photo"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id']));
    }

    public function updateJabatan()
    {
        $post = $this->input->post();
        $this->id_dosen = $this->session->userdata('dosen')->id_dosen;
        $this->nama = $this->session->userdata('dosen')->nama;
        $this->NIDN_NUPN = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->tempat_lahir = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->tanggal_lahir = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->gelar_depan = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->gelar_belakang = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->jenis_kelamin = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->JAFA = $post["JAFA"];
        $this->TMT_JAFA = $post["TMTJAFA"];
        $this->angka_kredit = $post["angkakredit"];
        $this->username = $this->session->userdata('dosen')->username;
        $this->photo = $post["photo"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id']));
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_dosen"=>$id));
    }


}