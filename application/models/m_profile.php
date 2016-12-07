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
            $kd = ""; //kode awal
            if($q->num_rows()>0){ //jika data ada
                foreach($q->result() as $k){
                    $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                    $kd = sprintf("s", $tmp); //kode ambil 4 karakter terakhir
                }
                $tmp = sprintf('%03d', $tmp);
            }else{ //jika data kosong diset ke kode awal
                $kd = "001";
            }
            $kar = "PRF"; //karakter depan kodenya
            //gabungkan string dengan kode yang telah dibuat tadi
            return $kar.$tmp;
//            return $kar.$kd;
       }
        
        function getEdit($id){
            return $this->db->get_where('bsw_profil', ['id_profil'=>$id])->row();
        }
        
        function update(){ //update data berdasarkan id transaski
            $id         = $this->input->post('eID'); //sama kayak diatas
            $nama       = $this->input->post('eNama'); //sama kayak diatas
            $alamat     = $this->input->post('eAlamat'); //sama kayak diatas
            $telp       = $this->input->post('eEmail');
            $email      = $this->input->post('eWebsite');
            $website    = $this->input->post('eTelp');           
            $data= [
                'nama_pemberi'      =>$nama, // yang ditangkep dimasukin
                'alamat'            =>$alamat, // yang ditangkep dimasukin
                'no_telp'           =>$telp, // yang ditangkep dimasukin
                'email'             =>$email,
                'website'           =>$website
                ];
            $this->db->where('id_profil',$id); //memilih data yang id_transaksi nya sama dengan id_transaski yang mau diedit
            $this->db->update('bsw_profil',$data);
            redirect('admin/profile');//update data dah
        }
        
        function delete($id){ 
            $this->db->where('id_profil',$id); 
            $this->db->delete('bsw_profil');
            redirect('admin/profile');
            return;
        }
    }
