<?php
class Portal extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    function PageProcessar(){
        echo $this->load->view('processarPage',array(),true);
    }

}