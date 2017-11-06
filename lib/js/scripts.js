//body
function fecharMsg(){
    jQuery('.div-msg').remove();
}
// topo
function verificaCompatibilidade(){
    if(window.speechSynthesis == undefined){
        jQuery.ajax({
            url: '../tcc/ajax/ajaxCompativel.html',
            type: 'POST',
            dataType: 'html',
        })
        .done(function(retorno) {
            console.log("success");
            jQuery('body').before(retorno);
            jQuery('.collapse').collapse();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
}
// index
function abrirCategoria(c) {
    console.log(c);
    valorCategoria = jQuery(c).attr('categoria');
    $.ajax({
        url: '../tcc/ajax/ajaxPrancha.php',
        type: 'POST',
        dataType: 'html',
        data: {valorCategoria: valorCategoria},
    })
    .done(function(retorno) {
        console.log("success");
        jQuery('.prancha').html(retorno).css('opacity', '1');
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
// talk
function repeatMsg(msg) {
    var fala = new SpeechSynthesisUtterance(msg);
    window.speechSynthesis.speak(fala);
}



function sendMsg(){
    var msg = jQuery('#inpt-msg').val();
    if (msg == '')
        return;

    var currentdate = new Date(); 
    var datetime = currentdate.getDate() + "/"
    + (currentdate.getMonth()+1)  + "/" 
    + currentdate.getFullYear() + " - "
    + currentdate.getHours() + ":"
    + currentdate.getMinutes();

    jQuery('<div/>', {
        class: 'quadro-hst',
        text: datetime + ': ' + msg + ' '
    }).appendTo('.quadro-txt');

    jQuery('<span/>', {
        class: 'glyphicon glyphicon-volume-up'
    }).on('click', function() {
        repeatMsg(msg);
    }).appendTo('.quadro-hst:last');

    jQuery('.quadro-msg input').val('');

    repeatMsg(msg);
}

function falarMsg(){
    jQuery('#inpt-msg').keypress(function(event) {
        if (event.which == 13) {
            sendMsg();
        }
    });
}
// restrito tb_padrao
function editaTabela(a){
    var aba = a;
    
    if(aba == "tb-Tabela") var urlTb  =  "../tcc/ajax/ajax_tb_padrao.php";
    else if(aba == "tb-Categorias") var urlTb  =  "../tcc/ajax/ajax_tb_padrao_Categoria.php";
    else if(aba == "tb-Imagens") var urlTb  =  "../tcc/ajax/ajax_tb_padrao_Imagens.php";
    else {
        var urlTb  =  "../tcc/ajax/ajax_tb_padrao.php";
        var aba  =  "tb-Tabela";
    }

    jQuery.ajax({
        url: urlTb,
        type: 'POST',
        dataType: 'HTML',
        data: {id_tb: '0'},
    })
    .done(function(retorno) {
        jQuery('#' + aba).html(retorno);
    })
}
function trocarAba(i, aba){
    jQuery('#tab-tb-padrao li:eq('+i+') a').tab('show');
    editaTabela(aba);
}
// editar usuario