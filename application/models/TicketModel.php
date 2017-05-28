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

    public function listar($status){
        return $this->db->select('t.id,t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->where('t.status =',$status)
            ->join('usuario u', 't.fkusuario = u.id')
            ->get()->result();
    }
    public function listarTicketUsuario($status,$id){
        return $this->db->select('t.id,t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->where('t.status =',$status)
            ->join('usuario u', 't.fkusuario = u.id')
            ->where('t.fkusuario =',$id)
            ->get()->result();
    }
    public function listarTicketTodos(){
        return $this->db->select('t.id,t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->join('usuario u', 't.fkusuario = u.id')
            ->get()->result();
    }
    public function listarTodostUsuario($id){
        return $this->db->select('t.id,t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->join('usuario u', 't.fkusuario = u.id')
            ->where('t.fkusuario =',$id)
            ->get()->result();
    }
    public function comentar(){

    }

    public function buscar($id){

    }
    public function finalizar(){

    }
}
