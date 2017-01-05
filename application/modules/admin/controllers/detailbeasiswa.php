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
    
    function formDetBeasiswa($idB){
        $this->db->select_max('periode');
        $this->db->where('id_beasiswa',$idB);
        $result = $this->db->get('bsw_detbeasiswa')->row();  
        
        $data['periode'] = $result->periode+1;
        $data['idB'] = $idB;
        
        $this->load->view('ajax/a_detBeasiswa',$data);
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
}
