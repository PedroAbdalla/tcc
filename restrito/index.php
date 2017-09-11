<?php
    session_start();
    $tabela = $_SESSION['tabela'];
    $categoria = $_SESSION['categoria'];
    if(empty($categoria)){
        header("Location:../controller/controlerTabela.php?opcao=1");
    }
    include_once('topo.php');
?>
<section id="demos">
    <div class="row">
        <div class="large-12 columns">
            <div class="owl-carousel owl-theme">
                <?php foreach ($categoria as $c) {  ?>
                    <div class="item item-categoria" onclick="abrirCategoria(this)" categoria="<?= $c->categoria ?>">
                        <h4><?= $c->categoria ?></h4>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<div class="categoria hidden"></div>
<div class="prancha"></div>
<?php
include_once('footer.html');
?>
<script type="text/javascript">
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        nav:true,
        margin:10,
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