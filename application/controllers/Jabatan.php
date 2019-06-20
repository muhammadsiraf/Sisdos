<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
		// $this->dosenRequired(array('except'=>array('')));
        $this->load->model("skp_model");
        $this->load->model("dosen_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $this->load->view("dosen/dashboard");
    }

    public function viewKelengkapan()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018-2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getEvalSKP($id_tridharma);
                            $data['idtridharma']=$id_tridharma;
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['dataSKP']=null;
            }
            $this->load->view("dosen/page/jabatan/kelengkapan",$data);       
        }
        else{
            $tahunajar=$_POST['tahunajar'];
            $semester=$_POST['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)->id_tridharma;
                            $dataRancanganSKP=$skp->getEvalSKP($id_tridharma);
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['dataSKP']=null;
            }
            $this->load->view("dosen/page/jabatan/kelengkapan",$data);       
        }
                    
    }

    public function viewSimulasi()
    {
        $this->load->view("dosen/page/jabatan/simulPenilaian");              
    }

    public function viewPengajuan()
    {
        $this->load->view("dosen/page/jabatan/pengajuan");              
    }


   public function delete($id=null)
    {
   
    }
}