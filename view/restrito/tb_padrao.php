<?php
include_once('admin.php');
?>
<div id="tab-tb-padrao">
	<ul class="nav nav-tabs" role="tablist">
		<li onclick="editaTabela('tb-Tabela');" role="presentation" class="active"><a href="#tb-Tabela" aria-controls="tb-Tabela" role="tab" data-toggle="tab">Tabela</a></li>
		<li onclick="editaTabela('tb-Categorias');" role="presentation"><a href="#tb-Categorias" aria-controls="tb-Categorias" role="tab" data-toggle="tab">Categorias</a></li>
		<li onclick="editaTabela('tb-Imagens');" role="presentation"><a href="#tb-Imagens" aria-controls="tb-Imagens" role="tab" data-toggle="tab">Imagens</a></li>
	</ul>
	<div class="tab-content">
		<div role="tb-Tabela" class="tab-pane active" id="tb-Tabela"></div>
		<div role="tb-Categorias" class="tab-pane" id="tb-Categorias"></div>
		<div role="tb-Imagens" class="tab-pane" id="tb-Imagens"></div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
	    editaTabela(0);
	});
</script>