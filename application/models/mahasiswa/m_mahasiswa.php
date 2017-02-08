<?php
    class m_mahasiswa extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        function dataAll(){
            $this->db->select('d.id_beasiswa, d.periode, b.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa, d.tahun, d.tgl_mulai, d.tgl_akhir');
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
            $this->db->select('d.id_beasiswa, d.periode, b.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa, d.tahun, d.tgl_mulai, d.tgl_akhir');
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
        
        function checkPass(){
            $check['npm'] = $this->session->userdata('npm');
            $check['pass'] = md5($check['npm']);
            $login = $this->db->get_where('m_mahasiswa', $check);
            if(count($login->result()) == 1){
                $chPass = 1;
            }else{
                $chPass = 0;
            }
            return $chPass;
        }
        
        function update(){
            $npm        = $this->session->userdata('npm');
            $pass       = md5($this->input->post('password'));        
            $data= [
                'pass'           =>$pass
                ];
            $this->db->where('npm',$npm);
            $this->db->update('m_mahasiswa',$data);
            redirect('mahasiswa');
        }
    }
