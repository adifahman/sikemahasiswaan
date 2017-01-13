<?php

    class Mahasiswa extends MX_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') == ""){
                $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
                redirect(base_url("mahasiswa/login"));
            }
        }

        function index(){
            $data['title']      = "Dashboard | Sistem Informasi Kemahasiswaan";
            $data['page']       = 'adm';

            $this->load->view('mahasiswa/v_header', $data);
            $this->load->view('mahasiswa/v_navigation');
            $this->load->view('mahasiswa/v_mahasiswa');
            $this->load->view('mahasiswa/v_footer');
        }
    }
