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
//        if($this->session->userdata("updated")==1){
//            $table['dataTable'] = $this->m_beasiswa->dataUpdated();
//        }else{
//            $table['dataTable'] = $this->m_beasiswa->data();
//        }
        
        $this->load->view('v_header', $data);
        $this->load->view('v_navigation');
        $this->load->view('v_detailbeasiswa');
        $this->load->view('v_footer');
    }
    
    function getID(){
        $id = $this->m_beasiswa->getID();
        echo "{\"uid\":\"".$id."\"}";
    }
            
    function input(){
        $this->input->post('submit');
        $this->m_beasiswa->input();
    }
    
    function edit($id){
        $data = $this->m_beasiswa->getEdit($id);
        echo json_encode($data);
    }
    
    function update(){
        $this->m_beasiswa->update();
    }
    
    function delete($id){
        $this->m_beasiswa->delete($id);
    }
    
    function getList(){
        $list[1] = "";
        foreach ($this->m_detbeasiswa->getList()->result() as $row){
            $list[$row->id_beasiswa] = $row->nama_beasiswa;
        }
        return $list;
    }
}
