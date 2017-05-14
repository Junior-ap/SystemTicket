<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {
    //Listar Ticket nas telas do Adm e Colaborador


    public function listar(){

    }
    //Listar Ticket na tela do usuario
    public function listarTicketUsuario(){
        if($this->session->logado){
            if($this->session->permissao == 'Cliente') {
                $this->load->view('template/header');
                $this->load->view('template/cliente');
                $this->load->view('novoTicket');
                $this->load->view('template/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        }
    }
    //Quando clicar em um Ticket exibir o mesmo
    public function ExibirTicket(){

    }
    //Finalizar o Ticket
    public function fecharTicket(){

    }
    //Novo Ticket
    public function novoTicket(){
        if($this->session->logado){
            if($this->session->permissao == 'Cliente'){
                $this->load->model('TicketModel', 'ticket');
                $this->ticket->ticket = $this->input->post('ticket');
                $this->ticket->assunto = $this->input->post('assunto');
                $this->ticket->prioridade = $this->input->post('prioridade');
                $this->ticket->fkusuario = $this->session->id;
                $this->ticket->salvarTicket();
                redirect('lista');
            }else{
                redirect();
            }
            //falta so o mandar o email
        }else{
            redirect('login');
        }
    }
    public function comentarTicket(){

    }
    //Enviar Email
    public function enviarEmail(){


    }


}
