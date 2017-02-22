<?php

    class Pendaftar extends MX_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') == ""){
                $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
                redirect(base_url("login"));
            }
            
            $this->load->model('m_pendaftar');
        }

        function index(){
            $data['title']      = "Pendaftar Beasiswa | Admin - Sistem Informasi Beasiswa";
            $data['page']       = 'dft';
            $data['list']       = $this->getList();

            $this->load->view('v_header', $data);
            $this->load->view('v_navigation');
            $this->load->view('v_pendaftar');
            $this->load->view('v_footer');
        }
        
        function getList(){
            $list[1] = "";
            foreach ($this->m_pendaftar->getList()->result() as $row){
                $list[$row->id_beasiswa.','.$row->periode] = $row->nama_beasiswa.' : Periode - '.$row->periode;
            }
            
            return $list;
        }
        
        function viewPendaftar(){
            $data['dataTable'] = $this->m_pendaftar->viewPendaftar();
        
            $this->load->view('ajax/a_viewPendaftar',$data);
        }
        
        function input(){
            $this->input->post('submit');
            
            $this->m_pendaftar->input();
        }
                
        function pdf(){
 
            $filename = "test.pdf";
            $data['title']      = "Pendaftar";
            $data['page']       = 'dft';
            $data['list']       = $this->getList();
            $html = $this->load->view('v_pendaftar',$data,true);

            // unpaid_voucher is unpaid_voucher.php file in view directory and $data variable has infor mation that you want to render on view.

            $this->load->library('m_pdf');

            $this->m_pdf->pdf->WriteHTML($html);

            //download it D save F.

            $this->m_pdf->pdf->Output("./assets/uploads/".$filename, "F");
            
        }
        
    }
