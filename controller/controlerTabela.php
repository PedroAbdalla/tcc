<?php
    require_once('../classes/modeloTabela.inc');
    require_once('../dao/tabelaDao.inc');
    require_once('../classes/usuario.php');
    require_once('../classes/Tabela_usuario_imagens.php');
    require_once('../classes/Tabela_usuario_Categoria.php');
    require_once('../dao/usuarioDao.inc');
    require_once('../dao/usuarioCategoriaDao.php');
    require_once('../dao/usuarioImagensDao.php');
    include_once('../lib/php/funcoes.php');
    $opcao = (int)$_REQUEST['opcao'];
    empty($_SESSION['usuarioLogado']['id']) ? $id_tabela = 1 :  $id_tabela = $_SESSION['usuarioLogado']['id'];
	session_start();
    if($opcao == 1){
        $usuarioCategoriaDao = new usuarioCategoriaDao();
        $categorias = $usuarioCategoriaDao->listarCategorias($id_tabela);
        $caminho = '../view/publico/index.php';
    }
    if($opcao == 2){
        unset($_SESSION['usuarioLogado']);
        $tabelaDao = new tabelaDao();
        $categoria = $tabelaDao->getCategoria();
        $caminho = '../view/publico/index.php';
    }
    if($opcao == 3){
        $caminho = '../view/publico/talk.php';
    }
    if($opcao == 4){
        if(!empty($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado']['permicao'] == 'a'){
            $caminho = '../view/restrito/admin.php';
        } else {
            $caminho = '../view/publico/erro.php';
        }
    }
    if($opcao == 6){
        $caminho = '../view/publico/erro.php';
    }
    include_once('../view/publico/topo.php');
    include_once($caminho);
    include_once('../view/publico/footer.html');
?>