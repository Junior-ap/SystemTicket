<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    //Carregar a pagina inicial do sistema de login
    public function index(){
        $this->load->view('template/header');

        $this->load->view('template/footer');

    }
    //Verificar usuario e senha
    public function autenticar(){

    }

    //Deslogar o usuario
    public function sair(){


    }


}
