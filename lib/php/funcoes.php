<?php
function msg($msg, $tipo)
{
	?>
    <div class="row">
        <div class="col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3 div-msg div-msg-<?= $tipo_msg ?>">
            <div class="text-right">
                <span class="glyphicon glyphicon-remove-circle" onclick="fecharMsg()"></span>
            </div>
            <h4 class="text-center <?= $tipo ?> "><?= $msg ?></h4>
        </div>
    </div>

    <?php
    unset($_SESSION['msg']);
    unset($_SESSION['tipo_msg']);
}