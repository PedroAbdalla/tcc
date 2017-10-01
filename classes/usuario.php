<?php
class usuario {
    private $id;
    private $login;
    private $senha;
    private $usuario;
    function __construct($id, $login, $senha, $usuario) {
        $this->id = $id;
        $this->login = $login;
        $this->senha = $senha;
        $this->usuario = $usuario;
    }
    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
}
