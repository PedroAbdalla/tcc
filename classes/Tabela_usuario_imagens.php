<?php


class Tabela_usuario_imagens {
    private $id;
    private $id_categoria;
    private $fonetica;
    private $imagem;
    
    function __construct($id_categoria, $fonetica, $imagem) {
        $this->id_categoria = $id_categoria;
        $this->fonetica = $fonetica;
        $this->imagem = $imagem;
    }

    
    function getId() {
        return $this->id;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getFonetica() {
        return $this->fonetica;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setFonetica($fonetica) {
        $this->fonetica = $fonetica;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }


}
