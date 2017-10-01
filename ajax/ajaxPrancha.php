<?php
require_once('../dao/tabelaDao.inc');
$tabelaDao = new tabelaDao();
$lista = $tabelaDao->getTabela($_POST['valorCategoria']); ?>
<div class="prancha-ajax">
    <?php foreach ($lista as $tb) { ?>
        <div><img  class="figura img-thumbnail" src="../tcc/imagens/<?php echo $tb->nome_imagem ?>" data-text="<?php echo $tb->fonetica ?>"></div>
    <?php } ?>
</div>
<script type="text/javascript">
    jQuery(function() {
        setTimeout(function(){
            jQuery('.prancha-ajax').css('opacity', '1');
        }, 2000);
    });
</script>