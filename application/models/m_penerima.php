<?php
    class m_penerima extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        function getList(){
            $this->db->select('d.id_beasiswa, d.periode, b.nama_beasiswa');
            $this->db->from('bsw_detbeasiswa d');
            $this->db->join('(SELECT b.id_beasiswa, p.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa FROM bsw_beasiswa b JOIN bsw_profil p ON b.id_profil = p.id_profil) b', 'd.id_beasiswa = b.id_beasiswa');
            $this->db->where('tgl_akhir <= CURDATE()');
            $this->db->where('finish = 1');
            
            $ambildata = $this->db->get();
            return $ambildata;
        }
        
        function viewPenerima(){
            $idB = $this->input->post('idB');
            $per = $this->input->post('per');
            
            $this->db->select('id_beasiswa, periode, id_pendaftar, npm, nama, jurusan, file');
            $this->db->from('bsw_pendaftar');
            $this->db->where('id_beasiswa',$idB);
            $this->db->where('periode',$per);
            
            $ambildata = $this->db->get();
            if ($ambildata->num_rows() > 0){
                foreach ($ambildata->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }else{
                echo 'someting wong';
            }
        }
    }
