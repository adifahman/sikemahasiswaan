<?php

    class Penerima extends MX_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') == ""){
                $this->session->set_flashdata("loginStatus","Anda harus login terlebih dahulu!");
                redirect(base_url("login"));
            }
            
            $this->load->model('m_penerima');
        }

        function index(){
            $data['title']      = "Penerima Beasiswa | Admin - Sistem Informasi Beasiswa";
            $data['page']       = 'pen';
            $data['list']       = $this->getList();

            $this->load->view('v_header', $data);
            $this->load->view('v_navigation');
            $this->load->view('v_penerima');
            $this->load->view('v_footer');
        }
        
        function getList(){
            $list[1] = "";
            foreach ($this->m_penerima->getList()->result() as $row){
                $list[$row->id_beasiswa.','.$row->periode] = $row->nama_beasiswa.' : Periode - '.$row->periode;
            }
            
            return $list;
        }
        
        function viewPenerima(){
            $data['dataTable'] = $this->m_penerima->viewPenerima();
        
            $this->load->view('ajax/a_viewPenerima',$data);
        }
        
        function pdf(){
            $data['dataTable']  = $this->m_penerima->pdfPenerima();
            $filename           = "penerimabeasiswa.pdf";
            $data['title']      = "Penerima Beasiswa";
            $data['page']       = 'dft';
            $data['list']       = $this->getList();
            $html = $this->load->view('print/p_viewPenerima',$data,true);

            $this->load->library('m_pdf');

            $this->m_pdf->pdf->WriteHTML($html);

            //download it D save F.
            $this->m_pdf->pdf->Output("./assets/uploads/".$filename, "I");
            
        }
    }
