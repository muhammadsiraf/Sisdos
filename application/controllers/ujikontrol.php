<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ujikontrol extends CI_Controller
{

    function __construction(){
        parent::__contruct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view("uji/testjs");
    }

    public function aksi(){
        $this->form_validation->set_rules('nama', 'Nama', 'alpha');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('konfir_email','Konfirmasi Email','required');

        if($this->form_validation->run() != false){
            echo "Form  validation oke:";
        }
        else{
            $this->load->view("uji/testjs");
        }
    }

}