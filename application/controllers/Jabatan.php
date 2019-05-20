<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends MY_Controller
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

    public function viewKelengkapan()
    {
        $this->load->view("dosen/page/jabatan/kelengkapan");       
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