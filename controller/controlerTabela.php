<?php
    require_once('../classes/modeloTabela.inc');
    require_once('../dao/tabelaDao.inc');
    $opcao = (int)$_REQUEST['opcao'];
	session_start();
    if($opcao == 1){
        $tabelaDao = new tabelaDao();
        $categoria = $tabelaDao->getCategoria();
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
    if($opcao == 5){
        if(!empty($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado']['permicao'] == 'a'){
            $caminho = '../view/restrito/novo_usuario.php';
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