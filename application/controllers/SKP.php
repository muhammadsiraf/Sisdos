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
            $tahunajar="2018-2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")->id_tridharma;
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
        $fileberkas=$post["fileupload"];
        echo "berkas file nama: $fileberkas";
		$namafile=uniqid();
        $config['upload_path']          = './file/berkas';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|doc|docx';
		$config['file_name']            = $namafile;
        $this->load->library('upload', $config);
        
        if (isset($_FILES) && @$_FILES['fileupload']['error'] == '0') 
        {
            if ( ! $this->upload->do_upload('fileupload'))
            {

            }
            else
            {
                $upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
            }
        }
        else{
            $file_name="kosong";
        }


        $where=array(
            'id_pskp'=>$idpskp,
        );

        $dataMasuk=array(
            'realisasi_jumlah'=>$realisasiJumlah,
            'realisasi_kualitas'=>$realisasiKualitas,
            'berkas_bukti_capaian'=>$file_name,
        );

        $skp->updateSKP($dataMasuk,$where);
        // redirect("/skp/evaluasi");

    }

    public function eval_approval()
    {
        $skp=$this->skp_model;
        $post=$this->input->post();
        $id_tridharma=$post['id_tridharma'];
        $skp->update_approval_eval_skp($id_tridharma);
        redirect("/penilaian/skpbkd/approval-evaluasi/$id_tridharma");
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

    public function view_hasil_skp()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018-2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")!=null)
            {
                            $tridharma=$skp->getTridharma($iddosen,"genap","2018-2019");
                            $id_tridharma=$tridharma->id_tridharma;
                            $dataRancanganSKP=$skp->getEvalSKP($id_tridharma);
                            $data['idtridharma']=$id_tridharma;
                            $data['tridharma']=$tridharma;
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['tridharma']=null;
                $data['dataSKP']=null;
            }
            $this->load->view("dosen/page/skp/hasil_skp",$data);               
        }
        else{
            $tahunajar=$_POST['tahunajar'];
            $semester=$_POST['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)!=null)
            {
                            $tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar);                            
                            $id_tridharma=$tridharma->id_tridharma;
                            $dataRancanganSKP=$skp->getEvalSKP($id_tridharma);
                            $data['tridharma']=$tridharma;
                            $data['id_tridharma']=$id_tridharma;
                            $data['dataSKP']=$dataRancanganSKP;            
            }
            else{
                $data['tridharma']=null;
                $data['dataSKP']=null;
            }
            $this->load->view("dosen/page/skp/hasil_skp",$data);   
        }
    }

    public function viewPendidikanBKD()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018-2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")->id_tridharma;
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
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018-2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,2);
                            $data['idtridharma']=$id_tridharma;
                            $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
            }
            $this->load->view("dosen/page/bkd/penelitianBKD",$data);                           
        }
        else{
            $tahunajar=$_POST['tahunajar'];
            $semester=$_POST['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,2);
                            $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
                $this->load->view("dosen/page/bkd/penelitianBKD",$data);                           
            }
        }             
       
    }

    public function viewPengabdianBKD()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018-2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,3);
                            $data['idtridharma']=$id_tridharma;
                            $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
            }
            $this->load->view("dosen/page/bkd/pengabdianBKD",$data);                           
        }
        else{
            $tahunajar=$_POST['tahunajar'];
            $semester=$_POST['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,3);
                            $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
                // $this->load->view("dosen/page/bkd/pengabdianBKD",$data);  

            }
                $this->load->view("dosen/page/bkd/pengabdianBKD",$data);                           

        }           
       
    }

    public function viewPenunjangBKD()
    {
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018-2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,4);
                            $data['idtridharma']=$id_tridharma;
                            $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
            }
            $this->load->view("dosen/page/bkd/penunjangBKD",$data);                           
        }
        else{
            $tahunajar=$_POST['tahunajar'];
            $semester=$_POST['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,4);
                            $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
            }

            $this->load->view("dosen/page/bkd/penunjangBKD",$data);                           

        }            
    }
    
    public function updateBKD($idjenis)
    {
        $skp=$this->skp_model;
        $post=$this->input->post();
        $idpskp=$post["idpskp"];
        $sksBKD=$post["sksBKD"];
        $rekomendasi=$post["rekomendasi"];
        
        $where=array(
            'id_pskp'=>$idpskp,
        );

        $dataMasuk=array(
            'sks_bkd'=>$sksBKD,
            'rekomendasi'=>$rekomendasi
        );


        $skp->updateSKP($dataMasuk,$where);
        if($idjenis==1){
            redirect("/bkd/pendidikan");
        }elseif($idjenis==2){
            redirect("/bkd/penelitian");
        }elseif($idjenis=3){
            redirect("/bkd/pengabdian");
        }elseif($idjenis=4){
            redirect("/bkd/penunjang");
        }
    }

    public function viewKesimpulanBKD()
    {   
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        
        $skp=$this->skp_model;
        if(!ISSET($_POST['tahunajar'],$_POST['semester'])){
            $tahunajar="2018-2019";
            $semester="genap";
            if($id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,"genap","2018-2019")->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,1);
                            $pendidikan=$skp->getBKDperjenis($id_tridharma,1);
                            $penelitian=$skp->getBKDperjenis($id_tridharma,2);
                            $pengabdian=$skp->getBKDperjenis($id_tridharma,3);
                            $penunjang=$skp->getBKDperjenis($id_tridharma,4);
                            $sumPendidikan=$this->sumSKS($pendidikan);
                            $sumPenelitian=$this->sumSKS($penelitian);
                            $sumPengabdian=$this->sumSKS($pengabdian);
                            $sumPenunjang=$this->sumSKS($penunjang);
                            $pendPenel=$sumPendidikan+$sumPenelitian;
                            $pengPenun=$sumPengabdian+$sumPenunjang;
                            $total=$sumPendidikan+$sumPenelitian+$sumPengabdian+$sumPenunjang;
                            $array_syarat=$this->cekSyaratBKD($sumPendidikan,$sumPenelitian,$sumPengabdian,$pendPenel,$pengPenun,$total);
                            $data['idtridharma']=$id_tridharma;
                            $data['dataBKD']=$dataRancanganSKP;            
                            $data['sum_pendidikan']=$sumPendidikan;
                            $data['sum_penelitian']=$sumPenelitian;
                            $data['sum_pengabdian']=$sumPengabdian;
                            $data['sum_penunjang']=$sumPenunjang;
                            $data['sum_pend_penel']=$pendPenel;
                            $data['sum_pengab_penun']=$pengPenun;
                            $data['sum_total']=$total;
                            $data['syarat_bkd']=$array_syarat;
            }
            else{
                
                $data['dataBKD']=null;
                $data['sum_pendidikan']=0;
                $data['sum_penelitian']=0;
                $data['sum_pengabdian']=0;
                $data['sum_penunjang']=0;
                $data['sum_pend_penel']=0;
                $data['sum_pengab_penun']=0;
                $data['sum_total']=0;
                $data['syarat_bkd']=$this->syaratBelum();
            }
                $this->load->view("dosen/page/bkd/kesimpulanBKD",$data);                     
        }
        else{
            $tahunajar=$_POST['tahunajar'];
            $semester=$_POST['semester'];
            if($id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)!=null)
            {
                            
                            $id_tridharma=$skp->getTridharma($iddosen,$semester,$tahunajar)->id_tridharma;
                            $dataRancanganSKP=$skp->getBKDperjenis($id_tridharma,1);
                            $pendidikan=$skp->getBKDperjenis($id_tridharma,1);
                            $penelitian=$skp->getBKDperjenis($id_tridharma,2);
                            $pengabdian=$skp->getBKDperjenis($id_tridharma,3);
                            $penunjang=$skp->getBKDperjenis($id_tridharma,4);
                             $sumPendidikan=$this->sumSKS($pendidikan);
                            $sumPenelitian=$this->sumSKS($penelitian);
                            $sumPengabdian=$this->sumSKS($pengabdian);
                            $sumPenunjang=$this->sumSKS($penunjang);
                            $pendPenel=$sumPendidikan+$sumPenelitian;
                            $pengPenun=$sumPengabdian+$sumPenunjang;
                            $total=$sumPendidikan+$sumPenelitian+$sumPengabdian+$sumPenunjang;
                            $array_syarat=$this->cekSyaratBKD($sumPendidikan,$sumPenelitian,$sumPengabdian,$pendPenel,$pengPenun,$total);
                            $data['idtridharma']=$id_tridharma;
                            $data['dataBKD']=$dataRancanganSKP;            
                            $data['sum_pendidikan']=$sumPendidikan;
                            $data['sum_penelitian']=$sumPenelitian;
                            $data['sum_pengabdian']=$sumPengabdian;
                            $data['sum_penunjang']=$sumPenunjang;
                            $data['sum_pend_penel']=$pendPenel;
                            $data['sum_pengab_penun']=$pengPenun;
                            $data['sum_total']=$total;
                            $data['syarat_bkd']=$array_syarat;
                            // $data['dataBKD']=$dataRancanganSKP;            
            }
            else{
                $data['dataBKD']=null;
                $data['sum_pendidikan']=0;
                $data['sum_penelitian']=0;
                $data['sum_pengabdian']=0;
                $data['sum_penunjang']=0;
                $data['sum_pend_penel']=0;
                $data['sum_pengab_penun']=0;
                $data['sum_total']=0;
                $data['syarat_bkd']=$this->syaratBelum();
            }
               
            $this->load->view("dosen/page/bkd/kesimpulanBKD",$data);                     

        }
    }

    public function sumSKS($arrayObjek)
    {
        $sumSKS=0;
        foreach($arrayObjek as $array){
            $sumSKS=$array->sks_bkd+$sumSKS;
        }   
        return $sumSKS;
    }

    public function cekSyaratBKD($sumPendidikan,$sumPenelitian, $sumPengabdian, $pendPenel,$pengPenun,$total)
    {

        $syarat= [];
        $penuh=0;
        $tidak=0;
                if($sumPendidikan!=0){
                    $syarat[0]="M";
                    $penuh++;
                }else{
                    $syarat[0]="TM";
                    $tidak++;
                }

                if($sumPenelitian!=0){
                    $syarat[1]="M";
                    $penuh++;
                }else{
                    $syarat[1]="TM";
                    $tidak++;
                    
                }

                if($sumPengabdian!=0){
                    $syarat[2]="M";
                    $penuh++;

                }else{
                    $syarat[2]="TM";
                    $tidak++;

                }

                if($pendPenel>=9){
                    $syarat[3]="M";
                    $penuh++;

                }else{
                    $syarat[3]="TM";
                    $tidak++;

                }

                if($pengPenun>=3){
                    $syarat[4]="M";
                    $penuh++;

                }else{
                    $syarat[4]="TM";
                    $tidak++;

                }

                if($total>=12){
                    $syarat[5]="M";
                    $penuh++;

                }else{
                    $syarat[5]="TM";
                    $tidak++;

                }
                
                if($penuh>$tidak){
                    $syarat[6]="Memenuhi Syarat";
                }
                else{
                    $syarat[6]="Belum Memenuhi Syarat";                    
                }
        return $syarat;
    }

    public function syaratBelum(){
         $syarat[0]="TM";
          $syarat[1]="TM";
           $syarat[2]="TM";
            $syarat[3]="TM";
             $syarat[4]="TM";
              $syarat[5]="TM";
               $syarat[6]="Belum Memenuhi Syarat";

        return $syarat;
    }

    public function edit($id=null)
    {
       
    }

   public function delete($id=null)
    {
   
    }

   public function view_dosne()
    {

    }
}