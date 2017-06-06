<?php
class Tabela{
	private $id;
	private $nome_imagem;
	private $fonetica;
	private $categoria;
	function setTabela($id, $nome_imagem, $fonetica, $categoria) {
        $this->id = $id;
        $this->nome_imagem = $nome_imagem;
        $this->fonetica = $fonetica;
        $this->categoria = strtotime($categoria);
    }
	function  Tabela($nome_imagem, $fonetica, $categoria) {
        $this->nome_imagem = $nome_imagem;
        $this->fonetica = $fonetica;
        $this->categoria = strtotime(str_replace('/', '-', $categoria));
    }
 	function getId() {
        return $this->id;
    }

    function getNome_imagem() {
        return $this->nome_imagem;
    }

    function getFonetica() {
        return $this->fonetica;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome_imagem($nome_imagem) {
        $this->nome_imagem = $nome_imagem;
    }

    function setFonetica($fonetica) {
        $this->fonetica = $fonetica;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
}
?>