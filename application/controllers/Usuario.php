<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
        public $dados;

    public function cadastrar(){
        if($this->session->logado){
            if($this->session->permissao == 'Administrador') {
                $this->load->model('Usuarios', 'user');
                $this->user->nome = $this->input->post('empresa');
                $this->user->senha = hash('sha256',$this->input->post('senha'));
                $this->user->email = $this->input->post('email');
                $this->user->permissao = $this->input->post('permissao');
                $this->user->cadastrarUsuario();
                redirect('listaUsuarios');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        }
    }

    public function atualizar($id=null){
        $this->load->model('Usuarios','usuario');
        $this->usuario->nome = $this->input->post('empresa');
        $this->usuario->senha = hash('sha256',$this->input->post('senha'));
        $this->usuario->email = $this->input->post('email');
        $this->usuario->permissao = $this->input->post('permissao');
        $this->usuario->atualizar($id);
        redirect('listaUsuarios');
    }
    public function deletar($id=null){
        $this->load->model('Usuarios','usuario');
        $this->usuario->deletar($id);
        redirect('listaUsuarios');
    }

    public function listar(){
        if($this->session->logado){
            if($this->session->permissao == 'Administrador') {
                $this->load->model('Usuarios','usuario');
                $dados['usuarios'] = $this->usuario->listarCliente();
                $this->load->view('template/header');
                $this->load->view('template/adm');
                $this->load->view('listaUsuario',$dados);
                $this->load->view('template/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        }
    }
    public function novoUsuario(){
        if($this->session->logado){
            if($this->session->permissao == 'Administrador') {
                $this->load->view('template/header');
                $this->load->view('template/adm');
                $this->load->view('novoUsuario');
                $this->load->view('template/footer');
            }else{
                redirect('login');
            }
        }else {
            redirect('login');
        }
    }

    public function exibirUsuario($id=null){
        $this->load->model('Usuarios','usuario');
        $dados['use'] = $this->usuario->buscar($id);
        $this->load->view('template/header');
        $this->load->view('template/adm');
        $this->load->view('exibirUsuario',$dados);
        $this->load->view('template/footer');
    }
}
