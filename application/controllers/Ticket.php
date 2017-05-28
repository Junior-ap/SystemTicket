<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller{
    //Listar Ticket nas telas do Adm e Colaborador
    public function listar($status = null){
        $this->load->model('TicketModel', 'ticket');
        if ($this->session->permissao == 'Administrador') {
            if($status=='Todas'){$dados['ticket'] = $this->ticket->listarTicketTodos();
            }else{$dados['ticket'] = $this->ticket->listar($status);}
            $this->load->view('template/header');
            $this->load->view('template/adm');
            $this->load->view('listaTicket', $dados);
            $this->load->view('template/footer');
        } elseif ($this->session->permissao == 'Colaborador') {
            if($status=='Todas'){$dados['ticket'] = $this->ticket->listarTicketTodos();
            }else{$dados['ticket'] = $this->ticket->listar($status);}
            $this->load->view('template/header');
            $this->load->view('template/colaborador');
            $this->load->view('listaTicket', $dados);
            $this->load->view('template/footer');
        } elseif ($this->session->permissao == 'Cliente') {
            if($status=='Todas'){$dados['ticket'] = $this->ticket->listarTodostUsuario($this->session->id);
            }else{$dados['ticket'] = $this->ticket->listarTicketUsuario($status, $this->session->id);}
            $this->load->view('template/header');
            $this->load->view('template/cliente');
            $this->load->view('listaTicket', $dados);
            $this->load->view('template/footer');
        }
    }
    //Listar Ticket na tela do usuario
    public function criarTicketUsuario(){
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
    public function exibirTicket($id=null){

        $this->load->model('TicketModel', 'ticket');
        if ($this->session->permissao == 'Administrador') {

            $this->load->view('template/header');
            $this->load->view('template/adm');
            $this->load->view('exibirTicket');
            $this->load->view('template/footer');
        } elseif ($this->session->permissao == 'Colaborador') {

        } elseif ($this->session->permissao == 'Cliente') {

        }



    }
    //Finalizar o Ticket
    public function fecharTicket(){

    }
    //Novo Ticket
    public function novoTicket(){
        echo('oi');
        if($this->session->logado){
            if($this->session->permissao == 'Cliente'){
                $this->load->model('TicketModel', 'ticket');
                $this->ticket->ticket = $this->input->post('ticket');
                $this->ticket->assunto = $this->input->post('assunto');
                $this->ticket->prioridade = $this->input->post('prioridade');
                $this->ticket->fkusuario = $this->session->id;
                $this->ticket->status = 'Aberta';
                $this->ticket->salvarTicket();
                redirect('listar/'.'Todas');
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
