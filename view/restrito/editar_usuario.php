<?php
include_once('admin.php');
?>
<form method="post" action="../atualizar_usuario">
    <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
    <div class="form-group">
        <label>Login</label>
        <input type="hidden" name="login" value="<?php echo $usuario->login ?>">
        <input type="text" class="form-control" placeholder="Login" value="<?php echo $usuario->login ?>" disabled="">
    </div>
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="usuario" class="form-control" placeholder="Nome" value="<?php echo $usuario->nome ?>">
    </div>
    <div class="form-group">
        <label>Permissão de acesso</label>
        <div class="radio">
            <label>
                <input type="radio" name="acesso" value="n" <?php if($usuario->permicao == 'n') echo 'checked';?>> Normal
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="acesso" value="a" <?php if($usuario->permicao == 'a') echo 'checked';?>> Administrativo
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-default">Atualizar</button>
</form>