<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("auth_model");
		$this->load->model("dosen_model");
        $this->load->library('form_validation');
    }

    public function index()
    {	
        $this->load->view("loginview");
    }


	public function aksi_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$cek = $this->auth_model->cek_login($username,$password);
		$numrow = $cek->num_rows();
					
		$level = $level->tipe;

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

			redirect(base_url("home"));

		}else{
			
			echo "Username $username dan password salah $password !";
			
			// echo 
		}
 	}
	 
	public function logout()
    {
 		$this->session->sess_destroy();
		redirect(base_url('login'));
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