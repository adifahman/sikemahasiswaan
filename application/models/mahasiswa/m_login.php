<?php

    class m_login extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function checkLogin(){
            $check['npm'] = $this->input->post('username');
            //$check['password'] = md5($this->input->post('password')); 
            $q_check_login = $this->db->get_where('m_mahasiswa', $check);
            if(count($q_check_login->result()) > 0){
                foreach($q_check_login->result() as $qad){
                    $sess_data['logged_in'] = 'mahasiswa';
                    $sess_data['username']  = $qad->npm;
                    $sess_data['name']      = $qad->nama;
                    $sess_data['jurusan']   = $qad->jurusan;
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
