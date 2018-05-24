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
   
   
    // public function incluirCategoria(Tabela_usuario_categoria $cat)
    // {     
    //     $sql = $this->conn->prepare("INSERT INTO tabela_usuario_categoria(id_usuario, categoria, img) VALUES (:a, :b, :c)");
    //     $sql->bindValue(':a',$cat->getId_usuario());
    //     $sql->bindValue(':b',$cat->getCategoria());
    //     $sql->bindValue(':c',$cat->getImg());
    //     $sql->execute();
    // }
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
}
?>