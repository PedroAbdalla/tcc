<?php
    require_once('../classes/modeloTabela.inc');
    require_once('../dao/tabelaDao.inc');
    $opcao = (int)$_REQUEST['opcao'];
    if($opcao == 1){
        abrirIndex();
    }
    function abrirIndex(){        
        $tabelaDao = new tabelaDao();
        $lista = $tabelaDao->getTabela();
        $categoria = $tabelaDao->getCategoria();

        session_start();
        $_SESSION['tabela'] = $lista;
        $_SESSION['categoria'] = $categoria;

        header("Location:../restrito/index.php");
    }
?>