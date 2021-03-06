<?php

    class Beasiswa extends MX_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') == ""){
                $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
                redirect(base_url("mahasiswa/login"));
            }
            $this->load->model('mahasiswa/m_beasiswa');
        }

        function index(){
            $data['title']              = "Beasiswa | Sistem Informasi Beasiswa";
            $data['page']               = 'bsw';
            
            $table['dataAvailable']     = $this->m_beasiswa->dataAvailable();
            $table['dataAll']           = $this->m_beasiswa->dataAll();
            $table['dataFinished']      = $this->m_beasiswa->dataFinished();            

            $this->load->view('mahasiswa/v_header', $data);
            $this->load->view('mahasiswa/v_navigation');
            $this->load->view('mahasiswa/v_beasiswa', $table);
            $this->load->view('mahasiswa/v_footer');
        }
        
        function view(){
            $data['modal'] = $this->m_beasiswa->view();
        
            $this->load->view('ajax/a_viewBeasiswa',$data);
        }
    }
