//body
function fecharMsg(){
    jQuery('.div-msg').remove();
}
// topo
function verificaCompatibilidade(){
    if(window.speechSynthesis == undefined){
        jQuery.ajax({
            url: '../../tcc/ajax/ajaxCompativel.html',
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
        url: '../../tcc/ajax/ajaxPrancha.php',
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

function trocarAba(i, aba, id_usuario){
    jQuery('#tab-tb-padrao li:eq('+i+') a').tab('show');
    listarCategorias(id_usuario);
}
function listarCategorias(id_usuario) {
    let caminho;
    if (id_usuario == 1) {
        caminho = '../../tcc/listar_categorias_padrao/1';
    } else {
        caminho =  '../../tcc/listar_categorias';
    }
    console.log(id_usuario);
    $.ajax({
        url: caminho,
        type: 'POST',
        dataType: 'HTML',
    })
    .done(function(retorno) {
        jQuery('select').html(retorno);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
}
function listarImagens(e) {
    let id_categoria = jQuery(e).find('option:checked').val();
    let repositorio = jQuery(e).find('option:checked').attr('data-repository');
    jQuery('.id-categoria-imagem').val(id_categoria)
    $.ajax({
        url: '../../tcc/listar_imagens/'+id_categoria,
        type: 'POST',
        dataType: 'HTML',
    })
    .done(function(retorno) {
        jQuery('.tab-tb-imagens .imagens-categoria').html(retorno);
        jQuery('.bt-add-imagem').css('display', 'initial');
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
}
function apagarImagem(id) {
     $.ajax({
        url: '../../tcc/apagar_imagem/'+id,
        type: 'POST',
        dataType: 'HTML',
    })
    .done(function(retorno) {
        $('#imagem-'+id).remove();
    })
}
function listarPalavras(id_usuario) {
    let palavras;
    jQuery.ajax({
        url: `../../tcc/listar_palavras/${id_usuario}`,
        type: 'get',
        dataType: 'json',
        success: function(retorno) {
            palavras = retorno;
        }
    });

    function split(val) {
        return val.split(/,\s*/);
    }

    function extractLast(term) {
        return split(term).pop();
    }

    $("#inpt-msg")
        // don't navigate away from the field on tab when selecting an item
    .on("keydown", function(event) {
        if (event.keyCode === $.ui.keyCode.TAB &&
            $(this).autocomplete("instance").menu.active) {
            event.preventDefault();
        }
    })
    .autocomplete({
        minLength: 0,
        source: function(request, response) {
            // delegate back to autocomplete, but extract the last term
            response($.ui.autocomplete.filter(
                palavras, extractLast(request.term)));
        },
        focus: function() {
            // prevent value iinpt-msgserted on focus
            return false;
        },
        select: function(event, ui) {
            var terms = split(this.value);
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push(ui.item.value);
            // add placeholder to get the comma-and-space at the end
            terms.push("");
            this.value = terms.join(", ");
            return false;
        }
    });
}
// editar usuario