<?php

    class m_login extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function checkLogin(){
            $check['npm']       = $this->input->post('username');
            $check['pass']      = md5($this->input->post('password'));
            
            $login = $this->db->get_where('m_mahasiswa', $check);
            if(count($login->result()) > 0){
                foreach($login->result() as $inf){
                    $sess_data['logged_in']     = 'mahasiswa';
                    $sess_data['npm']           = $inf->npm;
                    $sess_data['name']          = $inf->nama;
                    $sess_data['angkatan']      = $inf->angkatan;
                    $this->session->set_userdata($sess_data);
                }
                redirect("mahasiswa");
            }
            else{
                $this->session->set_flashdata("loginStatus","Username atau password salah!");
                redirect('mahasiswa/login');
            }
        }
    }
