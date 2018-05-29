<option></option>
<?php foreach ($lista as $c) {  ?>   
   <option  data-repository="<?= $c->repositorio ?>" value="<?= $c->id ?>"><?= $c->categoria ?></option>
<?php } ?>