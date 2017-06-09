<?php
    session_start();
    $tabela = $_SESSION['tabela'];
    $categoria = $_SESSION['categoria'];
    include_once('topo.php');
?>
<section id="demos">
    <div class="row">
        <div class="large-12 columns">
            <div class="owl-carousel owl-theme">
                <?php foreach ($categoria as $c) {  ?>
                    <div class="item item-categoria" onclick="openCategoria(this)" categoria="<?= $c->categoria ?>">
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
    function openCategoria(c) {
        console.log(c);
        valorCategoria = jQuery(c).attr('categoria');
        $.ajax({
            url: '../ajax/ajaxPrancha.php',
            type: 'POST',
            dataType: 'html',
            data: {valorCategoria: valorCategoria},
        })
        .done(function(retorno) {
            console.log("success");
            jQuery('.prancha').html(retorno).css('opacity', '1');
            
            // jQuery('<img/>', {
            //     class: 'loading',
            //     src: "../imagens/loading.gif"
            // }).appendTo('.prancha');


        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log('ok');          
            jQuery('.figura').on('click', function () {
                window.speechSynthesis.cancel();
                var msg = new SpeechSynthesisUtterance(jQuery(this).attr('data-text'));
                window.speechSynthesis.speak(msg);
            });

        });
    };


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