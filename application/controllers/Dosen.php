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
        $this->load->model("auth_model");
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
        $data['pangkat']=$this->dosen_model->get_pangkat_by_dosen($this->session->userdata('dosen')->id_dosen);
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
             $validation->set_rules($dosen->rules_update());
            //  if($validation->run()){
                 $dosen->updateProfil();
                 $this->session->set_flashdata('success', 'berhasil simpan data baru');
                 redirect('/profile/');
            //  }
            //  else{
                //  redirect('/profile/');
            //  }
             
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

    public function tambah_pangkat()
    {
       $dosencek=$this->session->userdata('dosen');
       $dosen=$this->dosen_model;
       if (ISSET($_POST['id_dosen'])){
            // $id_dosen=$_POST['id_dosen'];
            // echo var_dump($id_dosen);
            // echo "preketek";
            // echo "$id_dosen";
            $dosen->tambah_pangkat();
            redirect('/profile/');
       }
       else if  ($dosencek!=null){
             $data['dosen']=$dosencek;
             $this->load->view("dosen/page/pangkat",$data);           
       }
    }


    public function hapus_pangkat($id_riwayat_pangkat)
    {
       $dosencek=$this->session->userdata('dosen');
       $dosen=$this->dosen_model;   
       if  ($dosencek!=null){
            $dosen->hapus_pangkat($id_riwayat_pangkat);
            redirect($_SERVER['HTTP_REFERER']);     
       }
    }

    public function edit_pangkat($id_riwayat_pangkat)
    {
       $dosencek=$this->session->userdata('dosen');
       $dosen=$this->dosen_model;
       if($dosencek!=null){
             $data['id_pangkat']=$id_riwayat_pangkat;
             $data['dosen']=$dosencek;
             $data['edit']=1;
             $this->load->view("dosen/page/pangkat",$data);           
       }
       if(ISSET($_POST['pangkat'])){
            $post=$this->input->post();
            $dosen->update_pangkat($id_riwayat_pangkat,$post['pangkat']);
            redirect("profile");
       }
    }

    public function tambahPendidikan()
    {
        $dosencek=$this->session->userdata('dosen');
        // $this->form_validation->set_rules('jenjang','Nama','required');
		// $this->form_validation->set_rules('perguruan_tinggi','Email','required|alpha_numeric_spaces');
		// $this->form_validation->set_rules('program_studi','Konfirmasi Email','required|alpha_numeric_spaces');
		// $this->form_validation->set_rules('negara','Konfirmasi Email','required|alpha');
		// $this->form_validation->set_rules('tahun_mulai','Konfirmasi Email','required|numeric');
		// $this->form_validation->set_rules('tahun_selesai','Konfirmasi Email','required|numeric');
		// $this->form_validation->set_rules('gelar','Konfirmasi Email','required');
		// $this->form_validation->set_rules('sumberdana','Konfirmasi Email','required|alpha');
        
        if($dosencek!=null){
             echo "dosen check true";
             $pendidikan = $this->pendidikan_model;
             $validation = $this->form_validation;
            // if($validation->run()!=false){
                $pendidikan->addPendidikan();
                $this->session->set_flashdata('success', 'berhasil simpan data baru');
                redirect('/profile/');
            // }else{
                // $dosen=$this->dosen_model->getByUsername($username);
                // $username=$this->session->userdata('dosen')->username;
                // $data['pendidikan']=$this->pendidikan_model->getByDosen($dosen->id_dosen);
                // $data['dosen']=$dosen;
                // $data['pangkat']=$this->dosen_model->get_pangkat_by_dosen($this->session->userdata('dosen')->id_dosen);
                // $this->load->view("dosen/page/profile",$data);
            // }     
              
        }
    }

    public function hapusPendidikan($id_pendidikan)
    {
        $pendidikan = $this->pendidikan_model;
        $pendidikan->hapusPendidikan($id_pendidikan);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function editPendidikan($id_pendidikan)
    {
        $pendidikan = $this->pendidikan_model;
        $data['pendidikan']=$pendidikan->get_by_id($id_pendidikan);
        // $test=$pendidikan->get_by_id($id_pendidikan);
        // echo $test->id_pendidikan;
        $this->load->view("dosen/page/editPendidikan",$data);   
        if(ISSET($_POST['id_pendidikan'])){
            $pendidikan->updatePendidikan();
            redirect("profile");
        }     
    }

   public function delete($id=null)
   {
       if($id!=null){
            $this->dosen_model->delete($id);
           redirect(base_url("administrasi/dosen/"));
       }
       else{
           redirect(base_url("administrasi/dosen/"));
       }
   }

    
   public function uploadPhoto()
    {
       $dosencek=$this->session->userdata('dosen');
       $dosen=$this->dosen_model;
       $id_dosen=$dosencek->id_dosen;
       $id_photo=uniqid();
       if  ($dosencek!=null){
                $config['upload_path']          = './datadosen/profile';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 1024;
                $config['max_height']           = 1024;
                $config['file_name']            = $id_photo;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto_dosen'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $eror = $this->upload->display_errors();
                        echo $eror;
                        echo "gagal upload";    
                        redirect($_SERVER['HTTP_REFERER']);

                }
                else
                {
                        // redirect($_SERVER['HTTP_REFERER']);
                        $data = $this->upload->data();
                        $file_name= $data['file_name'];
                        $dosen->upload_foto_dosen($id_dosen,$file_name);
                        redirect($_SERVER['HTTP_REFERER']);

                        // echo "berhasil Upload"; 
                }
                
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
        $skp=$this->skp_model;
        $post=$this->input->post();
        $id_tridharma=$post['id_tridharma'];
        $dosen->update_persetujuan_eval_skp();
        $skp=$this->SKP_model;
        $data_nilai_skp=$skp->get_skp_nilai($id_tridharma);
        $data_tridharma=$skp->cek_tridharma($id_tridharma);
        // echo var_dump($data_nilai_skp);
        $total_kredit_skp=0;
        $total_skp_approve=0;
        $count_panjang_skp=0;
        foreach($data_nilai_skp as $data)
        {
            echo $data->uraian."<br>";
            $realisasi_jumlah=$data->realisasi_jumlah;
            $realisasi_kualitas=$data->realisasi_kualitas;
            echo $data->realisasi_jumlah."<br>";
            echo $data->realisasi_kualitas."<br>";
            echo $data->approval."<br>";
            echo $data->kredit."<br>";
            echo $data->maks_jumlah."<br>";
            // echo $data->uraian."<br>";
            if($realisasi_jumlah>=$data->maks_jumlah){
                $realisasi_jumlah=$data->maks_jumlah;
            }
            if($data->approval==1){
                $total_skp_approve++;
            }
            $total_nilai=($realisasi_jumlah*$realisasi_kualitas/100)*$data->approval*$data->kredit;
            $skp->update_kredit_hasil_skp($data->id_pskp,$total_nilai);
            $total_kredit_skp=$total_kredit_skp+$total_nilai;
            echo "Total Nilai: ".$total_nilai;
            echo "<br>";
            $count_panjang_skp++;
        }
        $total_skp_lulus=$total_skp_approve/$count_panjang_skp*100;
        $total_nilai=($total_skp_lulus*70/100)+($data_tridharma->nilai_perilaku*30/100);
        echo "Total Kredit Dosen Dalam 1 Semester: $total_kredit_skp"."<br>";
        echo "Persentase SKP pass : $total_skp_lulus"."<br>";
        echo "Total Nilai Semester ini : $total_nilai"."<br>";
        $dosen->update_kredit_tridharma($total_kredit_skp, $id_tridharma);
        $dosen->update_persentase_skp($total_skp_lulus,$id_tridharma);
        $dosen->update_totalnilai_tridharma($total_nilai,$id_tridharma);


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

    public function view_administrasi_dosen()
    {

        if($this->session->userdata('status')=="loginadmin")
        {
            $data_all_dosen=$this->dosen_model->getAll();
            $panjang_data=count($data_all_dosen);
            $config['base_url']=base_url("administrasi/dosen");
            $config['total_rows']=$panjang_data;
            $config['per_page']=3;
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $from =$this->uri->segment(3);
            $this->pagination->initialize($config);
            $data_admin['dosen']=$this->dosen_model->get_all_dosen_per(3,$from);
            $this->load->view("admin/page/admin_dosen/administrasi_dosen",$data_admin);
        }
        else{
            redirect(base_url("home"));
        }
    }

    public function view_detail_admin_dosen($id_dosen)
    {
        if($this->session->userdata('status')=="loginadmin")
        {
            $data_dosen=$this->dosen_model->getById($id_dosen);
            $data['dosen']=$data_dosen;
            $this->load->view("admin/page/admin_dosen/detail_dosen",$data);
        }
        else{
            redirect(base_url("home"));
        }
    }

    public function update_admin()
    {
         if($this->session->userdata("status")=="loginadmin")
         {
         $dosen = $this->dosen_model;
         $this->load->library('form_validation');
         
         $config = $dosen->rules_update();


         $this->form_validation->set_rules($config);

         if($this->form_validation->run()==false){
             $id_dosen=$this->input->post('id_dosen');
            //  print_r($this->form_validation->get_all_errors());
            // echo var_dump($this->form_validation->run());
            // echo validation_errors();
            redirect(base_url("administrasi/dosen/detail/$id_dosen"));
         }
         else{
            $dosen->update_by_admin();    
            $id_dosen=$this->input->post('id_dosen');
            redirect(base_url("administrasi/dosen/detail/$id_dosen"));
         }

         
         }
         
    }

    public function view_form_new_akun()
    {
        $this->load->library('form_validation');
        
        $config = array(
            array(
                'field'=>'username',
                'label'=>'Username',
                'rules'=>'trim|required|min_length[3]|max_length[12]|is_unique[registrasi.username]',
                    array(
                        'required'      => 'You have not provided %s.',
                        'is_unique'     => 'This %s already exists.'
                    )
            ),
            array(
                'field'=>'password',
                'label'=>'Password',
                'rules'=>'trim|min_length[6]|max_length[12]|required',
                'errors'=> array(
                        'required'=>'You must provide a %s',
                )
            ),
            array(
                'field'=>'password_conf',
                'label'=>'Password Confirmation',
                'rules'=>'trim|min_length[6]|max_length[12]|required|matches[password]',
                'error'=> array(
                        'matches'=>'password different bro',
                )
            ),
            array(
                'field'=>'rasanya',
                'label'=>'rasanya',
                'rules'=>'trim|min_length[6]|max_length[12]|',
                'error'=> array(
                        '',
                )
            ),

        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->load->view("admin/page/admin_akun/new_akun");            
        }
        else{
            $this->auth_model->save();
            $post=$this->input->post();
            $username=$post['username'];
            $data=array(
                "username"=>$username,
            );
            $this->dosen_model->make_dosen($data);
            // $this->load->view("admin/page/admin_akun/success_new_akun");
            redirect("administrasi/akun");
        }
        // $this->view->load("");
    }


    public function edit_akun($id_dosen=null)
    {
        if($id_dosen!=null)
        {
            $this->load->library('form_validation');
            $config = array(
            array(
                'field'=>'username',
                'label'=>'Username',
                'rules'=>'trim|required|min_length[3]|max_length[12]|is_unique[registrasi.username]',
                    array(
                        'required'      => 'You have not provided %s.',
                        'is_unique'     => 'This %s already exists.'
                    )
            ),
            array(
                'field'=>'password',
                'label'=>'Password',
                'rules'=>'trim|min_length[6]|max_length[12]|required',
                'errors'=> array(
                        'required'=>'You must provide a %s',
                )
            ),
            array(
                'field'=>'password_conf',
                'label'=>'Password Confirmation',
                'rules'=>'trim|min_length[6]|max_length[12]|required|matches[password]',
                'error'=> array(
                        'matches'=>'password different bro',
                )
            ),

        );

        $this->form_validation->set_rules($config);

        if($this->fom_validation->run()==false){
            $this->load->view("admin/page/admin_akun/edit_akun");        
        }
        else{
            $post=$this->input->post();
            $username=$post['username'];
            $id_dosen=$this->dosen_model->getByUsername($username)->id_dosen;
            // $this->auth_model->update();
            $data_update= array(
                "username"=>$username,
            );
            $this->dosen_model->update_dosen_where();

        }
        $this->load->view("admin/page/admin_akun/edit_akun");
        }
    }
    

    

    
    




}