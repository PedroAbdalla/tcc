<?php
    require_once('conexao.inc');
    require_once('../classes/Tabela_usuario_categoria.php');

class usuarioCategoriaDao{

    private $conn;

    function usuarioCategoriaDao()
    {
        $c = new Conexao();
        $this->conn = $c->getConexao();
    }
   
   
    public function incluirCategoria(Tabela_usuario_categoria $cat)
    {     
        $sql = $this->conn->prepare("INSERT INTO tabela_usuario_categoria(id_usuario, categoria, img) VALUES (:a, :b, :c)");
        $sql->bindValue(':a',$cat->getId_usuario());
        $sql->bindValue(':b',$cat->getCategoria());
        $sql->bindValue(':c',$cat->getImg());
        $sql->execute();
        return $this->conn->lastInsertId(); 
    }
    public function listarCategorias($id_usuario)
    {
        $sql = $this->conn->prepare("SELECT * FROM tabela_usuario_categoria where id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();
        $lista = array();
        while($tb = $sql->fetch(PDO::FETCH_OBJ))
        {
            $lista[] = $tb;
        }
        return $lista;
    }
    public function excluirCategoria($id_usuario, $id)
    {
        $sql = $this->conn->prepare("DELETE FROM tabela_usuario_categoria WHERE id=:id and id_usuario=:id_usuario");
        $sql->bindValue(':id',$id);
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();
    }

}
?>