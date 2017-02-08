<?php

    class m_login extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function checkLogin(){
            $check['username'] = $this->input->post('username');
            $check['password'] = md5($this->input->post('password'));
            
            $login = $this->db->get_where('m_user', $check);
            if(count($login->result()) > 0){
                foreach($login->result() as $inf){
                    $sess_data['logged_in']     = 'admin';
                    $sess_data['username']      = $inf->username;
                    $sess_data['name']          = $inf->name;
                    $sess_data['privilege']     = $inf->privilege;
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
