<?php

    require_once('../classes/usuario.php');
    require_once('../classes/Tabela_usuario_imagens.php');
    require_once('../classes/Tabela_usuario_Categoria.php');
    require_once('../dao/usuarioDao.inc');
    require_once('../dao/usuarioCategoriaDao.php');
    require_once('../dao/usuarioImagensDao.php');
    include_once('../lib/php/funcoes.php');
    $opcao = (int)$_REQUEST['opcao'];
    session_start();
  
    if ($opcao == 1) {
        $senha = base64_encode($_POST['senha']);
        if(empty($_POST['acesso'])) {
            $_POST['acesso'] = 'n';
        }
        $usuario = new Usuario($_POST['login'],$senha,$_POST['usuario'],$_POST['acesso']);
        $usuarioDao = new usuarioDao();
        $last_id = $usuarioDao->incluirUsuario($usuario);


        $source = "../imagens/1";
        $dest = "../imagens/$last_id";

        $usuarioCategoriaDao = new usuarioCategoriaDao();
        $usuarioCategoriaDao->cloneCategorias($last_id);

        $usuarioImagensDao = new usuarioImagensDao();
        $usuarioImagensDao->CloneImagens($last_id);

        rcopy($source, $dest);

        $_SESSION['msg'] = "Usuario incluido com sucesso";
        $_SESSION['tipo_msg'] = "ok";
        if(!empty($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado']['permicao'] == 'a'){
            header("Location:../tcc/lista_usuario");
        } else {
            header("Location:../tcc/index");
        }
        exit;
    }
    if ($opcao == 2) {
        $usuarioDao = new usuarioDao();
        $lista = $usuarioDao->listarUsuarios();
        $caminho = '../view/restrito/lista_usuario.php';
    }
    if ($opcao == 3) {
        $tipo = $_REQUEST['tipo'];
        if(!empty($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado']['permicao'] == 'a'){
            $caminho = '../view/restrito/novo_usuario.php';
        } 
        else if ($tipo == 'n') {
            $caminho = '../view/publico/cadastrar_usuario.php';
        }
        else {
            $caminho = '../view/publico/erro.php';
        }
    }
    if ($opcao == 4) {
        $id = (int)$_REQUEST['id'];
        $usuarioDao = new usuarioDao();
        $usuario = $usuarioDao->getUsuarioId($id);
        $caminho = '../view/restrito/editar_usuario.php';
    }
    if ($opcao == 5) {
        $usuario = new Usuario($_POST['login'],0,$_POST['usuario'],$_POST['acesso']);
        $usuario->setId($_POST['id']);

        $usuarioDao = new usuarioDao();
        $usuarioDao->editarUsuario($usuario);
        
        $_SESSION['msg'] = "Usuario alterado com sucesso";
        $_SESSION['tipo_msg'] = "ok";
        header("Location:../tcc/lista_usuario");
        exit;

    }
    if ($opcao == 6) {
       $senha1 = $_POST['senha1'];
       $senha2 = $_POST['senha2'];

       if ($senha1 == $senha2) {
            $senha1 = base64_encode($senha1);
            $usuarioDao = new usuarioDao();
            $usuarioDao->editarSenha($senha1, $_POST['id']);
            
            $_SESSION['msg'] = "senha alterada com sucesso";
            $_SESSION['tipo_msg'] = "ok";
       } else {
            $_SESSION['msg'] = "digite as duas senhas iguais";
            $_SESSION['tipo_msg'] = "erro";
       }
       if($_SESSION['usuarioLogado']['permicao'] == 'a'){
            header("Location:../tcc/lista_usuario");
        } else {
            header("Location:../../tcc/index");
        }
        exit;

    }
    if($opcao == 7) {
        if(!empty($_REQUEST['id_tabela']) && $_SESSION['usuarioLogado']['permicao'] == 'a'){
            $id = 1;
            $caminho = '../view/restrito/tb_padrao.php';
        } else {
            $id = $_SESSION['usuarioLogado']['id'];
            $caminho = '../view/publico/tb_usuario.php';
        }
        $usuarioCategoriaDao = new usuarioCategoriaDao();
        $categorias = $usuarioCategoriaDao->listarCategorias($id);
        
        
    }
    if($opcao == 8) {
        if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
            $id_nova_categoria = $_REQUEST['padrao'];
        } else {
            $id_nova_categoria = $_SESSION['usuarioLogado']['id'];
        }
        $dirname =  $id_nova_categoria . '/temporario' ;
        $dir = "../imagens/$dirname/";
        if(!file_exists($dir)){
            mkdir($dir, 0777, true);
        }
        $uploadfile = '';
        if ($_FILES['img']['size'] > 0) {


            $format =  explode('/', $_FILES['img']['type']);
            $nome_arquivo = $id_nova_categoria . '-cat-' . date("YmdHisu") . '.'  . $format[1];
            $uploadfile = $dir . basename($nome_arquivo);
        }
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile) || $_FILES['img']['size'] == 0) {
            
            $repositorio = $id_nova_categoria . '.cat.' . date("YmdHisu");
            $cat = new Tabela_usuario_categoria($id_nova_categoria,$_POST['categoria'], $nome_arquivo, $repositorio);
            $usuarioCategoriaDao = new usuarioCategoriaDao();
            $last_id = $usuarioCategoriaDao->incluirCategoria($cat);

            $usuarioCategoriaDao = new usuarioCategoriaDao();
            $imagem = $usuarioCategoriaDao->pegarCategorias($last_id);

            $pasta_name = $id_nova_categoria . '/' . $imagem->repositorio;
            $pasta = "../imagens/$pasta_name/";
            rename($dir, $pasta);

            $_SESSION['msg'] = "Categoria adicionada com sucesso";
            $_SESSION['tipo_msg'] = "ok";
            if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
                header("Location:../../tcc/lista_tabela_padrao");
            } else {
                header("Location:../../tcc/editar_tabela");
            }
            exit;
        } else {
            $caminho = '../view/publico/erro.php';
        }
    }
    if($opcao == 9) {
        if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
            $id_usuario_categoria = $_REQUEST['padrao'];
        } else {
            $id_usuario_categoria = $_SESSION['usuarioLogado']['id'];
        }
        $usuarioCategoriaDao = new usuarioCategoriaDao();
        $lista = $usuarioCategoriaDao->listarCategorias($id_usuario_categoria);
        include_once('../ajax/ajax_select_categorias.php');
        exit;
    }
    if($opcao == 10) {
        if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
            $id_usuario_categoria = $_REQUEST['padrao'];
        } else {
            $id_usuario_categoria = $_SESSION['usuarioLogado']['id'];
        }
        $id_categoria = (int)$_REQUEST['id_categoria'];

        $usuarioCategoriaDao = new usuarioCategoriaDao();
        $cat = $usuarioCategoriaDao->pegarCategorias($id_categoria);

        $repositorio = $cat->repositorio;

        $usuarioImagensDao = new usuarioImagensDao();
        $lista = $usuarioImagensDao->listarImagens($id_categoria);

        include_once('../ajax/ajax_lista_imagens.php');
        exit;
    }
    if($opcao == 11) {  
        if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
            $id_usuario_categoria = $_REQUEST['padrao'];
        } else {
            $id_usuario_categoria = $_SESSION['usuarioLogado']['id'];
        }
        $id_imagem = (int)$_REQUEST['id_imagem'];
        $usuarioImagensDao = new usuarioImagensDao();
        $imagem = $usuarioImagensDao->selecionarImagem($id_imagem);

        $usuarioCategoriaDao = new usuarioCategoriaDao();
        $cat = $usuarioCategoriaDao->pegarCategorias($imagem->id_categoria);

        $dir_imagem = "../imagens/" . $id_usuario_categoria . "/" . $cat->repositorio . "/" . $imagem->imagem;
        if(unlink($dir_imagem) == true) {
            $lista = $usuarioImagensDao->excluirImagem($id_imagem);
        }
        exit;
    }
    if($opcao == 12) {
        if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
            $id_nova_imagem = $_REQUEST['padrao'];
        } else {
            $id_nova_imagem = $_SESSION['usuarioLogado']['id'];
        }
        $usuarioCategoriaDao = new usuarioCategoriaDao();
        $imagem = $usuarioCategoriaDao->pegarCategorias($_POST['id_categoria']);

        $dir = "../imagens/" . $id_nova_imagem . "/" . $imagem->repositorio . "/";
        $format =  explode('/', $_FILES['img']['type']);
        $nome_arquivo = $id_nova_imagem . '-img-' . date("YmdHisu") . '.'  . $format[1];
        $uploadfile = $dir . basename($nome_arquivo);

        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
            $nova_imagem = new Tabela_usuario_imagens($_POST['id_categoria'], $_POST['fonetica'], $nome_arquivo);
            $usuarioImagensDao = new usuarioImagensDao();
            $usuarioImagensDao->incluirImagem($nova_imagem);
            
            $_SESSION['msg'] = "Imagem adicionada com sucesso";
            $_SESSION['tipo_msg'] = "ok";
            if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
                header("Location:../../tcc/lista_tabela_padrao");
            } else {
                header("Location:../../tcc/editar_tabela");
            }
            exit;
        } else {
            $caminho = '../../tcc/view/publico/erro.php';
        }
    }
    if($opcao == 13) {
        if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
            $id_usuario_categoria = $_REQUEST['padrao'];
        } else {
            $id_usuario_categoria = $_SESSION['usuarioLogado']['id'];
        }
        $id_categoria = (int)$_REQUEST['id_categoria'];
        $usuarioCategoriaDao = new usuarioCategoriaDao();

        $cat = $usuarioCategoriaDao->pegarCategorias($id_categoria);
        $usuarioCategoriaDao->excluirCategoria($id_usuario_categoria, $id_categoria);
        $_SESSION['msg'] = "Categoria excluída com sucesso";
        $_SESSION['tipo_msg'] = "ok";


        $dirname = "../imagens/" . $id_usuario_categoria . "/" . $cat->repositorio;
        array_map('unlink', glob("$dirname/*.*"));
        rmdir($dirname);
        
        if(!empty($_REQUEST['padrao']) && $_SESSION['usuarioLogado']['permicao'] == 'a') {
            header("Location:../../../tcc/lista_tabela_padrao");
        } else {
            header("Location:../../tcc/editar_tabela");
        }
        exit;
    }
    if($opcao == 14) {
        $id_usuario = $_REQUEST['id_usuario'];
        $usuarioCategoriaDao = new usuarioCategoriaDao();
        $retorno = $usuarioCategoriaDao->listarTalk($id_usuario);
        $palavras = array();
        foreach ($retorno as $key => $value) {
            array_push($palavras, $value->categoria);
        }
        echo json_encode($palavras);

        exit;
    }
    if($opcao == 15) {
        $id_categoria = (int)$_REQUEST['id_categoria'];
        $repositorio = $_REQUEST['repositorio'];
        $usuarioImagensDao = new usuarioImagensDao();
        $lista = $usuarioImagensDao->listarImagens($id_categoria);
        include_once('../../tcc/ajax/ajaxPrancha.php');
        exit;
    }
    include_once('../view/publico/topo.php');
    include_once($caminho);
    include_once('../view/publico/footer.html');

?>