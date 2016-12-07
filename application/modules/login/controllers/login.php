<?php

class Login extends MX_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') != null){
            redirect(base_url("admin"));
        }
        $this->load->model('m_login');
    }

    function index(){
        $data['result'] = $this->session->flashdata('loginStatus');
        $this->load->view('v_login',$data);
    }

    function act(){
        if($this->session->userdata("logged_in")==""){
            $this->input->post('submit');
            $this->m_login->checkLogin();
        }else{
            redirect("admin");
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
