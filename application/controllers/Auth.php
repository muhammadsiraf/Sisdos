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
		
		$statuslogin=$this->session->userdata('statuslogin');
		if($statuslogin!=null)
		{
			redirect(base_url('home'));
		}        
		else{
			$this->load->view("loginview");
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
			$this->load->view('LoginView',$data);
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

   public function delete($id=null)
   {

   }
   
}