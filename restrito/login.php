<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">LOGIN</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label class="control-label">Usuário:</label>
            <input type="text" class="form-control login">
          </div>
          <div class="form-group">
            <label class="control-label">Senha:</label>
            <input type="password" class="form-control senha">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="logar()">Logar</button>
      </div>
      <div class="bolinha"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function logar(){
        login = jQuery('.login').val();
        senha = jQuery('.senha').val();
        jQuery.ajax({
            url: '../tcc/ajax/autenticacao.php',
            type: 'POST',
            dataType: 'html',
            data: {login: login, senha: senha},
        })
        .done(function(e) {
           jQuery('.bolinha').html(e);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    }
</script>