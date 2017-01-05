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
        
        function update(){ //update data berdasarkan id transaski
            $id         = $this->input->post('eID'); 
            $idP        = $this->input->post('eIDP'); 
            $nama       = $this->input->post('eNama');
            $jenis      = $this->input->post('eJenis');      
            $data = [
                'id_profil'       => $idP,
                'nama_beasiswa'   => $nama,
                'jenis_beasiswa'  => $jenis
                ];
            $this->db->where('id_beasiswa',$id); //memilih data yang id_transaksi nya sama dengan id_transaski yang mau diedit
            $this->db->update('bsw_beasiswa',$data);
            redirect('admin/beasiswa');//update data dah
        }
        
        function delete($id){ 
            $this->db->where('id_beasiswa',$id); 
            $this->db->delete('bsw_beasiswa');
            redirect('admin/beasiswa');
            return;
        }
        
        public function getList(){
            return $this->db->get('bsw_profil');
        }
    }
