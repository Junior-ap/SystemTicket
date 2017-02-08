<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index(){
        $this->load->view('template/header');
        $this->load->view('template/footer');

    }

    public function entra(){
        //var_dump($this->input->post());
        if ($this->input->post('captch')) redirect('usuario');
    }


}
