<?php

use DAO\Area;
//inicializando variáveis
$area = new Area;
$message = null;
$updated = null;
$result = null;
$id = null;
$alert = null;

//condição para fazer a alteração
if(array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    if ($_POST) {
        $updated = $area->alterarArea($id, $_POST['descricao']);
        if ($updated == 'area-exist') {
            $message = 'Área ja existente';
            $alert = 'danger';
        } elseif($updated == 'success'){
            $message = 'Área alterada com sucesso!';
            $alert = 'success';
        }
    }
    $result = $area->filtrarPorId($id);
}
?>
<div class="container">
    <div class="jumbotron">
        <h1>Editar Área</h1>
    </div>
    <?php if($message): ?>
        <div class="alert alert-<?=$alert?>" role="alert">
            <p class="m-0"><?= $message?></p>
        </div>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control" value="<?= $result->descricao ?>">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="?path=areas" class="btn btn-secondary">Voltar</a>
    </form>
</div>

