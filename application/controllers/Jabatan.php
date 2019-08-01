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
                // echo "data berkas: $data->berkas_bukti_capaian";
                if($data->berkas_bukti_capaian==null||$data->berkas_bukti_capaian=="kosong"){
                    // echo "preketek";
                }
                else{
                     $datainput=base_url("file/berkas/$data->berkas_bukti_capaian");
                    // echo "data input : $datainput <br>";
                     $name=$data->berkas_bukti_capaian;
                     $data=file_get_contents($datainput);
                     $zip1->add_data($name,$data);
                
                }
               
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
     
        $iddosen=$this->session->userdata('dosen')->id_dosen;
        $skp=$this->skp_model;
        $dosen=$this->dosen_model;
        $tridharma_akhir=$this->get_tridharma_last_2_years($iddosen);
        $total_kredit_skp=0;
        
        foreach($tridharma_akhir as $akhir){
            $total_kredit_skp=$total_kredit_skp+$akhir->nilai_kredit_skp;
        }
        // echo "Total Kredit SKP 2 Tahun : $total_kredit_skp";
        $dosen->update_angka_kredit($total_kredit_skp,$iddosen);
        $data["total_kredit"]=$total_kredit_skp;
        
        
        $kredit_pendidikan=0;
        $kredit_penelitian=0;
        $kredit_pengabdian=0;
        $kredit_penunjang=0;
        $data["prektek"]="BOI";
        $dummi[0]=0;
        $dummi[1]=1;
        $dummi[2]=2;
        $dummi[3]=3;

        foreach($tridharma_akhir as $akhir)
        {
            // echo "Id : $akhir->id_tridharma";
            
                $data_tri=$skp->getSKPperJenis($akhir->id_tridharma,1);
                $panj=count($data_tri);

                for($i=0;$i<$panj;$i++)
                {
                    $kredit_pendidikan=$kredit_pendidikan+$data_tri[$i]->nilai_kredit_akhir;
                }
                $data_tri=$skp->getSKPperJenis($akhir->id_tridharma,2);
                $panj=count($data_tri);
                if($data_tri!=null)
                {
                    for($i=0;$i<$panj;$i++)
                    {
                         $kredit_penelitian=$kredit_penelitian+$data_tri[$i]->nilai_kredit_akhir;
                    }
                }
                $data_tri=$skp->getSKPperJenis($akhir->id_tridharma,3);
                $panj=count($data_tri);
                if($data_tri!=null)
                {
                    for($i=0;$i<$panj;$i++)
                    {
                         $kredit_pengabdian=$kredit_pengabdian+$data_tri[$i]->nilai_kredit_akhir;
                    }
                }
                $data_tri=$skp->getSKPperJenis($akhir->id_tridharma,4);
                $panj=count($data_tri);

               if($data_tri!=null)
                {
                    for($i=0;$i<$panj;$i++)
                    {
                         $kredit_penunjang=$kredit_penunjang+$data_tri[$i]->nilai_kredit_akhir;
                    }
                }

        }

        $data_simulasi=$this->simulasi_jabatan();

        $data["kredit_pendidikan"]=$kredit_pendidikan;        
        $data["kredit_penelitian"]=$kredit_penelitian;
        $data["kredit_pengabdian"]=$kredit_pengabdian;
        $data["kredit_penunjang"]=$kredit_penunjang;

        if($data_simulasi!=null){
            $data_simulasi['pendidikan']=$data_simulasi['pendidikan']-$kredit_pendidikan;
            $data_simulasi['penelitian']=$data_simulasi['penelitian']-$kredit_penelitian;
            $data_simulasi['pengabdian']=$data_simulasi['pengabdian']-$kredit_pengabdian;
            $data_simulasi['penunjang']=$data_simulasi['penunjang']-$kredit_penunjang;
            $data["data_simulasi"]=$data_simulasi;
            // echo var_dump($data["data_simulasi"]);
        }
        
        
        $this->load->view("dosen/page/jabatan/simulPenilaian",$data);              

    }

    public function simulasi_jabatan()
    {
        $post=$this->input->post();
        $dosen=$this->session->userdata('dosen');
        $dosen_model=$this->dosen_model;
        $data_simulasi=[];
        if(isset($post['jabatan_tujuan'])){
            if($post['jabatan_tujuan']!=null){
                $golongan=$dosen->pangkat;
                $golongan_tujuan=$post['jabatan_tujuan'];

            // echo var_dump($golongan);    
            
                $kredit_golongan_sekarang=$dosen_model->get_kredit_golongan($golongan);
                $kredit_golongan_tujuan=$dosen_model->get_kredit_golongan($golongan_tujuan);
                $goblogk="preketek";

            // echo var_dump($kredit_golongan_sekarang);
            // echo "Kreidt : ".var_dump($kredit_golongan_tujuan);

                $beda_kredit=abs($kredit_golongan_sekarang->kredit-$kredit_golongan_tujuan->kredit);
                $data_simulasi['pendidikan']=($beda_kredit*$kredit_golongan_tujuan->pendidikan)/100;
                $data_simulasi['penelitian']=($beda_kredit*$kredit_golongan_tujuan->penelitian)/100;
                $data_simulasi['pengabdian']=($beda_kredit*$kredit_golongan_tujuan->pengabdian)/100;
                $data_simulasi['penunjang']=($beda_kredit*$kredit_golongan_tujuan->penunjang)/100;
            }
        }

        return $data_simulasi;
    }

    public function get_tridharma_last_2_years($iddosen)
    {
        $skp=$this->skp_model;
        $year=(int)date("Y");
        $Month=date("m");
        if($Month>=7)
        {
            $year=$year+1;
        }
        // echo var_dump($year);
        $all_tridharma=$skp->get_all_tridharma_dosen($iddosen);
        // echo var_dump($all_tridharma);
        // echo "<br>";
        $tridharma_last=[];
        foreach($all_tridharma as $all){
            // echo $all->tahun_ajaran."<br>";
            $tahun_ajar=$all->tahun_ajaran;
            $tahun_ajar=explode("-",$tahun_ajar);
            $tahun2=$tahun_ajar[1];
            if($tahun2==$year){
                array_push($tridharma_last,$all);
            }
            elseif($tahun2==$year-1){
                array_push($tridharma_last,$all);
            }
        }
        // echo "<br>";
        // echo var_dump($tridharma_last);
        return $tridharma_last;
    }

    public function viewPengajuan()
    {
        $this->load->view("dosen/page/jabatan/pengajuan");              
    }


   public function delete($id=null)
    {
   
    }
}