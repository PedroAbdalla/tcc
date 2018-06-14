<?php 

if(!empty($_SESSION['msg'])){
    msg($_SESSION['msg'], $_SESSION['tipo_msg']);
}
?>

<ul class="list-inline col-xs-12">
	<li><a href="../../tcc/novo_usuario"><button type="button" class="btn btn-default">Novo Usuário</button></a></li>
	<li><a href="../../tcc/lista_usuario"><button type="button" class="btn btn-default">Listar Usuários</button></a></li>
	<li><a href="../../tcc/lista_tabela_padrao"><button type="button" class="btn btn-default">Tabela Padrão</button></a></li>
</ul>