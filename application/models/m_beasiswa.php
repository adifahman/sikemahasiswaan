<?php
    class m_beasiswa extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        public function data(){            
            $this->db->select('bsw.id_beasiswa, prf.nama_pemberi, bsw.nama_beasiswa, bsw.jenis_beasiswa');
            $this->db->from('bsw_beasiswa as bsw');
            $this->db->join('bsw_profil as prf', 'bsw.id_profil = prf.id_profil');
            $ambildata = $this->db->get();
            if ($ambildata->num_rows() > 0 ) {
                foreach ($ambildata->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        
        public function dataUpdated(){
            $ambildata = $this->db->query('SELECT bsw.id_beasiswa, prf.nama_pemberi, bsw.nama_beasiswa, bsw.jenis_beasiswa '
                                        . 'FROM bsw_beasiswa as bsw JOIN bsw_profil as prf ON bsw.id_profil = prf.id_profil '
                                        . 'ORDER BY CASE WHEN updated_at = (SELECT MAX(updated_at) FROM bsw_beasiswa) THEN 1 ELSE 2 END, id_beasiswa');
            if ($ambildata->num_rows() > 0 ) {
                foreach ($ambildata->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        
        function input(){
            $id         = $this->input->post('id'); 
            $idP        = $this->input->post('idP'); 
            $nama       = $this->input->post('nama');
            $jenis      = $this->input->post('jenis');
            $data = array(
                'id_beasiswa'     => $id,
                'id_profil'       => $idP,
                'nama_beasiswa'   => $nama,
                'jenis_beasiswa'  => $jenis
                );
            $this->db->insert('bsw_beasiswa',$data);
            $this->session->set_flashdata("updated",1);
            redirect('admin/beasiswa');
        }
        
        function getID() {
            $q = $this->db->query("SELECT MAX(RIGHT(id_beasiswa,3)) AS idmax FROM bsw_beasiswa");
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
            $kar = "BSW";
            return $kar.$tmp;
       }
        
        function getEdit($id){
            return $this->db->get_where('bsw_beasiswa', ['id_beasiswa'=>$id])->row();
        }
        
        function update(){
            $id         = $this->input->post('eID'); 
            $idP        = $this->input->post('eIDP'); 
            $nama       = $this->input->post('eNama');
            $jenis      = $this->input->post('eJenis');      
            $data = [
                'id_profil'       => $idP,
                'nama_beasiswa'   => $nama,
                'jenis_beasiswa'  => $jenis
                ];
            $this->db->where('id_beasiswa',$id);
            $this->db->update('bsw_beasiswa',$data);
            $this->session->set_flashdata("updated",1);
            redirect('admin/beasiswa');
        }
        
        function delete($id){ 
            $this->db->where('id_beasiswa',$id); 
            $this->db->delete('bsw_beasiswa');
            redirect('admin/beasiswa');
        }
        
        public function getList(){
            return $this->db->get('bsw_profil');
        }
    }
