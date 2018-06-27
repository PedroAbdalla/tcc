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
        $sql = $this->conn->prepare("INSERT INTO tabela_usuario_categoria(id_usuario, categoria, img, repositorio) VALUES (:a, :b, :c, :d)");
        $sql->bindValue(':a',$cat->getId_usuario());
        $sql->bindValue(':b',$cat->getCategoria());
        $sql->bindValue(':c',$cat->getImg());
        $sql->bindValue(':d',$cat->getRepositorio());
        $sql->execute();
        return $this->conn->lastInsertId(); 
    }

    public function listarCategorias($id_usuario)
    {
        $sql = $this->conn->prepare("SELECT * FROM tabela_usuario_categoria where id_usuario=:id_usuario order by categoria");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();
        $lista = array();
        while($tb = $sql->fetch(PDO::FETCH_OBJ))
        {
            $lista[] = $tb;
        }
        return $lista;
    }
    public function listarTalk($id_usuario)
    {
        $sql = $this->conn->prepare("SELECT categoria from tabela_usuario_categoria where id_usuario =:id_usuario union SELECT fonetica FROM tabela_usuario_imagens i LEFT JOIN tabela_usuario_categoria c ON c.id = i.id_categoria where id_usuario =:id_usuario  order by categoria");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();
        $lista = array();
        while($tb = $sql->fetch(PDO::FETCH_OBJ))
        {
            $lista[] = $tb;
        }
        return $lista;
    }

    public function pegarCategorias($id)
    {
        $sql = $this->conn->prepare("SELECT * FROM tabela_usuario_categoria where id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function excluirCategoria($id_usuario, $id)
    {
        $sql = $this->conn->prepare("DELETE FROM tabela_usuario_categoria WHERE id=:id and id_usuario=:id_usuario");
        $sql->bindValue(':id',$id);
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();
    }

    public function cloneCategorias($id_usuario)
    {
        $sql = $this->conn->prepare("SELECT * FROM tabela_usuario_categoria where id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario', 1);
        $sql->execute();
        $lista = array();
        while($tb = $sql->fetch(PDO::FETCH_OBJ))
        {
            $sql2 = $this->conn->prepare("INSERT INTO tabela_usuario_categoria(id_usuario, categoria, img, repositorio) VALUES (:a, :b, :c, :d)");
            $sql2->bindValue(':a',$id_usuario);
            $sql2->bindValue(':b',$tb->categoria);
            $sql2->bindValue(':c',$tb->img);
            $sql2->bindValue(':d',$tb->repositorio);
            $sql2->execute();
        }
    }

}
?>