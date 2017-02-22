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
            
            $this->db->select('p.id_pendaftar, d.id_beasiswa, d.periode, d.npm, d.nama, d.jurusan');
            $this->db->from('bsw_penerima p');
            $this->db->join('bsw_pendaftar d', 'p.id_pendaftar = d.id_pendaftar');
            $this->db->where('p.id_beasiswa',$idB);
            $this->db->where('p.periode',$per);
            
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
        
        function pdfPenerima(){
            $idB = $this->input->post('idB');
            $per = $this->input->post('per');
            
            $this->db->select('p.id_pendaftar, b.nama_beasiswa, d.id_beasiswa, d.periode, d.npm, d.nama, d.jurusan');
            $this->db->from('bsw_pendaftar d');
            $this->db->join('bsw_penerima p', 'd.id_pendaftar = p.id_pendaftar');
            $this->db->join('bsw_beasiswa b', 'd.id_beasiswa = b.id_beasiswa');
            $this->db->where('p.id_beasiswa',$idB);
            $this->db->where('p.periode',$per);
            
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
