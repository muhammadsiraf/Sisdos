<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
		// $this->dosenRequired(array('except'=>array('')));
        $this->load->model("dosen_model");
        $this->load->model("pendidikan_model");
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        // $data["datadosen"]=$this->dosen_model->get
        $this->load->view("dosen/dashboard");
    }

    public function viewProfileDosen()
    {
        $username=$this->session->userdata('dosen')->username;
        $dosen=$this->dosen_model->getByUsername($username);
        $data['pendidikan']=$this->pendidikan_model->getByDosen($dosen->id_dosen);
        $data['dosen']=$dosen;
        $this->load->view("dosen/page/profile",$data);
    }

    public function viewEditProfil()
    {
        $username=$this->session->userdata('dosen')->username;
        $dosen=$this->dosen_model->getByUsername($username);
        $data['dosen']=$dosen;
        $this->load->view("dosen/page/editProfile",$data);        
    }

    public function add()
    {
        $dosen =$this->dosen_model;
        $validation=$this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()){
            $dosen->save();
            $this->session->set_flashdata('success','Berhasil disimpan');
        }

        $this->load->view("dosen/page/profile");
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function edit()
    {
       $dosencek=$this->session->userdata('dosen');
       
       if  ($dosencek!=null){
             echo "dosen check true";
             $dosen = $this->dosen_model;
             $validation = $this->form_validation;        
              $dosen->updateProfil();
              $this->session->set_flashdata('success', 'berhasil simpan data baru');
              redirect('/profile/');
        }
    }

    public function editJabatan()
    {
       $dosencek=$this->session->userdata('dosen');
       
       if  ($dosencek!=null){
             echo "dosen check true";
             $dosen = $this->dosen_model;
             $validation = $this->form_validation;        
              $dosen->updateJabatan();
              $this->session->set_flashdata('success', 'berhasil simpan data baru');
              redirect('/profile/');
        }
    }

    public function tambahPendidikan()
    {
        $dosencek=$this->session->userdata('dosen');
       
       if  ($dosencek!=null){
             echo "dosen check true";
             $pendidikan = $this->pendidikan_model;
             $validation = $this->form_validation;        
              $pendidikan->addPendidikan();
              $this->session->set_flashdata('success', 'berhasil simpan data baru');
              redirect('/profile/');
        }
    }


   public function delete($id=null)
    {
   
    }

    
   public function uploadPhoto()
    {
       $dosencek=$this->session->userdata('dosen');
       
       if  ($dosencek!=null){
             echo "dosen check true";
             $dosen = $this->dosen_model;
             $validation = $this->form_validation;        
             $dosen->_uploadImageDosen();
            //   $this->session->set_flashdata('success', 'berhasil simpan data baru');
            //   redirect('/profile/');
        }
    }

    public function view_evaluasi_dosen_index()
    {
        $dosen =$this->dosen_model;
        $dosen_penilai=$this->session->userdata('dosen');

        $all_dosen_bawahan=$dosen->get_all_dosen($dosen_penilai->program_didik);
        $data['dosen_bawahan']=$all_dosen_bawahan;
        $this->load->view("dosen/page/penilaian/daftardosen",$data);        
    }

    public function view_evaluasi_dosen_penilaian()
    {

        $dosen =$this->dosen_model;
        $dosen_penilai=$this->session->userdata('dosen');

        $all_dosen_bawahan=$dosen->get_all_dosen($dosen_penilai->program_didik);
        $data['dosen_bawahan']=$all_dosen_bawahan;
        
        if(!ISSET($_POST['tahun'],$_POST['semester'])){
            $data['semester']="genap";
            $data['tahun']="2018/2019";            
        }
        else{
            $data['semester']=$_POST['semester'];
            $data['tahun']=$_POST['tahun'];

        }

        $this->load->view("dosen/page/penilaian/penilaian_dosen_daftar",$data);            
    }

    public function view_evaluasi_dosen_skp()
    {
        $dosen =$this->dosen_model;
        $dosen_penilai=$this->session->userdata('dosen');

        $all_dosen_bawahan=$dosen->get_all_dosen($dosen_penilai->program_didik);
        $data['dosen_bawahan']=$all_dosen_bawahan;
        $this->load->view("dosen/page/penilaian/penilaian_skp_dosen",$data);
    }

    public function view_nilai_dosen($semester,$tahun,$id_dosen)
    {   
        $data['semester']=$semester;
        $data['tahun']=$tahun;
        $data['iddosen']=$id_dosen;
        $dosennilai=$this->dosen_model;
        $dosen=$this->session->userdata('dosen');
        $ceksudah=$dosennilai->cek_dosen_dinilai($semester,$tahun,$dosen->program_didik);
        $this->load->view("dosen/page/penilaian/nilai_dosen_konten",$data);


    }



}