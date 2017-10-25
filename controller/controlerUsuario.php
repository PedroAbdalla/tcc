<?php
    require_once('../classes/usuario.php');
    require_once('../dao/usuarioDao.inc');
    $opcao = (int)$_REQUEST['opcao'];
    session_start();
  
    if($opcao == 1){
        $senha = base64_encode($_POST['senha']);
        $usuario = new Usuario($_POST['login'],$senha,$_POST['usuario'],$_POST['acesso']);
        $usuarioDao = new usuarioDao();
        $usuarioDao->incluirUsuario($usuario);
        $caminho = '../view/publico/erro.php';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        echo 'ok';
    }
  
?>