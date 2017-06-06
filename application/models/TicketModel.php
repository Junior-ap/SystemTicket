<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
//Salvar Ticket
    public function salvarTicket(){
        return
        $this->db->insert('ticket',$this);
    }
//Listar Ticket Do Administrador e Colaborador Filtro(Abertos, Andamento e Finalizado)
    public function listar($status){
        return $this->db->select('t.id, t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->where('t.status =',$status)
            ->join('usuario u', 't.fkusuario = u.id')
            ->get()->result();
    }
//Listar Ticket Do Administrador e Colaborador Filtro(Todos)
    public function listarTicketTodos(){
        return $this->db->select('t.id,t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->join('usuario u', 't.fkusuario = u.id')
            ->get()->result();
    }
//Listar os Ticket Do Cliente  Filtro(Abertos, Andamento e Finalizado)
    public function listarTicketUsuario($status,$id){
        return $this->db->select('t.id,t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->where('t.status =',$status)
            ->join('usuario u', 't.fkusuario = u.id')
            ->where('t.fkusuario =',$id)
            ->get()->result();
    }
//Listar os Ticket Do Cliente Filtro(Todos)
    public function listarTodostUsuario($id){
        return $this->db->select('t.id,t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->join('usuario u', 't.fkusuario = u.id')
            ->where('t.fkusuario =',$id)
            ->get()->result();
    }
//Buscar Comentario
    public function buscarComentario($id){
        return $this->db->select('c.comentario, c.data, c.fkticket, c.fkusuario, u.nome')
            ->from('comentario c')
            ->where('c.fkticket =',$id)
            ->join('usuario u', 'c.fkusuario = u.id')
            ->get()->result();
    }
//Buscar Ticket
    public function buscarTicket($id){
        return $this->db->select('t.id,t.ticket, t.assunto,t.prioridade,t.data,t.fkusuario,u.nome,t.status')
            ->from('ticket t')
            ->where('t.id =',$id)
            ->join('usuario u', 't.fkusuario = u.id')
            ->get()->result();
    }
//Comentar Ticket
    public function comentar(){
        return
            $this->db->insert('comentario',$this);
    }
//Finalizar o Ticket
    public function finalizar($id){
        $this->db->set($this);
        $this->db->where('id' , $id);
        $this->db->update('ticket');
    }
}
