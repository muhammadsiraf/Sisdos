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

    public function viewSimulasi()
    {
        $this->load->view("dosen/page/serdos/simulasiPengajuan");              
    }

    public function viewPengajuan()
    {
        $this->load->view("dosen/page/serdos/pengajuan");              
    }


   public function delete($id=null)
    {
   
    }
}