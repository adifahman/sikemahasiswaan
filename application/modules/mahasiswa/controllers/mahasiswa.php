<?php

    class Mahasiswa extends MX_Controller{
        function __construct(){
            parent::__construct();
//            if($this->session->userdata('logged_in') == ""){
//                $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
//                redirect(base_url("mahasiswa/login"));
//            }
            $this->load->model('mahasiswa/m_mahasiswa');
        }

        function index(){
            $data['title']      = "Dashboard | Sistem Informasi Beasiswa";
            $data['page']       = 'adm';
            if($this->session->userdata('logged_in') == "mahasiswa"){
                $data['chPass'] = $this->m_mahasiswa->checkPass();
            }else{
                $data['chPass'] = 0;
            }
            
            $data['dataAll']           = $this->m_mahasiswa->dataAll();
            $data['dataFinished']      = $this->m_mahasiswa->dataFinished(); 
            
            $this->load->view('mahasiswa/v_header', $data);
            $this->load->view('mahasiswa/v_navigation');
            $this->load->view('mahasiswa/v_mahasiswa', $data);
            $this->load->view('mahasiswa/v_footer');
        }
        
        function update(){
            $this->input->post('submit');
            $this->m_mahasiswa->update();
        }
                
        function logout(){
            $this->session->sess_destroy();
            redirect(base_url('mahasiswa/login'));
        }
    }
