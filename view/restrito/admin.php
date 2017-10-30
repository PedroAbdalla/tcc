<?php 
if(!empty($_SESSION['msg'])){ ?>
	<div class="col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3 div-msg div-msg-<?= $_SESSION['tipo_msg'] ?>">
	    <div class="text-right">
	        <span class="glyphicon glyphicon-remove-circle" onclick="fecharMsg()"></span>
	    </div>
	    <h4><?= $_SESSION['msg'] ?></h4>
	</div>
	<?php 
	unset($_SESSION['msg']);
	unset($_SESSION['tipo_msg']);
} ?>
<ul class="list-inline col-xs-12">
	<li><a href="novo_usuario"><button type="button" class="btn btn-default">Novo Usuário</button></a></li>
	<li><a href="lista_usuario"><button type="button" class="btn btn-default">Listar Usuários</button></a></li>
</ul>