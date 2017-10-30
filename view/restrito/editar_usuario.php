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
        <label>Permição de acesso</label>
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
    <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">Atualizar Senha</button>
</form>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Alterar senha</h4>
             </div>
            <div class="modal-body">
                <form method="post" action="../atualizar_senha">
                    <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                    <div class="form-group">
                        <label>Nova senha</label>
                        <input id="senha1" type="password" name="senha1" class="form-control" placeholder="senha" required="" onkeyup="verificaSenha()" >
                    </div>
                    <div class="form-group">
                        <label>Repita a nova senha</label>
                        <input id="senha2" type="password" name="senha2" class="form-control" placeholder="senha" required="" onkeyup="verificaSenha()" >
                    </div>
                    <div class="row row-msg-erro"></div>
                    <button type="submit" class="btn btn-default btn-senha" disabled="">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function verificaSenha(){
        var senha1 = jQuery('#senha1').val();
        var senha2 = jQuery('#senha2').val();
        if(senha1 == senha2){
            jQuery('.btn-senha').prop('disabled', false);
            jQuery('#senha1, #senha2').css('box-shadow', '0px 0px 3px 1px rgba(0, 20, 255, 0.67)');
            jQuery('.row-msg-erro').html('');
        } else {
            jQuery('.btn-senha').prop('disabled', true);
            jQuery('#senha1, #senha2').css('box-shadow', '0px 0px 3px 1px rgba(255, 0, 0, 0.67)');
            jQuery('.row-msg-erro').html('Digite as duas senhas iguais.').css({'color': 'red', 'textAlign': 'center', 'padding': '0px 0 5px'});
        }
    }
</script>