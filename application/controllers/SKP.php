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
        // echo $_POST['semester']."<br>";
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            // echo "masuk tidak isset";
            $tahunajar="2018/2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getSKP($id_tridharma);
                            $data['tahunajar']=$tahunajar;
                            $data['semester']=$semester;
                            $data['idtridharma']=$id_tridharma;
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['tahunajar']=$tahunajar;
                $data['semester']=$semester;
                $data['dataSKP']=null;
            }
            $this->load->view("dosen/page/skp/rancanganSKP",$data);               
        }
        else{
            // echo "masuk isset";
            $tahunajar=$_POST['tahunajar'];
            $semester=$_POST['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)->id_tridharma;
                            $dataRancanganSKP=$skp->getSKP($id_tridharma);
                            $data['tahunajar']=$tahunajar;
                            $data['semester']=$semester;
                            $data['idtridharma']=$id_tridharma;
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['tahunajar']=$tahunajar;
                $data['semester']=$semester;
                $data['dataSKP']=null;
            }
            $this->load->view("dosen/page/skp/rancanganSKP",$data);   
        }
               
    }

    public function viewTambahSKP( $idtridharma=null )
    {
            $skp=$this->skp_model;
            // $dataTridharmaCurrent=$skp->getSKPTambah($idtridharma);
            $idtridharma=(int)$idtridharma;
            $data["idtridharma"]=$idtridharma;
            $data["triPendidikan"]= $this->queryToArray($skp->getSKPperJenis($idtridharma,1));
            $data["triPenelitian"]=$this->queryToArray($skp->getSKPperJenis($idtridharma,2));
            $data["triPengabdian"]=$this->queryToArray($skp->getSKPperJenis($idtridharma,3));
            $data["triPenunjang"]=$this->queryToArray($skp->getSKPperJenis($idtridharma,4));
            $data["pendidikan"]=$skp->getListofUraian(1);
            $data["penelitian"]=$skp->getListofUraian(2);
            $data["pengabdian"]=$skp->getListofUraian(3);
            $data["penunjang"]=$skp->getListofUraian(4);


            $this->load->view("dosen/page/skp/tambahSKP",$data);   
    }

    public function tambahSKP()
    {
        $skp=$this->skp_model;
        $skp->tambahSKP();
        $idtridharma=$_POST['idtridharma'];
        redirect("/skp/tambah/$idtridharma");
    }

    public function deleteSKP($id_pskp=null){
        $skp=$this->skp_model;
        $skp->hapusSKP($id_pskp);
        redirect("/skp/rancangan");
    }

    public function editSKP(){
        $skp=$this->skp_model;
        $skp->editSKP();
        redirect("/skp/rancangan");
    }

    public function updateEvalSKP(){
        $skp=$this->skp_model;
        $post=$this->input->post();
        $idpskp=$post["idpskp"];
        $realisasiJumlah=$post["jumlahRealisasi"];
        $realisasiKualitas=$post["kualitasRealisasi"];

        $where=array(
            'id_pskp'=>$idpskp,
        );

        $dataMasuk=array(
            'realisasi_jumlah'=>$realisasiJumlah,
            'realisasi_kualitas'=>$realisasiKualitas
        );

        $skp->updateSKP($dataMasuk,$where);
        redirect("/skp/evaluasi");

    }

    public function methodTest($nama){
        $namaMu=$nama;
        return $namaMu;
    }

    public function queryToArray($hasilQuery)
    {
        $arrayKembali=[];
        $count=0;
        if ($hasilQuery!=null) {
            foreach($hasilQuery as $hasil){   
                $arrayKembali[$count]=$hasil;
                $count++;
        }
        }
        
        return $arrayKembali;
    }

    public function viewEvaluasiSKP()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018/2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getEvalSKP($id_tridharma);
                            $data['idtridharma']=$id_tridharma;
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['dataSKP']=null;
            }
            $this->load->view("dosen/page/skp/evaluasiSKP",$data);               
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
            $this->load->view("dosen/page/skp/evaluasiSKP",$data);   
        }
                    
    }

    public function newTridharma(){
        $tahunajar=$_GET['tahunajar'];
        $semester=$_GET['semester'];
        $skp=$this->skp_model;
        $skp->newTridharma($tahunajar,$semester);
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        $idtridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)->id_tridharma;
        redirect("/skp/tambah/$idtridharma");
        // $this->viewTambahSKP($idtridharma);
    }

    

    public function viewKomponenSKP()
    {
        $this->load->view("dosen/page/skp/komponenSKP");              
    }

    public function viewPendidikanBKD()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018/2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018/2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,1);
                            $data['idtridharma']=$id_tridharma;
                            $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
            }
            $this->load->view("dosen/page/bkd/pendidikanBKD",$data);                           
        }
        else{
            $tahunajar=$_POST['tahunajar'];
            $semester=$_POST['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,1);
                            $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
                $this->load->view("dosen/page/bkd/pendidikanBKD",$data);                           
            }
        }
                    
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