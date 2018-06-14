<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="exampleModalLabel">Informações do usuário</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <span class="col-sm-2 text-right"><b>Login: </b></span>
                    <span class='col-sm-9'><?= $_SESSION['usuarioLogado']['login'] ?></span>
                </div>                
                <div class="row">
                    <span class="col-sm-2 text-right"><b>Usuário: </b></span>
                    <span class='col-sm-9'><?= $_SESSION['usuarioLogado']['nome'] ?></span>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-6 text-left">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">Atualizar Senha</button>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="/tcc/deslogar"><button type="button" class="btn btn-primary" onclick="logar()">Deslogar</button></a>
                </div>
            </div>
            <div class="bolinha"></div>
        </div>
    </div>
</div>
<?php
include_once('../view/publico/modal_senha.php');
?>