<?php

class Admin extends MX_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') == ""){
            $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
            redirect(base_url("login"));
        }
    }

    function index(){
        $data['title'] = "Dashboard";
        $this->load->view('v_header', $data);
        $this->load->view('v_navigation');
        $this->load->view('v_admin');
        $this->load->view('v_footer');
    }
}
