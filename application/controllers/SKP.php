<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SKP extends MY_Controller
{

    private $_tahunajar;
    private $_semester;
    public function __construct()
    {
        parent::__construct();
		$this->dosenRequired(array('except'=>array('')));
        $this->load->model("skp_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("dosen/dashboard");
    }

    public function viewRancanganSKP()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_post['tahunajar'],$_post['semester'])){
            $tahunajar="2018/2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getSKP($id_tridharma);
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['sataSKP']=null;
            }
            $this->load->view("dosen/page/skp/rancanganSKP",$data);               
        }
        else{
            $tahunajar=post['tahunajar'];
            $semester=post['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getSKP($id_tridharma);
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['sataSKP']=null;
            }
            $this->load->view("dosen/page/skp/rancanganSKP",$data);   
        }
               
    }

    public function viewEvaluasiSKP()
    {
        $this->load->view("dosen/page/skp/evaluasiSKP");              
    }

    public function viewKomponenSKP()
    {
        $this->load->view("dosen/page/skp/komponenSKP");              
    }

    public function viewPendidikanBKD()
    {
        $this->load->view("dosen/page/bkd/pendidikanBKD");                     
    }

    public function viewPenelitianBKD()
    {
        $this->load->view("dosen/page/bkd/penelitianBKD");              
       
    }

    public function viewPengabdianBKD()
    {
        $this->load->view("dosen/page/bkd/pengabdianBKD");              
       
    }

    public function viewPenunjangBKD()
    {
        $this->load->view("dosen/page/bkd/penunjangBKD");              
    }
    

    public function viewKesimpulanBKD()
    {
        $this->load->view("dosen/page/bkd/kesimpulanBKD");                     
    }
    public function edit($id=null)
    {
       
    }

   public function delete($id=null)
    {
   
    }
}