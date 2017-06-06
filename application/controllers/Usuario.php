<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
//Listar Usuario
    public function listar(){
        autoriza();
        autorizaAdmRedirect();
            $this->load->model('Usuarios','usuario');
            $dados['usuarios'] = $this->usuario->listarCliente();
            $this->load->view('template/header');
            $this->load->view('template/adm');
            $this->load->view('listaUsuario',$dados);
            $this->load->view('template/footer');
    }
//Carregar view de novo Usuarario
    public function novoUsuario(){
        autoriza();
        autorizaAdmRedirect();
            $this->load->view('template/header');
            $this->load->view('template/adm');
            $this->load->view('novoUsuario');
            $this->load->view('template/footer');
    }
//Cadastar Usuarario no banco de Dados
    public function cadastrar(){
        autoriza();
        autorizaAdmRedirect();
            $this->load->model('Usuarios', 'user');
            $this->user->nome = $this->input->post('empresa');
            $this->user->senha = hash('sha256',$this->input->post('senha'));
            $this->user->email = $this->input->post('email');
            $this->user->permissao = $this->input->post('permissao');
            $this->user->cadastrarUsuario();
            redirect('listaUsuarios');
    }
//Exibir Usuario do banco de dados
    public function exibirUsuario($id=null){
        autoriza();
        autorizaAdmRedirect();
        $this->load->model('Usuarios','usuario');
        $dados['use'] = $this->usuario->buscar($id);
        $this->load->view('template/header');
        $this->load->view('template/adm');
        $this->load->view('exibirUsuario',$dados);
        $this->load->view('template/footer');
    }
//Atualizar Usuarario no banco de Dados
    public function atualizar($id=null){
        autoriza();
        autorizaAdmRedirect();
            $this->load->model('Usuarios','usuario');
            $this->usuario->nome = $this->input->post('empresa');
            $this->usuario->senha = hash('sha256',$this->input->post('senha'));
            $this->usuario->email = $this->input->post('email');
            $this->usuario->permissao = $this->input->post('permissao');
            $this->usuario->atualizar($id);
            redirect('listaUsuarios');
    }
//Deletar Usuario do banco de dados
    public function deletar($id=null){
        autoriza();
        autorizaAdmRedirect();
            $this->load->model('Usuarios','usuario');
            $this->usuario->deletar($id);
            redirect('listaUsuarios');
    }

}
