<?php
class finalproject extends CI_Controller {
    public function index(){
        $this->load->view('view-fp');
        $this->load->library('form_validation');

    }
}