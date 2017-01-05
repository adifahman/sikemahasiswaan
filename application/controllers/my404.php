<?php

    class My404 extends MX_Controller{
        public function __construct(){
           parent::__construct(); 
        } 

        public function index(){ 
           $this->load->view('errors/error_404');
        } 
    } 

