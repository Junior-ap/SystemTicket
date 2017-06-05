<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller{
    public $dados;
    //Listar Ticket nas telas do Adm e Colaborador
    public function listar($status = null){
        $this->load->model('TicketModel', 'ticket');
        if ($this->session->permissao == 'Administrador') {
            if($status=='Todas'){
                $dados['ticket'] = $this->ticket->listarTicketTodos();
            }else{
                $dados['ticket'] = $this->ticket->listar($status);}
            $this->load->view('template/header');
            $this->load->view('template/adm');
            $this->load->view('listaTicket', $dados);
            $this->load->view('template/footer');
        } elseif ($this->session->permissao == 'Colaborador') {
            if($status=='Todas'){
                $dados['ticket'] = $this->ticket->listarTicketTodos();
            }else{
                $dados['ticket'] = $this->ticket->listar($status);}
            $this->load->view('template/header');
            $this->load->view('template/colaborador');
            $this->load->view('listaTicket', $dados);
            $this->load->view('template/footer');
        } elseif ($this->session->permissao == 'Cliente') {
            if($status=='Todas'){
                $dados['ticket'] = $this->ticket->listarTodostUsuario($this->session->id);
            }else{
                $dados['ticket'] = $this->ticket->listarTicketUsuario($status, $this->session->id);}
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
            $dados['ticket'] = $this->ticket->buscarTicket($id);
            $dados['comentario'] = $this->ticket->buscarComentario($id);
            $this->load->view('template/header');
            $this->load->view('template/adm');
            $this->load->view('exibirTicket',$dados);
            $this->load->view('template/footer');
        } elseif ($this->session->permissao == 'Colaborador') {

        } elseif ($this->session->permissao == 'Cliente') {

        }

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
    public function comentarTicket($idTicket=null,$idUsuario=null){
        $this->load->model('TicketModel', 'comentario');
        $this->comentario->comentario = $this->input->post('comentario');
        $this->comentario->fkticket = $idTicket;
        $this->comentario->fkusuario = $idUsuario;
        $this->comentario->comentar();
        redirect('exibirTicket/'.$idTicket);
    }
    //Finalizar o Ticket
    public function statusTicket($idTicket=null,$status){
        $this->load->model('TicketModel', 'ticket');
        $this->ticket->status = $status;
        $this->ticket->finalizar($idTicket);
        redirect('listar/'.'Todas');
    }
    //Enviar Email
    public function enviarEmail(){
        echo "oi";
        $this->load->library("email");
        $config["protocol"] ="smtp";
        $config["smtp_host"]= "ssl://smtp.gmail.com";
        $config["smtp_user"] = "junior4g4@gmail.com";
        $config["smtp_pass"] = "juniorgl4";
        $config["charset"] = "utf-8";
        $config["mailtupe"] = "html";
        $config["newline"] = "\r\n";
        $this->email->initialize();

        $this->email->from("junior4g4@gmail.com", "Email");
        $this->email->to("junior4g4@gmail.com");
        $this->email->subject("Teste de email");
        $this->email->message("testando");
        $this->email->send();
    }


}
