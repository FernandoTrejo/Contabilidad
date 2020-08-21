<?php

session_start();
/*******Archivos necesarios**********/
require_once("../core/sessions.php");

/*******Verificaciones iniciales**********/
if(!isset($_POST["btnEditTiempo"])){
  print("no hay post");
  exit();
}

if(!isset($_SESSION["tiempo"])){
  print("no hay tiempo");
  exit();
}

/*******Asignaciones**********/

$tiempo = getTiempoSession();

$fecha_inicio = $_POST["fechaInicio"];
$fecha_fin = $_POST["fechafin"];

$tiempo["fecha_inicio"] = $fecha_inicio;
$tiempo["fecha_fin"] = $fecha_inicio;

setTiempoSession($tiempo);


//retornar a la pagina
header("Location: ../../?pg=config");