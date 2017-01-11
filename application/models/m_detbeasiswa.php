<?php
    class m_detbeasiswa extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        function formPeriod($idB){
            $this->db->select_max('periode');
            $this->db->where('id_beasiswa',$idB);
            $result = $this->db->get('bsw_detbeasiswa')->row();  

            $data['periode'] = $result->periode+1;
            $data['idB'] = $idB;
            
            return $data;
        }
        
        function totalPeriod($idB){
            $this->db->select('id_beasiswa');
            $this->db->from('bsw_detbeasiswa');
            $this->db->where('id_beasiswa',$idB);
            
            $query = $this->db->get();
            return $query->num_rows();
        }
        
        public function getList(){
            return $this->db->get('bsw_beasiswa');
        }
        
        function form(){
            $idB = $this->input->post('idB');
            $per = $this->input->post('per');
            
            $this->db->select('d.id_beasiswa, d.periode as periode_bsw, b.periode, b.besaran, b.banyaknya, a.ipk, a.jurusan, a.angkatan_min, a.angkatan_max, a.lainnya');
            $this->db->from('bsw_detbeasiswa as d');
            $this->db->join('bsw_besaran as b','d.id_besaran = b.id_besaran');
            $this->db->join('bsw_aturan as a','d.id_aturan = a.id_aturan');
            $this->db->where('d.id_beasiswa',$idB);
            $this->db->where('d.periode',$per);
            
            $query = $this->db->get();
            
            return $query->row();
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
