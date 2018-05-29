<?php


class Tabela_usuario_categoria {

    private $id;
    private $id_usuario;
    private $categoria;
    private $img;
    private $repositorio;
    
    function __construct($id_usuario, $categoria, $img, $repositorio) {
        $this->id_usuario = $id_usuario;
        $this->categoria = $categoria;
        $this->img = $img;
        $this->repositorio = $repositorio;
    }
    
    function getId() {
        return $this->id;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getImg() {
        return $this->img;
    }

    function getRepositorio() {
        return $this->repositorio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setRepositorio($repositorio) {
        $this->repositorio = $repositorio;
    }


}