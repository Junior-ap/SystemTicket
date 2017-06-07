<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller{
//Listar Ticket nas telas do Adm e Colaborador
    public function listar($status = null){
        autoriza();
        $this->load->model('TicketModel', 'ticket');
        if (autorizaAdm()) {
            if($status=='Todos'){
                $dados['ticket'] = $this->ticket->listarTicketTodos();
            }else{
                $dados['ticket'] = $this->ticket->listar($status);}
            $this->load->view('template/header');
            $this->load->view('template/adm');
            $this->load->view('listaTicket', $dados);
            $this->load->view('template/footer');
        } elseif (autorizaColaborador()) {
            if($status=='Todos'){
                $dados['ticket'] = $this->ticket->listarTicketTodos();
            }else{
                $dados['ticket'] = $this->ticket->listar($status);}
            $this->load->view('template/header');
            $this->load->view('template/colaborador');
            $this->load->view('listaTicket', $dados);
            $this->load->view('template/footer');
        } elseif (autorizaCliente()) {
            if($status=='Todos'){
                $dados['ticket'] = $this->ticket->listarTodostUsuario($this->session->id);
            }else{
                $dados['ticket'] = $this->ticket->listarTicketUsuario($status, $this->session->id);}
            $this->load->view('template/header');
            $this->load->view('template/cliente');
            $this->load->view('listaTicket', $dados);
            $this->load->view('template/footer');
        }
    }
//Carregar tela de Novo ticket (So Cliente pode Execulta)
    public function criarTicketUsuario(){
        autoriza();
        autorizaClienteRedirect();
        $this->load->model('TicketModel', 'ticket');
        $dados['assunto'] = $this->ticket->buscarAssunto();
            $this->load->view('template/header');
            $this->load->view('template/cliente');
            $this->load->view('novoTicket',$dados);
            $this->load->view('template/footer');
    }
//Salvar no banco de dados Novo Ticket (So Cliente pode Execulta)
    public function novoTicket($id=null){
        autoriza();
        autorizaClienteRedirect();
        $this->load->library("email");
        $this->load->model('Usuarios','usuario');
        $this->load->model('TicketModel', 'ticket');
            $this->ticket->ticket = $this->input->post('ticket');
            $this->ticket->assunto = $this->input->post('assunto');
            $this->ticket->prioridade = $this->input->post('prioridade');
            $this->ticket->fkusuario = $this->session->id;
            $this->ticket->status = 'Aberto';
            $this->ticket->salvarTicket();
        $user =$this->usuario->buscar($id);
        $dados=array("user"=>$user,"prioridade"=>$this->ticket->prioridade) ;
        $conteudo = $this->load->view('email',$dados, true);
        $this->email->from("junior4g4@gmail.com", "Novo Ticket no Sistema");
        $this->email->to("junior4g4@gmail.com");
        $this->email->subject("O Cliente {$user[0]->nome} Enviou um novo Ticket");
        $this->email->message($conteudo);
        $this->email->send();
        redirect('listar/'.'Todos');
    }
//Quando clicar em um Ticket exibir o mesmo
    public function exibirTicket($id=null){
        autoriza();
            $this->load->model('TicketModel', 'ticket');
            if (autorizaAdm()) {
                $dados['ticket'] = $this->ticket->buscarTicket($id);
                $dados['comentario'] = $this->ticket->buscarComentario($id);
                $this->load->view('template/header');
                $this->load->view('template/adm');
                $this->load->view('exibirTicket',$dados);
                $this->load->view('template/footer');
            } elseif (autorizaColaborador()) {
                $dados['ticket'] = $this->ticket->buscarTicket($id);
                $dados['comentario'] = $this->ticket->buscarComentario($id);
                $this->load->view('template/header');
                $this->load->view('template/colaborador');
                $this->load->view('exibirTicket', $dados);
                $this->load->view('template/footer');
            } elseif (autorizaCliente()) {
                $dados['ticket'] = $this->ticket->buscarTicket($id);
                $dados['comentario'] = $this->ticket->buscarComentario($id);
                $this->load->view('template/header');
                $this->load->view('template/cliente');
                $this->load->view('exibirTicket', $dados);
                $this->load->view('template/footer');
            }
    }
//Comentar Ticket
    public function comentarTicket($idTicket=null,$idUsuario=null){
        autoriza();
        $this->load->library("email");
        $this->load->model('Usuarios','usuario');
        $this->load->model('TicketModel', 'comentario');
            $this->comentario->comentario = $this->input->post('comentario');
            $this->comentario->fkticket = $idTicket;
            $this->comentario->fkusuario = $idUsuario;
            $this->comentario->comentar();
        $user =$this->usuario->buscar($idUsuario);
        $dados=array("user"=>$user,"id"=>$idTicket);
        $conteudo = $this->load->view('emailComentario',$dados, true);
        $this->email->from("junior4g4@gmail.com", "Novo Comentario no Sistema");
        $this->email->to("junior4g4@gmail.com");
        $this->email->subject("O Usuario {$user[0]->nome} fez um comentou");
        $this->email->message($conteudo);
        $this->email->send();
        redirect('exibirTicket/'.$idTicket);
    }
//Finalizar o Ticket
    public function statusTicket($idTicket=null,$status){
        autoriza();
            $this->load->model('TicketModel', 'ticket');
            $this->ticket->status = $status;
            $this->ticket->finalizar($idTicket);
            redirect('listar/'.'Todos');
    }
//Exibir Assunto
    public function assunto(){
        autoriza();
        autorizaAdmRedirect();
        $this->load->model('TicketModel', 'ticket');
        $dados['assunto'] = $this->ticket->buscarAssunto();
        $this->load->view('template/header');
        $this->load->view('template/adm');
        $this->load->view('assunto',$dados);
        $this->load->view('template/footer');
    }
//Salvar Assunto
    public function novoAssunto(){
        autoriza();
        autorizaAdmRedirect();
        $this->load->model('TicketModel', 'ticket');
        $this->ticket->assunto = $this->input->post('assunto');
        $this->ticket->salvarAssunto();
        redirect('assunto');
    }
//Excluir Assunto
    public function excluirAssunto($id=null){
        autoriza();
        autorizaAdmRedirect();
        $this->load->model('TicketModel', 'ticket');
        $this->ticket->exckuirAssunto($id);
        redirect('assunto');
    }
}
