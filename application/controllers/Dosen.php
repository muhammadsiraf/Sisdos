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
        $this->load->model("SKP_model");
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
        $skp= $this->SKP_model;
        $dosen_penilai=$this->session->userdata('dosen');
        
        if(!ISSET($_POST['tahun'],$_POST['semester'])){
            $data['semester']="genap";
            $data['tahun']="2018-2019";            
        }
        else{
            $data['semester']=$_POST['semester'];
            $data['tahun']=$_POST['tahun'];

        }
        $semester=$data['semester'];
        $sems="ganjil";
        $tahun=$data['tahun'];
        $prodi=$dosen_penilai->program_didik;
        $all_dosen_bawahan=$dosen->get_all_dosen($dosen_penilai->program_didik);
        $data_nilai_dosen=$skp->get_tridharma_dosen($semester,$tahun,$prodi);
        $data['dosen_bawahan']=$all_dosen_bawahan;
        $data['nilai_dosen']=$data_nilai_dosen;
        // echo var_dump($data_nilai_dosen);
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
            $data['tahun']="2018-2019";            
        }
        else{
            $data['semester']=$_POST['semester'];
            $data['tahun']=$_POST['tahun'];

        }
        $semester=$data['semester'];
        $tahun=$data['tahun'];
        $ceksudah=$dosen->cek_dosen_dinilai($semester,$tahun,$dosen_penilai->program_didik);
        $data['dosensudah']=$ceksudah;

        $this->load->view("dosen/page/penilaian/penilaian_dosen_daftar",$data);            
    }

    public function view_evaluasi_dosen_skp()
    {
        $dosen =$this->dosen_model;
        $dosen_penilai=$this->session->userdata('dosen');

        $all_dosen_bawahan=$dosen->get_all_dosen($dosen_penilai->program_didik);
        $data['dosen_bawahan']=$all_dosen_bawahan;

        if(!ISSET($_POST['tahun'],$_POST['semester'])){
            $data['semester']="genap";
            $data['tahun']="2018-2019";            
        }
        else{
            $data['semester']=$_POST['semester'];
            $data['tahun']=$_POST['tahun'];

        }

        $this->load->view("dosen/page/penilaian/penilaian_skp_dosen",$data);
    }

    public function view_approve_skp($id_dosen,$tahun,$semester)
    {
        $skp=$this->SKP_model;
        if($id_tridharma=$skp->getTridharma($id_dosen,$semester,$tahun)!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($id_dosen,$semester,$tahun)->id_tridharma;
                            $approval=$skp->getTridharma($id_dosen,$semester,$tahun)->rancangan_approve;
                            $dataRancanganSKP=$skp->getSKP($id_tridharma);
                            $data['tahunajar']=$tahun;
                            $data['semester']=$semester;
                            $data['idtridharma']=$id_tridharma;
                            $data['dataSKP']=$dataRancanganSKP;            
                            $data['approval']=$approval;
            }
        else{
                $data['tahunajar']=$tahun;
                $data['semester']=$semester;
                $data['dataSKP']=null;
            }
        $this->load->view("dosen/page/penilaian/approve_skp",$data);        
    }

    public function view_approve_eval_skp($id_tridharma)
    {
        $skp=$this->SKP_model;
        if($skp->cek_tridharma($id_tridharma)!=null){
            $approval=$skp->cek_tridharma($id_tridharma)->evaluasi_approve;
            $data_evaluasi_skp=$skp->getEvalSKP($id_tridharma);
            $data['id_tridharma']=$id_tridharma;
            $data['approval']=$approval;
            $data['data_skp']=$data_evaluasi_skp;
        }
        else{
            $data['id_tridharma']=null;
            $data['approval']=null;
            $data['data_skp']=null;   
        }
        $this->load->view("dosen/page/penilaian/approve_eval_skp",$data);
    }

    public function setuju_skp()
    {
        $dosen=$this->dosen_model;
        $dosen->update_persetujuan_skp();
        redirect("penilaian/skpbkd");
    }

    public function setuju_eval_skp()
    {
        $dosen=$this->dosen_model;
        $post=$this->input->post();
        $id_tridharma=$post['id_tridharma'];
        $dosen->update_persetujuan_eval_skp();
        redirect("penilaian/skpbkd/approval-evaluasi/$id_tridharma");
    }
    public function view_nilai_dosen($semester,$tahun,$id_dosen)
    {   
        $data['semester']=$semester;
        $data['tahun']=$tahun;
        $data['iddosen']=$id_dosen;
        $dosennilai=$this->dosen_model;
        $dosen=$this->session->userdata('dosen');

        $this->load->view("dosen/page/penilaian/halaman_nilai_dosen",$data);
    }

    public function view_edit_dosen($semester, $tahun, $id_dosen)
    {
        $data['semester']=$semester;
        $data['tahun']=$tahun;
        $data['iddosen']=$id_dosen;
        $dosennilai=$this->dosen_model;
        $dosen=$this->session->userdata('dosen');

        $this->load->view("dosen/page/penilaian/halaman_edit_nilai_dosen",$data);
    }

    public function nilai_perilaku_action()
    {
        $dosen=$this->dosen_model;
        $dosen->simpan_penilaian();
        redirect("penilaian/perilaku");
    }

    public function edit_nilai_perilaku_action()
    {
        $dosen=$this->dosen_model;
        $dosen->edit_penilaian();
        redirect("penilaian/perilaku");
    }

    




}