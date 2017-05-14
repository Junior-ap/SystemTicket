<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public $data;
    //Carregar a pagina inicial do sistema de login
    public function index(){
        if($this->session->logado){
            if($this->session->permissao == 'Administrador'){
                $this->load->view('template/header');
                $this->load->view('template/adm');
                $this->load->view('adm/listaTicket',$this->data);
                $this->load->view('template/footer');
            }elseif($this->session->permissao == 'Colaborador'){
                $this->load->view('template/header');
                $this->load->view('template/colaborador');
                $this->load->view('adm/listaTicket',$this->data);
                $this->load->view('template/footer');
            }elseif($this->session->permissao == 'Cliente'){
                $this->load->view('template/header');
                $this->load->view('template/cliente');
                $this->load->view('listaTicket',$this->data);
                $this->load->view('template/footer');
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('login',$this->data);
            $this->load->view('template/footer');
        }
    }
    //Verificar usuario e senha
    public function autenticar(){
        $this->load->model('Usuarios','usuario');
        $use = $this->usuario->pesquisa($this->input->post('usuario'));
        $senha= hash('sha256',$this->input->post('senha'));
        if($use && hash_equals($use->senha,$senha)){
            $data= array(
                'id' => $use->id,
                'nome' =>$use->nome,
                'email' =>$use->email,
                'permissao' =>$use->permissao,
                'logado' => TRUE
            );
            $this->session->set_userdata($data);
            $this->index();
        }
        else{
            $this->data['error']= new stdClass();
            $this->data['error']->message ='Usuario ou senha incorrentos';
            $this->index();
        }

    }

    //Deslogar o usuario
    public function sair(){
        $this->session->sess_destroy();
        $this->index();
        redirect();
    }


}
