<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->library('form_validation');
    }

    public function index()
    {	
        $this->load->view("loginview");
    }


	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);

		$cek = $this->auth_model->cek_login("registrasi",$where);
		$numrow = $cek->num_rows();
		$level = $cek->row()->tipe;
		if($numrow > 0){

		if ($level==1) {
			$statuslogin="admin";
		}elseif ($level==2) {
			$statuslogin="dosen";
		}elseif ($level==3) {
			$statuslogin="dikti";
		}
			$data_session = array(
				'nama' => $username,
				'status' => $statuslogin
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("home"));

		}else{
			echo "Username dan password salah !";
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