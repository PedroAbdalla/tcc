<?php
require_once('../classes/modeloTabela.inc');
require_once('../dao/tabelaDao.inc');
    $tabelaDao = new tabelaDao();
    $lista = $tabelaDao->getTabela();
    session_start();
    $_SESSION['tabela'] = $lista;

    $tabelaDao = new tabelaDao();
    $categoria = $tabelaDao->getCategoria();
    $_SESSION['categoria'] = $categoria;

    header("Location:../restrito/index.php");

?>