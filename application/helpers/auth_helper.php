<?php
//Saber se Tem ususario em Sessão
function autoriza(){
    $ci = get_instance();
    $usuarioLogado = $ci->session->logado;
    if($usuarioLogado){
        return;
    }
   return redirect('login');
}
//Saber se o usuario tem permissão de Administrador (Retonar Verdadeiro ou Falso)
function autorizaAdm(){
    $ci = get_instance();
    if($ci->session->permissao == 'Administrador'){
        return true;
    }
    return false;
}
//Saber se o usuario tem permissão de Administrador (Caso não seja desloga)Para que so o Administrador tenha acesso
function autorizaAdmRedirect(){
    $ci = get_instance();
    if($ci->session->permissao == 'Administrador'){
        return;
    }
    return redirect('sair');
}
//Saber se o usuario tem permissão de Colaborador (Retonar Verdadeiro ou Falso)
function autorizaColaborador(){
    $ci = get_instance();
    if($ci->session->permissao == 'Colaborador'){
        return true;
    }
    return false;
}
//Saber se o usuario tem permissão de Cliente (Retonar Verdadeiro ou Falso)
function autorizaCliente(){
    $ci = get_instance();
    if($ci->session->permissao == 'Colaborador'){
        return true;
    }
    return false;
}
//Saber se o usuario tem permissão de Cliente (Caso não seja desloga)Para que so o Cliente tenha acesso
function autorizaClienteRedirect(){
    $ci = get_instance();
    if($ci->session->permissao == 'Cliente'){
        return true;
    }
    return redirect('sair');
}