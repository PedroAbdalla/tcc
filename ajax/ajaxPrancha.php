<?php
require_once('../dao/tabelaDao.inc');
$tabelaDao = new tabelaDao();
!empty($_SESSION['usuarioLogado']['id']) ? $us = $_SESSION['usuarioLogado']['id'] : $us = 1;
?>
<ul class="list-inline prancha-ajax">
    <?php foreach ($lista as $l) { ?>
        <li><img width="100" height="100" class="figura img-thumbnail" src="../../../tcc/imagens/<?= $us ?>/<?= $repositorio ?>/<?= $l->imagem ?>" data-text="<?php echo $l->fonetica ?>"></li>
    <?php } ?>
</ul>
<script type="text/javascript">
    jQuery(function() {
        setTimeout(function(){
            jQuery('.prancha-ajax').css('opacity', '1');
        }, 2000);
    });
</script>