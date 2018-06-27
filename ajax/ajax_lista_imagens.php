<ul class="list-inline">
    <?php foreach ($lista as $img) {  ?>   
        <li class="text-center" id="imagem-<?= $img->id ?>"> 
            <a onclick="return confirm('Deseja apagar a imagem?'), apagarImagem(<?= $img->id ?>, <?= $id_usuario_categoria ?>)"><span class="glyphicon glyphicon-remove"></span></a>
                <div><img width="100" height="100" src="../../tcc/imagens/<?= $id_usuario_categoria ?>/<?= $repositorio ?>/<?= $img->imagem ?>"></div>
            <div><input class="form-control text-center" type="text" name="categorias" value="<?= $img->fonetica ?>" readonly></div>
        </li>
    <?php } ?>
</ul>