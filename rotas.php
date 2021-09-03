<?php
$caminho = '';
if(isset($_GET['path']) && !empty($_GET['path'])){
    $caminho = addslashes($_GET['path']);
}

switch ($caminho){
    case 'inicio': require 'views/inicio.php';break;
    case 'agenda': require 'views/agenda.php';break;
    case 'areas': require 'views/areas.php';break;
    case '/areas/novaArea': require 'views/areas/novaArea.php';break;
    case '/areas/alteraArea': require 'views/areas/alteraArea.php';break;
    case '/areas/novaTarefa': require 'views/areas/novaTarefa.php';break;
    case '/areas/alteraTarefa': require 'views/areas/alteraTarefa.php';break;
    default: require 'views/erro404.php';break;
}
