
<?php
    require_once('../classes/usuario.php');
    require_once('../dao/usuarioDao.inc');
    function verificaLoguin($login, $senha){
        $usuarioDao = new usuarioDao();
        $usuario = $usuarioDao->getUsuario($login);
        if(!empty($usuario)){
            $u = get_object_vars($usuario);
            if($u['login'] == $login && $u['senha'] == $senha){
                session_start();
                $_SESSION["usuarioLogado"]=$u;
                return true;
                exit;
            }
        }
        return false;
    }
?>