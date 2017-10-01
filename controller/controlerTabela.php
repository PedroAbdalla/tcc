<?php
    require_once('../classes/modeloTabela.inc');
    require_once('../dao/tabelaDao.inc');
    $opcao = (int)$_REQUEST['opcao'];
	session_start();
    if($opcao == 1){
        $tabelaDao = new tabelaDao();
        $categoria = $tabelaDao->getCategoria();
        require_once('../restrito/index.php');
    }
    if($opcao == 2){
    	unset($_SESSION['usuarioLogado']);
    	$tabelaDao = new tabelaDao();
        $categoria = $tabelaDao->getCategoria();
        require_once('../restrito/index.php');
    }
?>