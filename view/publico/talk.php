<?php 
!empty($_SESSION['usuarioLogado']['id']) ? $us = $_SESSION['usuarioLogado']['id'] : $us = 1;
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<input type="hidden" id="us-talk" value="<?= $us ?>">
<div class="row quadro">
    <div class="quadro-txt">
    </div>
    <div class="quadro-msg">
        <div class="input-group">
          <input id="inpt-msg" type="text" class="form-control">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default" onclick="sendMsg()"><span class="glyphicon glyphicon-volume-up"></span></button>
          </div>
        </div>
    </div>
</div>
<script>
$(function() {
    falarMsg();
    listarPalavras($('#us-talk').val());
});
</script>