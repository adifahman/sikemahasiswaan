<?php
    class m_profile extends CI_Model{
        function __construct(){
            parent::__construct();
        }   
        
        public function data(){
            return $this->db->get('bsw_profil');
        }
        
        function input(){
            $id         = $this->input->post('id'); 
            $nama       = $this->input->post('nama'); 
            $alamat     = $this->input->post('alamat');
            $telp       = $this->input->post('telp');
            $email      = $this->input->post('email');
            $website    = $this->input->post('website');
            $data = array(
                'id_profil'     =>$id,
                'nama_pemberi'  =>$nama, 
                'alamat'        =>$alamat,
                'no_telp'       =>$telp,
                'email'         =>$email,
                'website'       =>$website
                );
            $this->db->insert('bsw_profil',$data);
            redirect('admin/profile');
        }
        
        function getID() {
            $q = $this->db->query("SELECT MAX(RIGHT(id_profil,3)) AS idmax FROM bsw_profil");
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
            $kar = "PRF";
            return $kar.$tmp;
       }
        
        function getEdit($id){
            return $this->db->get_where('bsw_profil', ['id_profil'=>$id])->row();
        }
        
        function update(){
            $id         = $this->input->post('eID');
            $nama       = $this->input->post('eNama');
            $alamat     = $this->input->post('eAlamat');
            $telp       = $this->input->post('eEmail');
            $email      = $this->input->post('eWebsite');
            $website    = $this->input->post('eTelp');           
            $data = [
                'nama_pemberi'      =>$nama,
                'alamat'            =>$alamat,
                'no_telp'           =>$telp,
                'email'             =>$email,
                'website'           =>$website
                ];
            $this->db->where('id_profil',$id);
            $this->db->update('bsw_profil',$data);
            redirect('admin/profile');
        }
        
        function delete($id){ 
            $this->db->where('id_profil',$id); 
            $this->db->delete('bsw_profil');
            redirect('admin/profile');
            return;
        }
        
        function pdfPemberi(){
            $ambildata = $this->db->get('bsw_profil');
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
