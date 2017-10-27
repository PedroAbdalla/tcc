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
        header("Location:../tcc/lista_usuario");
    }
    if ($opcao == 2) {
        $usuarioDao = new usuarioDao();
        $lista = $usuarioDao->listarUsuarios();
        $caminho = '../view/restrito/lista_usuario.php';
    }
    if($opcao == 3){
        if(!empty($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado']['permicao'] == 'a'){
            $caminho = '../view/restrito/novo_usuario.php';
        } else {
            $caminho = '../view/publico/erro.php';
        }
    }
    if($opcao == 4){
        $id = (int)$_REQUEST['id'];
        $caminho = '../view/restrito/editar_usuario.php';
    }
    include_once('../view/publico/topo.php');
    include_once($caminho);
    include_once('../view/publico/footer.html');
?>