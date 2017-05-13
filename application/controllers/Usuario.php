<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {



    public function cadastrar(){
        //Comando para carregar varias views e montar
        $this->load->view('template/header.php');
        $this->load->view('usuario');
        $this->load->view('template/footer.php');

    }

    public function atualizar(){
        //Sistema de segurança contra programas que preenche os campos automatico
        if ($this->input->post('captch')) redirect('usuario');

    }
    public function deletar(){


    }

    public function listar(){


    }
}
/*
 * var_dump($this->input->post());
 *
 *
 */