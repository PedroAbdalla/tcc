<?php
    include_once('topo.php');
?>
<script type="text/javascript">
    jQuery(function() {
      falarMsg();
    });
</script>
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