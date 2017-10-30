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
    public function getUsuarioId($id)
    {
        $sql = $this->conn->prepare("SELECT id, login, nome, permicao FROM usuario where id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function incluirUsuario(Usuario $usuario)
    {
     
        $sql = $this->conn->prepare("INSERT INTO usuario(login, senha, nome, permicao) VALUES (:a, :b, :c, :d)");
        $sql->bindValue(':a',$usuario->getLogin());
        $sql->bindValue(':b',$usuario->getSenha());
        $sql->bindValue(':c',$usuario->getNome());
        $sql->bindValue(':d',$usuario->getPermicao());
        $sql->execute();

    }
    public function listarUsuarios()
    {
        $rs = $this->conn->query("SELECT * FROM usuario");
        $lista = array();
        while($usuario = $rs->fetch(PDO::FETCH_OBJ))
        {
            $lista[] = $usuario;
        }
        return $lista;
    }

    public function editarUsuario(Usuario $usuario)
    {
        $sql = $this->conn->prepare("UPDATE usuario SET nome= :nome, permicao= :permicao WHERE id=:id");
        $sql->bindValue(':id',$usuario->getId());
        $sql->bindValue(':nome',$usuario->getNome());
        $sql->bindValue(':permicao',$usuario->getPermicao());
        $sql->execute();
    }

    public function editarSenha($senha, $id)
    {
        $sql = $this->conn->prepare("UPDATE usuario SET senha= :senha WHERE id=:id");
        $sql->bindValue(':id',$id);
        $sql->bindValue(':senha',$senha);
        $sql->execute();
    }
}
?>