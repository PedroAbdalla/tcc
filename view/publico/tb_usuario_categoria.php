<div class="edit-cats">
    <div class="form-group">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-categoria">Adiconar categoria</button>
    </div>
    <ul class="list-inline">
        <?php foreach ($categorias as $c) {  ?>   
            <li class="text-right"> 
                <a href="../../tcc/apagar_categoria/<?= $c->id ?>" onclick="return confirm('Deseja apagar a categoria e todas suas imagens?')"><span class="glyphicon glyphicon-remove"></span></a>
                <?php if(!empty($c->img)){ ?>
                    <div><img width="201" height="115" src="../../tcc/imagens/<?= $c->id_usuario ?>/<?= $c->repositorio ?>/<?= $c->img ?>"></div>
                <?php } ?>
                <div><input class="form-control text-center" type="text" name="categorias" value="<?= $c->categoria ?>" readonly></div>
            </li>
        <?php } ?>
    </ul>
</div>
<div class="row">
    <div class="col-xs-12 text-right">
        <button type="button" class="btn btn-default" onclick="trocarAba(1, 'tb-Imagens', 0);">Próximo</button>
    </div>
</div>
<form enctype="multipart/form-data" method="post" action="../../tcc/enviar_categoria">
    <div id="modal-categoria" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nova Categoria</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Categoria</label>
                        <input type="text" name="categoria" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Imagem</label>
                        <input type="file" name="img" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>