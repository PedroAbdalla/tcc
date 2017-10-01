<?php
    require_once('../controller/controlerLogin.php');
    $login = $_POST['login'];
    $senha = base64_encode($_POST['senha']);
    $vl = verificaLoguin($login, $senha);
    if($vl == false){
        echo "<h3 class='bg-warning text-danger'>Usuario ou senha inválido.</h3>";
    } else {
        echo "<script>location.href='http://127.0.0.1/tcc/index';</script>";
    }
?>
