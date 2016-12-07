<?php

class Profile extends MX_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') == ""){
            $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
            redirect(base_url("login"));
        }
        $this->load->model('m_profile');
    }

    function index(){
        $data['title']      = "Profil Perusahaan";
        $table['dataTable']  = $this->m_profile->data()->result();
        
        $this->load->view('v_header', $data);
        $this->load->view('v_navigation');
        $this->load->view('v_profile', $table);
        $this->load->view('v_footer');
    }
    
    function getID(){
        $id = $this->m_profile->getID();
        echo "{\"uid\":\"".$id."\"}";
    }
            
    function input(){
        $this->input->post('submit');
        $this->m_profile->input();
    }
    
    function edit($id){
        $data = $this->m_profile->getEdit($id);
        echo json_encode($data);
    }
    
    function update(){
//        if($this->input->post('submit')){ //kondisi ketika ada submitan
//           $this->m_profile->update($id);
//        }
//        $data['hasil']=$this->m_profile->getEdit($id); //dapetin id transaksi
        $this->m_profile->update();
    }
    
    function delete($id){ //fungsi delete
        $this->m_profile->delete($id); //ngacir ke fungsi delTransaksi
    }
}
