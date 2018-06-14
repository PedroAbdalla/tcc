<form method="post" action="../enviar_usuario">
	<input type="hidden" name="<?= $tipo ?>">
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
	<button type="submit" class="btn btn-default">Submit</button>
</form>