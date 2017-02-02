<?php
    class m_daftarbeasiswa extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        function getList(){
            $jurusan  = substr($this->session->userdata('npm'), 0, 2);
            $angkatan = $this->session->userdata('angkatan');
            
            $this->db->select('d.id_beasiswa, d.periode, b.nama_beasiswa');
            $this->db->from('bsw_detbeasiswa d');
            $this->db->join('(SELECT b.id_beasiswa, p.nama_pemberi, b.nama_beasiswa, b.jenis_beasiswa FROM bsw_beasiswa b JOIN bsw_profil p ON b.id_profil = p.id_profil) b', 'd.id_beasiswa = b.id_beasiswa');
            $this->db->join('bsw_aturan a', 'd.id_aturan = a.id_aturan');
            $this->db->join('bsw_pendaftar p', '(d.id_beasiswa = p.id_beasiswa AND d.periode = p.periode)','left');
            $this->db->where('draft = 0 AND `npm` IS NULL AND tgl_mulai <= CURDATE() AND tgl_akhir >= CURDATE() AND a.jurusan LIKE "%'.$jurusan.'%" AND "'.$angkatan.'" BETWEEN angkatan_min AND angkatan_max');
            $ambildata = $this->db->get();
            return $ambildata;
        }
        
        function viewDesc(){
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
                echo 'someting wong';
            }
        }
        
        function getID() {
            $q = $this->db->query("SELECT MAX(RIGHT(id_pendaftar,3)) AS idmax FROM bsw_pendaftar");
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
            $kar = "DFT";
            return $kar.$tmp;
        }
        
        function uploadFile($fName){
            $config['upload_path']      = './assets/uploads';
            $config['allowed_types']    = 'zip|rar';
            $config['max_size']         = '100000';
            $config['file_name']        = $fName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('uFile')){
//                $upload_error = array('error' => $this->upload->display_errors());
                return 0;
            }else{
                $upload_data = $this->upload->data();
                return 1;
            }
        }
        
        function input(){
            $bsw = explode(',',$this->input->post('idB'));
            $id_beasiswa                     = $bsw[0];
            $periode                         = $bsw[1]; 
            $id_pendaftar                    = $this->getID();
            $npm                             = $this->input->post('npm'); 
            $nama                            = $this->input->post('nm');
            $jurusan                         = $this->input->post('jur');
            $ipk                             = $this->input->post('ipk');
            $alamat                          = $this->input->post('alm');
            $fName = str_replace(' ', '_', $id_pendaftar."_".$npm."_".$nama."_".$id_beasiswa."_".$periode);
            $uLoad = $this->uploadFile($fName);
            if($uLoad){
                $data = array( 
                    'id_pendaftar'      =>$id_pendaftar,
                    'id_beasiswa'       =>$id_beasiswa,
                    'periode'           =>$periode, 
                    'npm'               =>$npm,
                    'nama'              =>$nama, 
                    'jurusan'           =>$jurusan,
                    'ipk'               =>$ipk,
                    'alamat'            =>$alamat,
                    'file'              =>$fName
                    );
                $this->db->insert('bsw_pendaftar',$data); 
                redirect('mahasiswa/daftarbeasiswa');
            }else{
                echo 'File harus berupa rar / zip';
            }
        }
    }
