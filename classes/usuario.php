<?php
class Usuario {
    private $id;
    private $login;
    private $senha;
    private $nome;
    private $permicao;
    function setUsuario($id, $login, $senha, $nome, $permicao) {
        $this->id = $id;
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->permicao = $permicao;
    }
    function Usuario($login, $senha, $nome, $permicao) {
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->permicao = $permicao;
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

    function getNome() {
        return $this->nome;
    }

    function getPermicao() {
        return $this->permicao;
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

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPermicao($permicao) {
        $this->permicao = $permicao;
    }
}
