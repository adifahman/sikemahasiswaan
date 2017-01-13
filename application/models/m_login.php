<?php

    class m_login extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function checkLogin(){
            $check['username'] = $this->input->post('username');
            $check['password'] = md5($this->input->post('password'));
            $q_check_login = $this->db->get_where('m_user', $check);
            if(count($q_check_login->result()) > 0){
                foreach($q_check_login->result() as $qad){
                    $sess_data['logged_in'] = 'admin';
                    $sess_data['username']  = $qad->username;
                    $sess_data['name']      = $qad->name;
                    $sess_data['privilege'] = $qad->privilege;
                    $this->session->set_userdata($sess_data);
                }
                redirect("admin");
            }
            else{
                $this->session->set_flashdata("loginStatus","Username atau password salah!");
                redirect('login');
            }
        }
    }
