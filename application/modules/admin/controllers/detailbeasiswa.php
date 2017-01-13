<?php

class Detailbeasiswa extends MX_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') == ""){
            $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
            redirect(base_url("login"));
        }
        $this->load->model('m_detbeasiswa');
    }

    function index(){
        $data['title']      = "Detail Beasiswa";
        $data['page']       = 'dbs';
        $data['list']       = $this->getList();
        
        $this->load->view('v_header', $data);
        $this->load->view('v_navigation');
        $this->load->view('v_detailbeasiswa');
        $this->load->view('v_footer');
    }
    
    function formAddPeriod($idB){
        $data = $this->m_detbeasiswa->formPeriod($idB);
        
        $this->load->view('ajax/a_formAddPeriod',$data);
    }
    
    function formDetBeasiswa($idB){
        $data['count'] = $this->m_detbeasiswa->totalPeriod($idB);
        
        $this->load->view('ajax/a_formDetBeasiswa',$data);
    }
    
    function form(){
        $idB = $this->input->post('idB'); 
        $per = $this->input->post('per');
        $data['data'] = $this->m_detbeasiswa->form();
        $this->load->view('ajax/a_form',$data);
    }
            
    function getList(){
        $list[1] = "";
        foreach ($this->m_detbeasiswa->getList()->result() as $row){
            $list[$row->id_beasiswa] = $row->nama_beasiswa;
        }
        return $list;
    }
    
    function inputPeriod(){
        $this->input->post('submit');
        $this->m_detbeasiswa->inputPeriod();
    }
    
    function inputBeasiswa(){
        $this->input->post('submit');
        $this->m_detbeasiswa->inputBeasiswa();
    }
}
