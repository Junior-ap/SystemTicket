<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
//Cadastar Usuarario no banco de Dados
    public function cadastrarUsuario(){
        return
            $this->db->insert('usuario',$this);
    }
//Listar Usuario
    public function listarCliente(){
        $query = $this->db->get('usuario');
        return $query->result();
    }
//Busca Usuario
    public function buscar($id){
        return $this->db->select()
            ->from('usuario u')
            ->where('u.id =',$id)
            ->get()->result();
    }
//Deletar Usuario do banco de dados
    public function deletar($id){
        $this->db->where('id',$id);
        return $this->db->delete('usuario');
    }
//Atualizar Usuarario no banco de Dados
    public function atualizar($id){
        $this->db->set($this);
        $this->db->where('id', $id);
        return $this->db->update("usuario", $this);
    }
//Pesquisar se existe usuario Metodo login
    public function pesquisa($value, $param = 'nome'){
        return $this->db->get_where('usuario',array(
            $param=> $value
        ))->row();
    }
}
