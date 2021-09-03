<?php

use DAO\Area;
//inicializando variáveis
$message = null;
$adicionarArea = null;
$alert = null;

//condição para fazer a inclusão da nova área
if($_POST) {
    $adicionarArea = Area::getInstance()->inserirArea($_POST['descricao']);
    if ($adicionarArea == 'area-exist') {
        $message = 'Área ja existente';
        $alert = 'danger';
    } elseif ($adicionarArea == 'success'){
        $message = 'Área criada com sucesso!';
        $alert = 'success';
    }
}
?>
<div class="container">
    <div class="jumbotron">
        <h1>Criar Área</h1>
    </div>
    <?php if($message): ?>
        <div class="alert alert-<?=$alert?>" role="alert">
            <p class="m-0"><?= $message?></p>
        </div>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="descricao">Descrição</label>
                <input type="text" name="descricao" class="form-control">
        </div>
        <button class="btn btn-primary">Salvar</button>
        <a href="?path=areas" class="btn btn-primary">Voltar</a>

    </form>
</div>
