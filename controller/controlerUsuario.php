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
        $_SESSION['msg'] = "Usuario incluido com sucesso";
        $_SESSION['tipo_msg'] = "ok";
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
        $usuarioDao = new usuarioDao();
        $usuario = $usuarioDao->getUsuarioId($id);
        $caminho = '../view/restrito/editar_usuario.php';
    }
    if($opcao == 5){
        $usuario = new Usuario($_POST['login'],0,$_POST['usuario'],$_POST['acesso']);
        $usuario->setId($_POST['id']);

        $usuarioDao = new usuarioDao();
        $usuarioDao->editarUsuario($usuario);
        
        header("Location:../tcc/lista_usuario");
        $_SESSION['msg'] = "Usuario alterado com sucesso";
        $_SESSION['tipo_msg'] = "ok";

    }
    if($opcao == 6){
       $senha1 = $_POST['senha1'];
       $senha2 = $_POST['senha2'];

       if($senha1 == $senha2){
            $senha1 = base64_encode($senha1);
            $usuarioDao = new usuarioDao();
            $usuarioDao->editarSenha($senha1, $_POST['id']);
            
            $_SESSION['msg'] = "senha alterada com sucesso";
            $_SESSION['tipo_msg'] = "ok";
       } else {
            $_SESSION['msg'] = "digite as duas senhas iguais";
            $_SESSION['tipo_msg'] = "erro";
       }

        
        header("Location:../tcc/lista_usuario");

    }
    if($opcao == 7){
        if(!empty($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado']['permicao'] == 'a'){
            $caminho = '../view/restrito/tb_padrao.php';
        } else {
            $caminho = '../view/publico/erro.php';
        }
    }
    include_once('../view/publico/topo.php');
    include_once($caminho);
    include_once('../view/publico/footer.html');
?>