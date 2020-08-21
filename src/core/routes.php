<?php

if(isset($_GET["pg"])){
  $pg = $_GET["pg"];
  switch ($pg) {
    case 'ingresos':
      include_once("./src/app/controllers/ingresos.php");
      break;
      
    case 'declaracion':
      include_once("./src/app/controllers/declaracion.php");
      break;
      
    case 'constancia':
      include_once("./src/app/controllers/constancia.php");
      break;
      
    default:
      include_once("./src/app/controllers/default.php");
      break;
  }
}else{
  header("Location: ?pg=home");
}