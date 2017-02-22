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
        $data['title']      = "Profil Perusahaan | Admin - Sistem Informasi Beasiswa";
        $data['page']       = 'prf';
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
        $this->m_profile->update();
    }
    
    function delete($id){
        $this->m_profile->delete($id);
    }
    
    function pdf(){
        $data['dataTable']  = $this->m_profile->pdfPemberi();
        $filename           = "pemberibeasiswa.pdf";
        $data['title']      = "Pemberi Beasiswa";
        $data['page']       = 'dft';
        $html = $this->load->view('print/p_viewPemberi',$data,true);

        $this->load->library('m_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
        $mpdf->WriteHTML($html);

        //download it D save F.
        $mpdf->Output("./assets/uploads/".$filename, "I");

    }
}
