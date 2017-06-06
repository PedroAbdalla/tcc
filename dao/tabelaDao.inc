<?php
    require_once('conexao.inc');
    require_once('../classes/modeloTabela.inc');

class TabelaDao{

    private $conn;

    function TabelaDao()
    {
        $c = new Conexao();
        $this->conn = $c->getConexao();
    }
   
    public function getTabela($categoria)
    {
        $sql = $this->conn->prepare("SELECT * FROM tabela_defoult where categoria=:categoria");
        $sql->bindValue(':categoria',$categoria);
        $sql->execute();
        $lista = array();
        while($tb = $sql->fetch(PDO::FETCH_OBJ))
        {
            $lista[] = $tb;
        }
        return $lista;
    }
    public function getCategoria()
    {
        $rs = $this->conn->query("SELECT categoria FROM tabela_defoult group by categoria");
        $categoria = array();
        while($cat = $rs->fetch(PDO::FETCH_OBJ))
        {
            $categoria[] = $cat;
        }
        return $categoria;
    }
}
?>
