<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("dosen/dashboard");
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