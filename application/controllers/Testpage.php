<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testpage extends CI_Controller {
    public function index()
    {
//        $data['title'] = "Dashboard";
//        $this->load->view('v_header', $data);
//        $this->load->view('v_navigation');
        $this->load->view('v_testpage');
//        $this->load->view('v_footer');
    }
}
