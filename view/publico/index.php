<?php
   
    if(empty($categorias)){
        header("Location:../../tcc/index");
    }
?>
<section id="demos">
    <div class="row">
        <div class="large-12 columns">
            <div class="owl-carousel owl-theme">
                <?php foreach ($categorias as $c) {  ?>
                    <div class="item item-categoria" onclick="abrirCategoria(this)" categoria="<?= $c->id ?>" rsp="<?= $c->repositorio ?>">
                        <?php if ($c->img) { ?>
                            <img src="../../tcc/imagens/<?= $c->id_usuario ?>/<?= $c->repositorio ?>/<?= $c->img ?>">
                        <?php } ?>
                        <div><?= $c->categoria ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<div class="categoria hidden"></div>
<div class="prancha"></div>
<script type="text/javascript">
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        nav:true,
        margin:10,
        navText: ['<<','>>'],
        dots: true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            960:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });    
    owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
</script>