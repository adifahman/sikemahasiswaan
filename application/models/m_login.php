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
                $sess_data['logged_in'] = 'yesGetMeLoginBaby';
                $sess_data['username'] = $qad->username;
                $this->session->set_userdata($sess_data);
            }
            redirect("admin");
        }
        else{
            $data["error"]="Username atau password salah!";
            $this->session->set_flashdata("result_login","Username atau password salah!");
            redirect('login');
        }
    }
}
