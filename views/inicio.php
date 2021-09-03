<?php

use DAO\Area;

$areas = Area::getInstance()->order('descricao')->getAll();
$meses = [];

for($m = 1; $m <= 12; $m++) {
  $meses[] = (object)[
    'id'         => $m,
    'descricao'  => date('F', mktime(0, 0, 0, $m)),
  ];
}

?>
<div class="container" id="agenda">
  <form class="col-sm-12 col-md-6">
    <div class="form-row">
      <div class="form-group col-sm-12">
        <label for="area">Áreas</label>
        <select class="form-control" id="area">
          <option value="0">Selecione</option>
        <?php foreach ($areas as $area) : ?>
          <option value="<?php echo $area->id; ?>"><?php echo $area->descricao; ?></option>
        <?php endforeach; ?>
        </select>
          <div class="d-flex bd-highlight">
              <small id="areaHelp" class="p-1 bd-highlight">Area de negócio da tarefa.</small>
              <div class="p-2 flex-grow-1 bd-highlight"></div>
              <div class="p-2 bd-highlight"><a href="?path=areas" class="btn btn-primary btn-sm">Editar Áreas</a></div>
          </div>

      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-12 col-md-5">
        <label for="mes_inicio">Período</label>
        <select class="form-control" id="mes_inicio">
          <option value="0">Selecione</option>
          <?php foreach ($meses as $mes) : ?>
            <option value="<?php echo $mes->id; ?>"><?php echo $mes->descricao; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group col-sm-12 col-md-2">
          <div>&nbsp;</div>
        <div class="separador-texto-combos">à</div>
      </div>
      <div class="form-group col-sm-12 col-md-5">
        <label for="mes_fim">&nbsp;</label>
        <select class="form-control" id="mes_fim">
          <option value="0">Selecione</option>
          <?php foreach ($meses as $mes) : ?>
            <option value="<?php echo $mes->id; ?>"><?php echo $mes->descricao; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
      <div class="d-flex justify-content-center">
          <button type="button" id="btn_buscar" class="btn btn-primary mr-1" >Buscar</button>
          <a href="?path=/areas/novaTarefa" class="btn btn-primary">Criar Tarefa</a>
      </div>
  </form>
</div>
<script type="text/javascript">

  document.querySelector('#btn_buscar').addEventListener('click', function(ev) {
    var mesInicio = 1;
    var mesFinal = 12;
    var form        = document.querySelector('form');
    var fields      = form.elements;
    var qryString   = '?path=agenda';

    for(let field of fields) {

      if(field.value > 0) {

        switch(field.id) {
          case 'area':
            qryString += '&';
            qryString += field.id;
            qryString += '=';
            qryString += field.value;
            break;

          case 'mes_inicio':
              mesInicio = field.value;
              break;
          case 'mes_fim':
              mesFinal = field.value;
              break;
        }
      }
    }
    if(mesInicio <= mesFinal) {
      qryString += `&meses=${mesInicio}-${mesFinal}`;
      location.href = qryString;
    } else {
        alert("Mes inicial está maior que o mes final!");
    }
      console.log(qryString);
  })
</script>
