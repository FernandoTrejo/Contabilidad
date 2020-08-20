<?php

session_start();
require_once("./src/core/coreutils.php");

//sesiones de ingresos mensuales
if(!isset($_SESSION["empleado"])){
  $_SESSION["empleado"] = [
    "nombre" => "Elisa Abigail",
    "apellidos" => "Rivas Pereira",
    "salario" => 300,
    "nit" => "1234-56"
  ];
}

if(!isset($_SESSION["planilla_empleado"])){
  $_SESSION["planilla_empleado"] = [];
}

if(!isset($_SESSION["indiceMes"])){
  $_SESSION["indiceMes"] = 0;
}

//sesiones de declaracion de la renta
if(!isset($_SESSION["declaracion_renta"])){
  $_SESSION["declaracion_renta"] = [
    "monto_gravado" => "0.00",
    "gastos_medicos" => "0.00",
    "colegiaturas" => "0.00",
    "deducciones_personales" => "0.00",
    "renta_neta" => "0.00",
    "isr_ordinario" => "0.00"
  ];
}


$empleado = $_SESSION["empleado"];
$planilla_empleado = $_SESSION["planilla_empleado"];

$meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

$dictionary = [];

if(isset($_GET["pg"])){
  $pg = $_GET["pg"];
  switch ($pg) {
    case 'ingresos':
      include_once("./src/app/controllers/ingresos.php");
      break;
      
    case 'declaracion':
      include_once("./src/app/controllers/declaracion.php");
      break;
      
    default:
      $dictionary = [
        "_TITLE_" => "Home",
        "_HOME_ACTIVE_" => "active",
        "_INGRESOS_ACTIVE_" => "",
        "_DECLARACION_ACTIVE_" => "",
        "_CONTENT_" => render("./src/static/html/home.html")
      ];
      break;
  }
}else{
  header("Location: ?pg=home");
}

print(render("./src/static/html/index.html",$dictionary));