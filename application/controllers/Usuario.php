<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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

    public function atualizar(){


    }
    public function deletar(){


    }

    public function listar(){
        if($this->session->logado){
            if($this->session->permissao == 'Administrador') {
                $this->load->view('template/header');
                $this->load->view('template/adm');
                $this->load->view('listaUsuario');
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
}
