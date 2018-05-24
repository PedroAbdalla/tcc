<ul class="list-inline">
    <?php foreach ($lista as $img) {  ?>   
        <li class="text-right" id="imagem-<?= $img->id ?>"> 
            <a onclick="return confirm('Deseja apagar a imagem?'), apagarImagem(<?= $img->id ?>)"><span class="glyphicon glyphicon-remove"></span></a>
                <div><img width="201" height="115" src="imagens/<?= $_SESSION['usuarioLogado']['id'] ?>/<?= $img->id_categoria ?>/<?= $img->imagem ?>"></div>
            <div><input class="form-control text-center" type="text" name="categorias" value="<?= $img->fonetica ?>" readonly></div>
        </li>
    <?php } ?>
</ul>