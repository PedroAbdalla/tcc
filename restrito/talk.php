<?php
include_once('topo.php');
?>


<script type="text/javascript">
     function repeatMsg(msg) {
        var fala = new SpeechSynthesisUtterance(msg);
        window.speechSynthesis.speak(fala);
    }



    function sendMsg(){
        var msg = jQuery('#inpt-msg').val();
        if (msg == '')
            return;


        var currentdate = new Date(); 
        var datetime = currentdate.getDate() + "/"
        + (currentdate.getMonth()+1)  + "/" 
        + currentdate.getFullYear() + " - "
        + currentdate.getHours() + ":"
        + currentdate.getMinutes();



        jQuery('<div/>', {
            class: 'quadro-hst',
            text: datetime + ': ' + msg + ' '
        }).appendTo('.quadro-txt');

        jQuery('<span/>', {
            class: 'glyphicon glyphicon-volume-up'
        }).on('click', function() {
            repeatMsg(msg);
        }).appendTo('.quadro-hst:last');

        jQuery('.quadro-msg input').val('');

        repeatMsg(msg);
    }
    jQuery(function() {
      jQuery('#inpt-msg').keypress(function(event) {
        if (event.which == 13) {
          sendMsg();
      }
  });
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