<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SKP extends MY_Controller
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
        $this->load->view("dosen/dashboard");
    }

    public function viewRancanganSKP()
    {
        $this->load->view("dosen/page/skp/rancanganSKP");       
    }

    public function viewEvaluasiSKP()
    {
        $this->load->view("dosen/page/skp/evaluasiSKP");              
    }

    public function viewKomponenSKP()
    {
        $this->load->view("dosen/page/skp/komponenSKP");              
    }

    public function viewPendidikanBKD()
    {
        $this->load->view("dosen/page/bkd/pendidikanBKD");                     
    }

    public function viewPenelitianBKD()
    {
        $this->load->view("dosen/page/bkd/penelitianBKD");              
       
    }

    public function viewPengabdianBKD()
    {
        $this->load->view("dosen/page/bkd/pengabdianBKD");              
       
    }

    public function viewPenunjangBKD()
    {
        $this->load->view("dosen/page/bkd/penunjangBKD");              
    }
    

    public function viewKesimpulanBKD()
    {
        $this->load->view("dosen/page/bkd/kesimpulanBKD");                     
    }
    public function edit($id=null)
    {
       
    }

   public function delete($id=null)
    {
   
    }
}