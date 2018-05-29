<?php
    require_once('conexao.inc');
    require_once('../classes/Tabela_usuario_imagens.php');

class usuarioImagensDao{

    private $conn;

    function usuarioImagensDao()
    {
        $c = new Conexao();
        $this->conn = $c->getConexao();
    }
    public function listarImagens($id_categoria)
    {
        $sql = $this->conn->prepare("SELECT * FROM tabela_usuario_imagens where id_categoria=:id_categoria");
        $sql->bindValue(':id_categoria',$id_categoria);
        $sql->execute();
        $lista = array();
        while($tb = $sql->fetch(PDO::FETCH_OBJ))
        {
            $lista[] = $tb;
        }
        return $lista;
    }
    public function excluirImagem($id)
    {
        $sql = $this->conn->prepare("DELETE FROM tabela_usuario_imagens WHERE id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();
    }
    public function selecionarImagem($id)
    {
        $sql = $this->conn->prepare("SELECT * FROM tabela_usuario_imagens where id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }
    public function incluirImagem(Tabela_usuario_imagens $img)
    {     
        $sql = $this->conn->prepare("INSERT INTO tabela_usuario_imagens(id_categoria, fonetica, imagem) VALUES (:a, :b, :c)");
        $sql->bindValue(':a',$img->getId_categoria());
        $sql->bindValue(':b',$img->getFonetica());
        $sql->bindValue(':c',$img->getImagem());
        $sql->execute();
    }
    public function CloneImagens($id_usuario)
    {
        $sql = $this->conn->prepare("SELECT d.id as id_categoria, fonetica, imagem FROM tabela_usuario_imagens LEFT JOIN tabela_usuario_categoria c ON id_categoria = c.id LEFT JOIN tabela_usuario_categoria d ON c.categoria = d.categoria AND d.id_usuario =:id_usuario");
        $sql->bindValue(':id_usuario', $id_usuario);
        $sql->execute();
        while($tb = $sql->fetch(PDO::FETCH_OBJ))
        {
            $sql1 = $this->conn->prepare("INSERT INTO tabela_usuario_imagens(id_categoria, fonetica, imagem) VALUES (:a, :b, :c)");
            $sql1->bindValue(':a',$tb->id_categoria);
            $sql1->bindValue(':b',$tb->fonetica);
            $sql1->bindValue(':c',$tb->imagem);
            $sql1->execute();
        }
    }
    
}
?>