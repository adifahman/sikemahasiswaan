<?php
    class m_beasiswa extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        function dataAvailable(){
            $jurusan  = substr($this->session->userdata('npm'), 0, 2);
            $angkatan = $this->session->userdata('angkatan');
            
            $this->db->select('d.id_beasiswa, d.periode, b.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa, p.npm');
            $this->db->from('bsw_detbeasiswa d');
            $this->db->join('(SELECT b.id_beasiswa, p.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa FROM bsw_beasiswa b JOIN bsw_profil p ON b.id_profil = p.id_profil) b', 'd.id_beasiswa = b.id_beasiswa');
            $this->db->join('bsw_aturan a', 'd.id_aturan = a.id_aturan');
            $this->db->join('bsw_pendaftar p', '(d.id_beasiswa = p.id_beasiswa AND d.periode = p.periode)','left');
            $this->db->where('draft = 0 AND tgl_mulai <= CURDATE() AND tgl_akhir >= CURDATE() AND a.jurusan LIKE "%'.$jurusan.'%" AND "'.$angkatan.'" BETWEEN angkatan_min AND angkatan_max');
            $ambildata = $this->db->get();
            if ($ambildata->num_rows() > 0){
                foreach ($ambildata->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }else{
                echo 'Something Wrong';
            }
        }
        
        function dataAll(){
            $this->db->select('d.id_beasiswa, d.periode, b.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa');
            $this->db->from('bsw_detbeasiswa d');
            $this->db->join('(SELECT b.id_beasiswa, p.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa FROM bsw_beasiswa b JOIN bsw_profil p ON b.id_profil = p.id_profil) b', 'd.id_beasiswa = b.id_beasiswa');
            $this->db->where('draft = 0 AND tgl_mulai <= CURDATE() AND tgl_akhir >= CURDATE()');
            $ambildata = $this->db->get();
            if ($ambildata->num_rows() > 0){
                foreach ($ambildata->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }else{
                echo 'Something Wrong';
            }
        }
        
        function dataFinished(){
            $this->db->select('d.id_beasiswa, d.periode, b.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa');
            $this->db->from('bsw_detbeasiswa d');
            $this->db->join('(SELECT b.id_beasiswa, p.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa FROM bsw_beasiswa b JOIN bsw_profil p ON b.id_profil = p.id_profil) b', 'd.id_beasiswa = b.id_beasiswa');
            $this->db->where('tgl_akhir <= CURDATE()');
            $ambildata = $this->db->get();
            if ($ambildata->num_rows() > 0){
                foreach ($ambildata->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }else{
                echo 'Something Wrong';
            }
        }
        
        function view(){
            $idB = $this->input->post('idB');
            $per = $this->input->post('per');
            
            $this->db->select('d.id_beasiswa, b.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa, d.periode as periode_bsw, d.tahun, d.tgl_mulai, d.tgl_akhir, s.periode, s.besaran, s.banyaknya, a.jurusan, a.ipk, a.angkatan_min, a.angkatan_max, a.lainnya');
            $this->db->from('bsw_detbeasiswa d');
            $this->db->join('(SELECT b.id_beasiswa, p.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa FROM bsw_beasiswa b JOIN bsw_profil p ON b.id_profil = p.id_profil) b', 'd.id_beasiswa = b.id_beasiswa');
            $this->db->join('bsw_aturan a', 'd.id_aturan = a.id_aturan');
            $this->db->join('bsw_besaran s', 'd.id_besaran = s.id_besaran');
            $this->db->where('d.id_beasiswa',$idB);
            $this->db->where('d.periode',$per);
            $ambildata = $this->db->get();
            if ($ambildata->num_rows() > 0){
                foreach ($ambildata->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }else{
                echo 'Something Wrong';
            }
        }
    }
