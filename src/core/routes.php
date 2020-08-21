<?php

if(isset($_GET["pg"])){
  $pg = $_GET["pg"];
  switch ($pg) {
    case 'config':
      include_once("./src/app/controllers/config.php");
      break;
      
    case 'ingresos':
      include_once("./src/app/controllers/ingresos.php");
      break;
      
    case 'declaracion':
      include_once("./src/app/controllers/declaracion.php");
      break;
      
    case 'constancia':
      include_once("./src/app/controllers/constancia.php");
      break;
      
    case 'descarga':
      include_once("./src/app/controllers/descarga.php");
      break;
      
    default:
      include_once("./src/app/controllers/default.php");
      break;
  }
}else{
  header("Location: ?pg=home");
}