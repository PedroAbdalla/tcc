<?php
include_once('admin.php');
?>
<div class="responsive-table">
    <table class="table table-hover lista-usuario">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Login</th>
                <th>Permição de acesso</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $l) {  ?>
                <tr onclick="window.location='/tcc/editar_usuario/<?= $l->id ?>'"">
                    <td><?= $l->id ?></td>
                    <td><?= $l->nome ?></td>
                    <td><?= $l->login ?></td>
                    <td><?= $l->permicao ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>