<?php

class Beasiswa extends MX_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') == ""){
            redirect(base_url("login"));
        }
        $this->load->model('m_beasiswa');
    }

    function index(){
        $data['title']      = "Beasiswa";
        $table['dataTable'] = $this->m_beasiswa->data();
        $data['list'] = $this->getList();
        $this->load->view('v_header', $data);
        $this->load->view('v_navigation');
        $this->load->view('v_beasiswa', $table);
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
        foreach ($this->m_beasiswa->getList()->result() as $row){
            $list[$row->id_profil] = $row->nama_pemberi;
        }
        return $list;
    }
}
