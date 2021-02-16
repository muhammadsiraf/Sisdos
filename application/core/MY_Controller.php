<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __contruct(){
        parent::__construct();
    }

    function adminRequired($params = array()){
      $action =$this->router->fetch_method();
        if(empty($params['except']))
            $params['except'] =array();
        if(empty($params['only']))
            $params['only'] =array();
        if(count($params['except']) > 0 && in_array($action,$params['except']))
            return true;
        if(count($params['only']) > 0 && in_array($action,$params['only']) && $this->session->userdata('status')=="loginadmin")
            return true;
        if($this->session->userdata('status')=="loginadmin")
            return true;
        redirect(base_url("login"));
    }

    function dosenRequired($params = array()){
      $action =$this->router->fetch_method();
        if(empty($params['except']))
            $params['except'] =array();
        if(empty($params['only']))
            $params['only'] =array();
        if(count($params['except']) > 0 && in_array($action,$params['except']))
            return true;
        if(count($params['only']) > 0 && in_array($action,$params['only']) && $this->session->userdata('status')=="logindosen")
            return true;
        if($this->session->userdata('status')=="logindosen")
            return true;
        redirect(base_url("login"));
    }

    function diktiRequired($params = array()){
      $action =$this->router->fetch_method();
        if(empty($params['except']))
            $params['except'] =array();
        if(empty($params['only']))
            $params['only'] =array();
        if(count($params['except']) > 0 && in_array($action,$params['except']))
            return true;
        if(count($params['only']) > 0 && in_array($action,$params['only']) && $this->session->userdata('status')=="logindikti")
            return true;
        if($this->session->userdata('status')=="logindikti")
            return true;
        redirect(base_url("login"));
    }
}
