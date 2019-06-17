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
        $this->JAFA = $post["jafa"];
        $this->TMT_JAFA = $post["tmtjafa"];
        $this->angka_kredit = $post["angkakredit"];
        $this->username = $this->session->userdata('dosen')->username;
        $this->photo = $post["photo"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id']));
    }

    public function updateJabatan()
    {
        $post = $this->input->post();
        $this->id_dosen = $this->session->userdata('dosen')->id_dosen;
        $this->nama = $post["nama"];
        $this->NIDN_NUPN = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->tempat_lahir = $post["tempatlahir"];
        $this->tanggal_lahir = $post["tanggallahir"];
        $this->gelar_depan = $post["gelardepan"];
        $this->gelar_belakang = $post["gelarbelakang"];
        $this->jenis_kelamin = $post["jeniskelamin"];
        $this->JAFA = $post["JAFA"];
        $this->TMT_JAFA = $post["TMTJAFA"];
        $this->angka_kredit = $post["angkakredit"];
        $this->username = $this->session->userdata('dosen')->username;
        $this->photo = $post["photo"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id']));
    }

    public function _uploadImageDosen()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        $uploadpath="./datadosen/$iddosen/profile/";
        echo "->check go to upload function";
        if(!is_dir($uploadpath)) {
            echo "->check make path";
            mkdir($uploadpath);
        }

        $config['upload_path']          = $uploadpath;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'photodose1';
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('berkas')) {
            echo "->check uploaded";
            $sql = "UPDATE `dosen` SET `photo` = 'photodosen1.jpg' WHERE `dosen`.`id_dosen` = $iddosen";
            $this->db->query($sql);
        }
        else{
            echo "->gak keupload gan ";
        }
    
        // redirect('/profile/');
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_dosen"=>$id));
    }


    public function get_all_dosen($program_didik)
    {
        return $this->db->query("SELECT * FROM `dosen` WHERE program_didik=$program_didik")->result();
    }

}