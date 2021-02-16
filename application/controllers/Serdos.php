<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Serdos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
		// $this->dosenRequired(array('except'=>array('')));
        $this->load->model("skp_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $this->load->view("dosen/dashboard");
    }

    public function viewBKDSerdos()
    {
        $this->load->view("dosen/page/serdos/bkdSerdos");       
    }

    public function viewSimulasi($datasimulasi=null)
    {   
        $dosen=$this->session->userdata('dosen');
        $nilai_jabatan=$this->cek_nilai_jabatan($dosen);
        $nilai_nkp=$this->cek_nilai_nkp($dosen);
        
        $data['nilai_jabatan']=$nilai_jabatan;
        $data['nilai_nkp']=$nilai_nkp;

        if($datasimulasi!=null){
            $data['hasil_simulasi']=$datasimulasi;
        }
        // echo var_dump($nilai_jabatan);
        // echo var_dump($nilai_nkp);
        $this->load->view("dosen/page/serdos/simulasiPengajuan",$data);              
    }

    public function cek_nilai_jabatan($dosen)
    {
        $nilai_jabatan=0;
        if($dosen->TMT_JAFA=="Asisten Ahli")
        {
            $nilai_jabatan=3;
        }
        else if($dosen->TMT_JAFA=="Dosen"||$dosen->TMT_JAFA=="Lektor")
        {
            $nilai_jabatan=4;
        }
        else if($dosen->TMT_JAFA=="Lektor Kepala"||$dosen->TMT_JAFA=="Dosen Kepala"||$dosen->TMT_JAFA=="Kepala Prodi")
        {
            $nilai_jabatan=5;
        }
        else
        {
            $nilai_jabatan=0;
        }

        if($dosen->pendidikan_terakhir=="s2")
        {
            $nilai_jabatan++;
        }
        else if($dosen->pendidikan_terakhir=="s3")
        {
            $nilai_jabatan+=2;
        }
        return $nilai_jabatan;
    }

    public function cek_nilai_nkp($dosen)
    {
        $nilai_nkp=0;

        if(strcasecmp($dosen->pangkat,"gol iii/a"))
        {
            $nilai_nkp=4;
        }
        else if(strcasecmp($dosen->pangkat,"gol iii/b"))
        {
            $nilai_nkp=4;
        }
        else if(strcasecmp($dosen->pangkat,"gol iii/c"))
        {
            $nilai_nkp=5;
        }
        else if(strcasecmp($dosen->pangkat,"gol iv/a"))
        {
            $nilai_nkp=5;
        }
        else if(strcasecmp($dosen->pangkat,"gol iv/b"))
        {
            $nilai_nkp=6;
        }
        else if(strcasecmp($dosen->pangkat,"gol iv/c"))
        {
            $nilai_nkp=6;
        }
        else if(strcasecmp($dosen->pangkat,"gol iv/d"))
        {
            $nilai_nkp=7;
        }
        else if(strcasecmp($dosen->pangkat,"gol iv/e"))
        {
            $nilai_nkp=7;
        }

        return $nilai_nkp;
    }

    public function simulasi_serdos()
    {
        $post=$this->input->post();
        $nilai_nkp=$post['nilai_nkp'];
        $nilai_nap=$post['nilai_nap'];
        
        $toep=$post['toep'];
        $tpa=$post['tpa'];
        
        $nbi=$this->cek_nilai_toep($toep);
        $npa=$this->cek_nilai_tpa($tpa);

        $persepsional=$this->cek_nilai_persepsional();
        $deskripsi =$this->cek_nilai_deskripsi();
        $konsistensi=$this->cek_nilai_konsistensi($persepsional['kategori_jenis'],$deskripsi['deskripsi_lulus']);
        $gabungan =$this->cek_nilai_gabungan($nilai_nap,$nilai_nkp,$persepsional['nps'],$nbi,$npa);

        $cek_lulus=$persepsional['nilai_lulus']+$deskripsi['nilai_lulus']+$gabungan['nilai_lulus']+$konsistensi['nilai_lulus'];
        $lulus;
        if($cek_lulus=4){
            $lulus="lulus";
        }   
        else{
            $lulus="tidak lulus";
        }
        
        $data_simulasi['penilaian_persepsional']=$persepsional['nps'];
        $data_simulasi['penilaian_deskripsi']=$deskripsi['nilai_rerata'];
        $data_simulasi['penilaian_konsistensi']=$konsistensi['konsistensi'];
        $data_simulasi['penilaian_gabungan']=$gabungan['nilai_gabungan'];
        $data_simulasi['lulus_simulasi']=$lulus;

        // echo var_dump($data_simulasi);
        $this->viewSimulasi($data_simulasi);

    }

    public function cek_nilai_konsistensi($kategori_persepsional,$kategori_deskripsi)
    {
        $konsistensi;
        if($kategori_persepsional==$kategori_deskripsi)
        {
            $konsistensi="tinggi";
        }
        else{
            if($kategori_persepsional=="tinggi")
            {
                if($kategori_deskripsi=="sedang")
                {
                    $konsistensi="sedang";
                }
                else
                {
                    $konsistensi="rendah";
                }
            }
            else if($kategori_persepsional=="sedang")
            {
                if($kategori_deskripsi=="tinggi")
                {
                    $konsistensi="sedang";
                }
                else
                {
                    $konsistensi="sedang";
                }
            }
            else if($kategori_persepsional=="rendah")
            {
                if($kategori_deskripsi=="tinggi")
                {
                    $konsistensi="rendah";
                }
                else
                {
                    $konsistensi="sedang";
                }
            }
        }

        $nilai_lulus;
        if($konsistensi!="rendah")
        {
            $nilai_lulus=1;
        }
        else{
            $nilai_lulus=0;
        }

        $konsistensibaru['konsistensi']=$konsistensi;
        $konsistensibaru['nilai_lulus']=$nilai_lulus;
        return $konsistensibaru;
    }

    public function cek_nilai_persepsional()
    {
        $post=$this->input->post();

        $pedagogik_mhs=$post['pedagogik_mhs'];
        $profesional_mhs=$post['profesional_mhs'];
        $kepribadian_mhs=$post['kepribadian_mhs'];
        $sosial_mhs =$post['sosial_mhs'];

        $pedagogik_teman=$post['pedagogik_teman'];
        $profesional_teman=$post['profesional_teman'];
        $kepribadian_teman=$post['kepribadian_teman'];
        $sosial_teman=$post['sosial_teman'];

        $pedagogik_dys=$post['pedagogik_dys'];
        $profesional_dys=$post['profesional_dys'];
        $kepribadian_dys=$post['kepribadian_dys'];
        $sosial_dys=$post['sosial_dys'];


        $pedagogik_atasan=$post['pedagogik_atasan'];
        $profesional_atasan=$post['profesional_atasan'];
        $kepribadian_atasan=$post['kepribadian_atasan'];
        $sosial_atasan=$post['sosial_atasan'];

        $rerata_pedagogik=($pedagogik_atasan+$pedagogik_dys+$pedagogik_mhs+$pedagogik_teman)/4;
        $rerata_profesional=($profesional_atasan+$profesional_dys+$profesional_mhs+$profesional_teman)/4;
        $rerata_kepribadian=($kepribadian_atasan+$kepribadian_dys+$kepribadian_mhs+$kepribadian_teman)/4;
        $rerata_sosial=($sosial_atasan+$sosial_dys+$sosial_mhs+$sosial_teman)/4;
        $rerata_total=($rerata_kepribadian+$rerata_pedagogik+$rerata_profesional+$rerata_sosial)/4;
        $cek_rerata=0;

        if(!$rerata_kepribadian>4)
        {
            $cek_rerata+=1;
        }
        else if(!$rerata_pedagogik>4)
        {
            $cek_rerata+=1;
        }
        else if(!$rerata_profesional>4)
        {
            $cek_rerata+=1;
        }
        else if(!$rerata_sosial>4)
        {
            $cek_rerata+=1;
        }
        if(!$rerata_total>4.5)
        {
            $cek_rerata+1;
        }

        // $cek_rerata_komponen=0;
        $persepsi=[];
        $nilai_lus=0;
        if($cek_rerata>=1)
        {
            $nilai_lus=0;
        }
        else if($cek_rerata=0)
        {
            $nilai_lus=1;
        }

        $kategori=((($rerata_profesional+$rerata_pedagogik+$rerata_sosial+$rerata_kepribadian)/4)/7)*100;
        $kategori_jenis;
        if($kategori<50)
        {
            $kategori_jenis="rendah";
        }
        else if($kategori>=50||$kategori<70)
        {
            $kategori_jenis="sedang";
        }
        else{
            $kategori_jenis="tinggi";
        }
        // $nilai_lus=0;
        $persepsi['kategori']=$kategori;
        $persepsi['kategori_jenis']=$kategori_jenis;
        $persepsi['nps']=$rerata_total;
        $persepsi['nilai_lulus']=$nilai_lus;
        return $persepsi;
    }

    public function cek_nilai_deskripsi()
    {
        $post=$this->input->post();
        $des_1=$post['des_1']*8;
        $des_2=$post['des_2']*8;
        $des_4=$post['des_3']*4;
        $des_3=$post['des_4']*4;
        $des_5=$post['des_5']*4;
        $des_7=$post['des_7']*18;
        $des_6=$post['des_6']*4;
        $des_8=$post['des_8']*4;
        $des_9=$post['des_9']*4;
        $des_10=$post['des_10']*4;
        $des_11=$post['des_11']*5;
        $des_12=$post['des_12']*4;
        $des_14=$post['des_13']*3;
        $des_13=$post['des_14']*2;
        $des_15=$post['des_15']*2;
        $des_16=$post['des_16']*3;
        $des_17=$post['des_17']*3;
        $des_18=$post['des_18']*2;
        $des_19=$post['des_19']*2;
        $des_20=$post['des_20']*2;
        $des_21=$post['des_21']*4;
        $des_22=$post['des_22']*2;
        $des_23=$post['des_23']*2;
        $des_24=$post['des_24']*2;

        $total=$des_1+$des_2+$des_3+$des_4+$des_5+$des_6+$des_7+$des_8+$des_9+$des_10+$des_11+$des_12+$des_13+$des_14+$des_15+$des_16
                +$des_17+$des_18+$des_19+$des_20+$des_21+$des_22+$des_23+$des_24;



        $rerata_total=$total/100;
        $persen_rerata=$rerata_total/7*100;
        $des_lulus;

        if($persen_rerata<50)
        {
            $des_lulus="rendah";
        }
        else if($persen_rerata>=50||$persen_rerata<70)
        {
            $des_lulus="sedang";
        }
        else
        {
            $des_lulus="tinggi";
        }
        if($rerata_total>4){
            $nilai_lulus=1;
        }
        else{
            $nilai_lulus=0;
        }
        // echo "Rerata Total : $rerata_total";
        $deskripsi['nilai_rerata']=$rerata_total;
        $deskripsi['persen_rerata']=$persen_rerata;
        $deskripsi['deskripsi_lulus']=$des_lulus;
        $deskripsi['nilai_lulus']=$nilai_lulus;        
        return $deskripsi;
    }

    public function cek_nilai_gabungan($nap,$nkp,$nps,$nbi,$npa)
    {
        $nilai_gabungan=(2*$nap+2*$nkp+$nps+$nbi+$npa)/7;

        $nilai_lulus;
        if($nilai_gabungan>4)
        {
            $nilai_lulus=1;
        }
        else{
            $nilai_lulus=0;
        }

        $gabungan['nilai_gabungan']=$nilai_gabungan;
        $gabungan['nilai_lulus']=$nilai_lulus;
        return $gabungan;
    }

    public function cek_nilai_toep($nilai_toep)
    {
        $poin_toep=0;
            if($nilai_toep<26)
            {
                $poin_toep=1;
            }
            else if($nilai_toep>=26||$nilai_toep<=35)
            {
                $poin_toep=2;
            }
            else if($nilai_toep>=36||$nilai_toep<=45)
            {
                $poin_toep=3;
            }
            else if($nilai_toep>=46||$nilai_toep<=55)
            {
                $poin_toep=4;
            }
            else if($nilai_toep>=56||$nilai_toep<=65)
            {
                $poin_toep=5;
            }
            else if($nilai_toep>=66||$nilai_toep<=75)
            {
                $poin_toep=6;
            }
            else if($nilai_toep>=76)
            {
                $poin_toep=7;
            }
        return $poin_toep;
    }

    public function cek_nilai_tpa($nilai_tpa)
    {
           
            $poin_tpa;
            if($nilai_tpa<25)
            {
                $poin_tpa=1;
            }
            else if($nilai_tpa>=25||$nilai_tpa<35)
            {
                $poin_tpa=2;
            }
            else if($nilai_tpa>=35||$nilai_tpa<45)
            {
                $poin_tpa=3;
            }
            else if($nilai_tpa>=45||$nilai_tpa<55)
            {
                $poin_tpa=4;
            }
            else if($nilai_tpa>=55||$nilai_tpa<65)
            {
                $poin_tpa=5;
            }
            else if($nilai_tpa>=65||$nilai_tpa<=74)
            {
                $poin_tpa=6;
            }
            else if($nilai_tpa>74)
            {
                $poin_tpa=7;
            }

            return $poin_tpa;
    }

    public function viewPengajuan()
    {
        $this->load->view("dosen/page/serdos/pengajuan");              
    }


   public function delete($id=null)
    {
   
    }
}