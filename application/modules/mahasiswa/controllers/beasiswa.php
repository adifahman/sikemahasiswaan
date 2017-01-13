<?php

    class Beasiswa extends MX_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') == ""){
                $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
                redirect(base_url("mahasiswa/login"));
            }
        }

        function index(){
            $data['title']      = "Beasiswa | Sistem Informasi Kemahasiswaan";
            $data['page']       = 'bsw';

            $this->load->view('mahasiswa/v_header', $data);
            $this->load->view('mahasiswa/v_navigation');
            $this->load->view('mahasiswa/v_beasiswa');
            $this->load->view('mahasiswa/v_footer');
        }
    }
