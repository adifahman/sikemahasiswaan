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
    
        function getIDa(){
            $q = $this->db->query("SELECT MAX(RIGHT(id_aturan,3)) AS idmax FROM bsw_aturan");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->idmax)+1;
                    $kd = sprintf("s", $tmp);
                }
                $tmp = sprintf('%03d', $tmp);
            }else{
                $kd = "001";
            }
            $kar = "RUL";
            return $kar.$tmp;
        }
    
        function getIDb(){
            $q = $this->db->query("SELECT MAX(RIGHT(id_besaran,3)) AS idmax FROM bsw_besaran");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->idmax)+1;
                    $kd = sprintf("s", $tmp);
                }
                $tmp = sprintf('%03d', $tmp);
            }else{
                $kd = "001";
            }
            $kar = "BES";
            return $kar.$tmp;
        }
        
        function form(){
            $idB = $this->input->post('idB');
            $per = $this->input->post('per');
            
            $this->db->select('d.id_beasiswa, d.id_besaran, d.id_aturan, d.periode as periode_bsw, b.periode, b.besaran, b.banyaknya, a.ipk, a.jurusan, a.angkatan_min, a.angkatan_max, a.lainnya');
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
        
        function inputBeasiswa(){
            $id_beasiswa    = $this->input->post('iIDbsw');
            $periode_bsw    = $this->input->post('iPb');
            $id_besaran     = $this->input->post('iIDB');
            $id_aturan      = $this->input->post('iIDA');
            $periode        = $this->input->post('iPer');
            $besaran        = $this->input->post('iBes');
            $banyaknya      = $this->input->post('iBny');
            $jurusan        = implode(',', $this->input->post('iJur'));
            $ipk            = $this->input->post('iIPK');
            $min            = $this->input->post('iMin');
            $max            = $this->input->post('iMax');
            $lainnya        = $this->input->post('iAdd');
            
            if($id_aturan == '' && $id_besaran == ''){
                $id_besaran = $this->getIDb();
                $id_aturan  = $this->getIDa();
                
                $dataB = array(
                    'id_besaran'    => $id_besaran,
                    'periode'       => $periode,
                    'besaran'       => $besaran,
                    'banyaknya'     => $banyaknya
                );
                $this->db->insert('bsw_besaran',$dataB);
                
                $dataA = array(
                    'id_aturan'     => $id_aturan,
                    'ipk'           => $ipk,
                    'jurusan'       => $jurusan,
                    'angkatan_min'  => $min,
                    'angkatan_max'  => $max,
                    'lainnya'       => $lainnya
                );
                $this->db->insert('bsw_aturan',$dataA);
                
                $data = array(
                    'id_besaran'     => $id_besaran,
                    'id_aturan'      => $id_aturan,
                    'draft'          => 0
                );
                $this->db->where('id_beasiswa',$id_beasiswa);
                $this->db->where('periode',$periode_bsw);
                $this->db->update('bsw_detbeasiswa',$data);
            }else if($id_aturan != '' && $id_besaran != ''){
                $dataB = array(
                    'periode'       => $periode,
                    'besaran'       => $besaran,
                    'banyaknya'     => $banyaknya
                );
                $this->db->where('id_besaran',$id_besaran);
                $this->db->update('bsw_besaran',$dataB);
                
                $dataA = array(
                    'ipk'           => $ipk,
                    'jurusan'       => $jurusan,
                    'angkatan_min'  => $min,
                    'angkatan_max'  => $max,
                    'lainnya'       => $lainnya
                );
                $this->db->where('id_aturan',$id_aturan);
                $this->db->update('bsw_aturan',$dataA);
            }else{
                echo "something wong";
            }
            
            redirect('admin/beasiswa');
        }
    }
