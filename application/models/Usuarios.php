<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {

    public function __construct(){
        parent::__construct();
    }


    public function cadastrarUsuario(){
        return
            $this->db->insert('usuario',$this);
    }

    public function listarCliente(){

    }

    public function deletar(){

    }

    public function atualizar(){

    }
    //Pesquisar se existe usuario Metodo login
    public function pesquisa($value, $param = 'nome'){
        return $this->db->get_where('usuario',array(
            $param=> $value
        ))->row();
    }
}
