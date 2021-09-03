<?php

use DAO\Area;
$areas = null;
$pdo = new Area;
$delete = null;
$message = null;
$adicionarArea = null;
$alert = null;

if (!empty($_GET['id'])) {
    $delete = $pdo->excluirArea($_GET['id']);
    if ($delete == 'tarefa-existe') {
        $message = 'Esta área contém tarefas!';
        $alert = 'danger';
    }elseif($delete == 'success'){
        $message = 'Exlcuido com sucesso!';
        $alert = 'success';
    }
}


$areas = $pdo->getAll();
?>
<div class="container">
    <div class="jumbotron">
        <h1>Áreas</h1>
    </div>
    <?php if($message): ?>
        <div class="alert alert-<?=$alert?>" role="alert">
            <p class="m-0"><?= $message?></p>
        </div>
    <?php endif; ?>
    <a href="?path=/areas/novaArea" class="btn btn-dark mb-2">Adicionar Área</a>
    <ul class="list-group">
        <?php foreach($areas as $area): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?=$area->descricao?>
            <span>
                <a href="?path=areas&id=<?= $area->id ?>" class="text-light btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</a>
                <a href="?path=/areas/alteraArea&id=<?= $area->id ?>" class="btn btn-info" >Alterar</a>
            </span>
        </li>
        <?php endforeach;?>
    </ul>
</div>


