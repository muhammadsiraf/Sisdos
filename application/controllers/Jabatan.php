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
        $this->load->library('zip');
    }

    public function index()
    {
        // $this->load->view("dosen/dashboard");
    }
    public function zip_data_eval($id_tridharma)
    {
        $zip1=$this->zip;
        $skp=$this->skp_model;
        if($skp->getEvalSKP($id_tridharma)!=null)
        {
            $data_skp=$skp->getEvalSKP($id_tridharma);
            foreach($data_skp as $data){
                $datainput=base_url("file/berkas/$data->berkas_bukti_capaian");
                // echo "data input : $datainput <br>";
                $name=$data->berkas_bukti_capaian;
                $data=file_get_contents($datainput);
                $zip1->add_data($name,$data);
                // $zip1->read_file($datainput);

                // echo "test3<br>";
            }   
            // echo "test2";
            $namafile=$id_tridharma.".zip";
            // echo var_dump($zip1);
            $zip1->archive(FCPATH.'/file/berkas_tridharma_zip/'.$namafile);
            // $zip1->archive(base_url("file/berkas_tridharma_zip/$namafile"));
            // $zip1->download("$namafile");
            // $this->zip->download('data.zip');
        }
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
                            // echo "test";  
                            $this->zip_data_eval($id_tridharma);     
            }
            else{
                $data['idtridharma']=null;
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
                            $data['idtridharma']=$id_tridharma;
                            $data['dataSKP']=$dataRancanganSKP;     
                            // echo "test";     
                            $this->zip_data_eval($id_tridharma);               
            }
            else{
                $data['dataSKP']=null;
                $data['idtridharma']=null;
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