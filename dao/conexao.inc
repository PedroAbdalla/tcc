<?php
	class Conexao
	{
		private $servidor_mysql = '127.0.0.1';
		private $nome_banco = 'tcc';
		private $usuario = 'root';
		private $senha = '';
		private $con;
		public function getConexao()
		{
			$this->con = new PDO("mysql:host=$this->servidor_mysql;dbname=$this->nome_banco;charset=utf8","$this->usuario","$this->senha");
			return $this->con;
		}
	}
?>