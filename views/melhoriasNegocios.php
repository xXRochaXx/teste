<?php
use DAO\Area;
use DAO\Urgencia;
use DAO\Gravidade;
use DAO\Tendencia;
use DAO\Melhoria;

function melhoriaNegocio()
{

    $melhoriasAgenda = Melhoria::getInstance()
        ->order('prazo_legal')
        ->order('prazo_acordado')
        ->order('gut', 'desc')
        ->order('id')
        ->filtrarPorUrgencia([0, 1, 2, 3, 4 ], ['*', '(coalesce(gravidade, 1) * coalesce(urgencia, 1) * coalesce(tendencia, 1)) as gut']);

    $melhorias = [];
    foreach ($melhoriasAgenda as $melhoriaAgenda) {

        $prazoLegal = '';
        if (!empty($melhoriaAgenda->prazo_legal)) {
            list($anoPrazoLegal, $mesPrazoLegal, $diaPrazoLegal) = explode('-', $melhoriaAgenda->prazo_legal);
            $prazoLegal = date('d/m/Y', mktime(0, 0, 0, $mesPrazoLegal, $diaPrazoLegal, $anoPrazoLegal));
        }

        $prazoAcordado = '';
        if (!empty($melhoriaAgenda->prazo_acordado)) {
            list($anoPrazoAcordado, $mesPrazoAcordado, $diaPrazoAcordado) = explode('-', $melhoriaAgenda->prazo_acordado);
            $prazoAcordado = date('d/m/Y', mktime(0, 0, 0, $mesPrazoAcordado, $diaPrazoAcordado, $anoPrazoAcordado));
        }

        $mesEntregaMelhoria = preg_replace('/\d{4}-(\d{2})-\d{2}/', "$1", $melhoriaAgenda->prazo_legal);

        if (empty($mesEntregaMelhoria)) {
            $mesEntregaMelhoria = preg_replace('/\d{4}-(\d{2})-\d{2}/', "$1", $melhoriaAgenda->prazo_acordado);
        }
        $mesEntregaMelhoria = (int)$mesEntregaMelhoria;

        $melhoriaAgenda->title = preg_replace('/([^ ]+ +[^ ]+ +[^ ]+ +).*/', "$1", $melhoriaAgenda->tarefa);
        $melhoriaAgenda->entrega_em = $mesEntregaMelhoria;
        $melhoriaAgenda->prazoLegal = $prazoLegal;
        $melhoriaAgenda->prazoAcordado = $prazoAcordado;

        $melhorias[$melhoriaAgenda->area][$mesEntregaMelhoria][$melhoriaAgenda->urgencia][] = $melhoriaAgenda;
    }
    return $melhorias;
}

?>
