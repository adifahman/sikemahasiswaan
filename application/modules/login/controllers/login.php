<?php

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    function index(){
        $data['result'] = $this->session->flashdata('result_login');
        $this->load->view('v_login',$data);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_password_check');
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
