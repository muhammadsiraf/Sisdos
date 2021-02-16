<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model("auth_model");
		$this->load->model("dosen_model");
		$this->load->model("skp_model");
        $this->load->library('form_validation');
    }

    private function division($a,$b)
    {
        return $a/$b;
    }

    public function index()
    {
        echo "UNIT TESTING SISDOS";
        $this->test_case_1();
        // $this->test_case_2();

    }

    public function test_case_1()
    {
        $test = $this->division(6,3);
        $expected_result=2;
        $test_name="Test Pembagian";
        echo $this->unit->run($test,$expected_result,$test_name);
    }

    public function test_case_2()
    {
        $test= $this->request('GET', ['SKP', 'viewRancanganSKP']);
        $expected_result= "<H1>Hi There </H1>";
        $test_name="test rancangan";
        echo $this->unit->run($test,$expected_result,$test_name);
    }
}