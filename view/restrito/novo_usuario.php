<?php
include_once('admin.php');
?>
<form method="post" action="enviar_usuario">
	<div class="form-group">
		<label>Login</label>
		<input type="text" name="login" class="form-control" placeholder="Login">
	</div>
	<div class="form-group">
		<label>Senha</label>
		<input type="password" name="senha" class="form-control" placeholder="Senha">
	</div>
	<div class="form-group">
		<label>Nome</label>
		<input type="text" name="usuario" class="form-control" placeholder="Nome">
	</div>
	<div class="form-group">
		<label>Permissão de acesso</label>
		<div class="radio">
			<label>
				<input type="radio" name="acesso" value="n" checked=""> Normal
			</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="acesso" value="a" > Administrativo
			</label>
		</div>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>