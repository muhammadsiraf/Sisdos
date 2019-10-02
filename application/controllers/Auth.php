<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("auth_model");
		$this->load->model("dosen_model");
		$this->load->model("skp_model");
        $this->load->library('form_validation');
    }

    public function index()
    {	
		
		$statuslogin=$this->session->userdata('status');
		if($statuslogin!=null)
		{
			redirect(base_url('home'));
		}        
		else{
			// echo "Test: $statuslogin";
			$this->load->view("login_view");
		}
    }


	public function aksi_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$cek = $this->auth_model->cek_login($username,$password);
		$numrow = $cek->num_rows();
					
		// $level = $level->tipe;

		if($numrow > 0){
		
		$level = $cek->row()->tipe;
		
		if ($level==1) {
			$statuslogin="loginadmin";
		}elseif ($level==2) {
			$statuslogin="logindosen";
			$dosen = $this->dosen_model->getByUsername($username);
		}elseif ($level==3) {
			$statuslogin="logindikti";
		}
			$data_session = array(
				'nama' => $username,
				'dosen'=> $dosen,
				'status' => $statuslogin
			);

			$this->session->set_userdata($data_session);
			
			if($statuslogin=='loginadmin'){
				redirect(base_url("home"));
			}
			elseif($statuslogin=='logindosen'){
				redirect(base_url("home"));				
			}
			elseif($statuslogin=='logindikti'){
				redirect(base_url("home"));
			}

		}else{
			$data["notif"]="Username dan Password Salah";
			// echo "Username $username dan password salah $password !";
			$this->load->view('login_view',$data);
			// echo 
		}
 	}
	 
	public function logout()
    {
 		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
	public function home()
    {
		$whoislogin=$this->session->userdata('status');
		if($whoislogin=='loginadmin'){
	        $this->load->view("admin/dashboard");
		}elseif($whoislogin=='logindosen'){
			$skp=$this->skp_model;
			$dosen=$this->session->userdata('dosen');
			$data_tridharma_dosen=$skp->get_all_tridharma_dosen($dosen->id_dosen);
			$data_dashboard['data_tridharma']=$data_tridharma_dosen;
	        $this->load->view("dosen/dashboard",$data_dashboard);		
		}elseif($whoislogin=='logindikti'){
	        $this->load->view("dikti/dashboard");		
		}
    }

	public function viewDashboardAdmin()
    {
        $this->load->view("admin/dashboard");		
    }

	public function viewDashboardDikti()
    {
        $this->load->view("dikti/dashboard");
	}
	

    public function add()
    {
 

    }

    public function edit($id=null)
    {

    }

   public function delete($username=null)
   {
		$this->auth_model->delete($username);
		redirect("administrasi/akun");
   }

   public function view_administrasi_akun()
   {
	   if($this->session->userdata('status'))
	   {
		   $data_all_akun=$this->auth_model->getAll();
            $panjang_data=count($data_all_akun);
            $config['base_url']=base_url("administrasi/akun");
            $config['total_rows']=$panjang_data;
            $config['per_page']=5;
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
            $data_admin['akun']=$this->auth_model->get_all_akun_per(5,$from);
            $this->load->view("admin/page/admin_akun/administrasi_akun",$data_admin);
		//    $this->load->view("admin/page/administrasi_akun");
	   }
	   else{
		   redirect(base_url("home"));
	   }
   }
   
}