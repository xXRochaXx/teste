<?php

use DAO\Area;
use DAO\Gravidade;
use DAO\Tendencia;
use DAO\Urgencia;

include __DIR__ . '/../melhoriasNegocios.php';

$gravidadesAll = Gravidade::getInstance()->order('id')->getAll();
$urgenciasAll = Urgencia::getInstance()->order('id')->getAll();
$tendenciasAll = Tendencia::getInstance()->order('id')->getAll();
$urgencias = Urgencia::getInstance()->order('id', 'desc')->getAll(3);

$tarefa = new \DAO\Melhoria;
$dataAtual = date('Y-m-d');
$areasDesc = Area::getInstance()->order('descricao')->getAll();
$data = new DateTime();
$message = null;


//se vier um POST pegar informações e completar a condição
if($_POST){
    $demandaLegal  = !isset($_POST['demanda_legal']) ? $demandaLegal = "false" : $demandaLegal = $_POST['demanda_legal'];
    $descricaoTarefa = $_POST['texto_tarefa'];
    $prazoAcordado = $_POST['prazo_acordado'] ? $_POST['prazo_acordado'] : null ;
    $prazoLegal = $_POST['prazo_legal'] ? $_POST['prazo_legal'] : null;
    $gravidade = $_POST['gravidade'] ? $_POST['gravidade'] : null;
    $urgencia = $_POST['urgencia'] ? $_POST['urgencia'] : null;
    $tendencia = $_POST['tendencia'] ? $_POST['tendencia'] : null;
    $tarefaTitulo = $_POST['titulo_tarefa'];
    $id = $_GET['id'];

    //enviando informações para o banco de dados

    $tarefa->alteraTarefa($id, $descricaoTarefa, $prazoAcordado,
        $prazoLegal, $demandaLegal, $gravidade,
        $urgencia, $tendencia, $tarefaTitulo
    );

}

$dados = $tarefa->filtrarPorId($_GET['id']);

?>
    <div class="container" id="agenda">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <!-- Modal -->
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form method="post" class="mt-2">
                                <div class="form-group">
                                    <label for="titulo_tarefa">Título da Tarefa</label>
                                    <input type="text" class="form-control mb-2" name="titulo_tarefa" required
                                           placeholder="Adicione um titulo para a tarefa" value="<?= $dados->tarefa; ?>">
                                    <label for="texto_tarefa">Descrição</label>
                                    <textarea required class="form-control mb-2" name="texto_tarefa" rows="8"><?= $dados->descricao; ?></textarea>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col">
                                        <label for="prazo_legal">Prazo legal</label>
                                        <input type="date" class="form-control mb-2" name="prazo_legal" max='2021-12-31' value="<?= $dados->prazo_legal; ?>"
                                               min='<?=$dataAtual?>' >
                                    </div>
                                    <div class="col">
                                        <label for="prazo_acordado">Prazo acordado</label>
                                        <input type="date" class="form-control" id="prazo_acordado" name="prazo_acordado" value="<?= $dados->prazo_acordado; ?>"
                                               min="<?=$dataAtual?>" max='2021-12-31'>
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col">
                                        <label for="gravidade">Gravidade</label>
                                        <select class="form-control" id="gravidade" name="gravidade">
                                            <option value='0'>Não informado</option>
                                            <?php foreach ($gravidadesAll as $gravidade) : ?>
                                                <option <?php echo $gravidade->id == $dados->gravidade ? 'selected' : '' ?> value="<?php echo $gravidade->id ?>"><?php echo $gravidade->descricao ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="urgencia">Urgência</label>
                                        <select class="form-control" id="urgencia" name="urgencia" required>
                                            <option value="0">Não Informado</option>
                                            <?php foreach ($urgenciasAll as $urgencia) : ?>
                                                <option <?php echo $urgencia->id == $dados->urgencia ? 'selected' : '' ?> value="<?php echo $urgencia->id ?>"><?php echo $urgencia->descricao ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col">
                                        <label for="tendencia">Tendência</label>
                                        <select class="form-control" id="tendencia" name="tendencia">
                                            <option value='0'>Não informado</option>
                                            <?php foreach ($tendenciasAll as $tendencia) : ?>
                                                <option <?php echo $tendencia->id == $dados->gravidade ? 'selected' : '' ?> value="<?php echo $tendencia->id ?>"><?php echo $tendencia->descricao ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="demanda_legal" value="true">
                                            <label class="form-check-label" for="demanda_legal">Demanda Legal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mr-2">Atualizar</button>
                                    <a href="?path=agenda" class="btn btn-info">voltar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
