<?php
    class m_detbeasiswa extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        public function getList(){
            return $this->db->get('bsw_beasiswa');
        }
        
        function inputPeriod(){
            $a = explode('/',substr($this->input->post('date'), 0, 10));
            $b = explode('/',substr($this->input->post('date'), -10));
            
            $idB        = $this->input->post('idB'); 
            $per        = $this->input->post('per'); 
            $thn        = $this->input->post('thn');
            $mulai      = $a[2].'-'.$a[1].'-'.$a[0];
            $akhir      = $b[2].'-'.$b[1].'-'.$b[0];
            $draft      = ($this->input->post('draft') != NULL ? 1 : 0);
            $data = array(
                'id_beasiswa'   => $idB,
                'periode'       => $per,
                'tahun'         => $thn,
                'tgl_mulai'     => $mulai,
                'tgl_akhir'     => $akhir,
                'draft'         => $draft
                );
            $this->db->insert('bsw_detbeasiswa',$data);
            $this->session->set_flashdata("updated",1);
            redirect('admin/detailbeasiswa');
        }
    }
