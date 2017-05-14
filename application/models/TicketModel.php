<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketModel extends CI_Model {
    //public $prioridade ;

    public function __construct(){
        parent::__construct();
    }

    public function salvarTicket(){
        return
        $this->db->insert('ticket',$this);
    }

    public function listar(){

    }

    public function comentar(){

    }

    public function atualizar(){

    }
}
