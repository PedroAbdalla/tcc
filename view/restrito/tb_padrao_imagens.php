<div class='tab-tb-imagens'>
	<div class="edit-cats">
		<div class="form-group">
	        <label>Categoria</label>
	        <select name="categoria" class="form-control" onchange="listarImagens(this)">
	        		<option></option>
	        </select>
	    </div>
	    <div class="imagens-categoria"></div>
	    <div class="text-right">
	    	<button type="button" class="btn btn-default bt-add-imagem"  data-toggle="modal" data-target="#modal-imagem"><span class="glyphicon glyphicon-plus"></span></button>
	    </div>
	</div>
</div>
<div class="row">
	<div class="col-xs-6">
		<button type="button" class="btn btn-default" onclick="trocarAba(0, 'tb-Categorias', 1)">Voltar</button>
	</div>
</div>
<form enctype="multipart/form-data" method="post" action="enviar_imagem_padrao/1">
	<input type="hidden" class="id-categoria-imagem" name="id_categoria" value="">
    <div id="modal-imagem" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nova Imagem</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Fonética</label>
                        <input type="text" name="fonetica" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Imagem</label>
                        <input type="file" name="img" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>