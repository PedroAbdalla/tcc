<div id="tab-tb-padrao">
    <ul class="nav nav-tabs" role="tablist">
        <li onclick="" role="presentation" class="active"><a href="#tb-Categorias" aria-controls="tb-Categorias" role="tab" data-toggle="tab">Categorias</a></li>
        <li role="presentation"><a href="#tb-Imagens" aria-controls="tb-Imagens" role="tab" data-toggle="tab" onclick="trocarAba(1, 'tb-Imagens');">Imagens</a></li>
    </ul>
    <div class="tab-content">
        <div role="tb-Categorias" class="tab-pane active" id="tb-Categorias">
            <?php include_once('tb_usuario_categoria.php'); ?>
        </div>
        <div role="tb-Imagens" class="tab-pane" id="tb-Imagens">
            <?php include_once('tb_usuario_imagens.php'); ?>
        </div>
    </div>
</div>