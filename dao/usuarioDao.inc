<?php
    require_once('conexao.inc');
    require_once('../classes/modeloTabela.inc');

class usuarioDao{

    private $conn;

    function usuarioDao()
    {
        $c = new Conexao();
        $this->conn = $c->getConexao();
    }
   
    public function getUsuario($usuario)
    {
        $sql = $this->conn->prepare("SELECT * FROM usuario where login=:usuario");
        $sql->bindValue(':usuario',$usuario);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }
}
?>
