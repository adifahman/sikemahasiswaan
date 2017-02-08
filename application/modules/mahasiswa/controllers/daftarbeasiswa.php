<?php

    class Daftarbeasiswa extends MX_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') == ""){
                $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
                redirect(base_url("mahasiswa/login"));
            }
            $this->load->model('mahasiswa/m_daftarbeasiswa');
            $this->load->helper(array('form', 'url'));
        }

        function index(){
            $data['title']              = "Registrasi Beasiswa | Sistem Informasi Beasiswa";
            $data['page']               = 'dft';
            $data['list']               = $this->getList();

            $this->load->view('mahasiswa/v_header', $data);
            $this->load->view('mahasiswa/v_navigation');
            $this->load->view('mahasiswa/v_daftarbeasiswa', $data);
            $this->load->view('mahasiswa/v_footer');
        }
        
        function getList(){
            $list[1] = "";
            foreach ($this->m_daftarbeasiswa->getList()->result() as $row){
                $list[$row->id_beasiswa.','.$row->periode] = $row->nama_beasiswa.' : Periode - '.$row->periode;
            }
            
            return $list;
        }
        
        function viewDesc(){
            $data['modal'] = $this->m_daftarbeasiswa->viewDesc();
        
            $this->load->view('ajax/a_viewDescBeasiswa', $data);
        }
        
        function formDaftar(){
            $this->load->view('ajax/a_formDaftar');
        }
        
        function input(){
            $this->input->post('submit');
            $this->m_daftarbeasiswa->input();
        }
    }
