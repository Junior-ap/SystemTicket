<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {
    public $username, $firstname, $lastname, $email, $password;

    public function __construct(){
        parent::__construct();
    }

    public function cadastrar(){
       // return
           // $this->db->insert('users',$this);
    }

    public function listar($value, $param = 'username'){
       // return $this->db->get_where('users',array(
       //     $param=> $value
      //  ))->row();
    }

    public function deletar(){

    }

    public function atualizar(){

    }
}
