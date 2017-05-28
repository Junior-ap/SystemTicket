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
        $query = $this->db->get('usuario');
        return $query->result();
    }

    public function buscar($id){
        return $this->db->select()
            ->from('usuario u')
            ->where('u.id =',$id)
            ->get()->result();
    }

    public function deletar($id){
        $this->db->where('id',$id);
        return $this->db->delete('usuario');
    }

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
