<?php

    class Logout extends MX_Controller{
        function __construct(){
            parent::__construct();
            $this->session->sess_destroy();
            redirect(base_url('login'));
        }

        function index(){

        }
    }
