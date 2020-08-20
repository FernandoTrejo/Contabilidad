<?php

session_start();
/*******Archivos necesarios**********/
require_once('../core/logic/Deducciones/ISR/isr.php');
/*******Verificaciones iniciales**********/
if(!isset($_POST["btnDeclarar"])){
  print("no hay post");
  exit();
}

if(!isset($_SESSION["declaracion_renta"])){
  print("no hay declaracion");
  exit();
}


/*******Asignaciones**********/

$declaracion = $_SESSION["declaracion_renta"];

$monto_gravado = $_POST["montoGravado"];
$gastos_medicos = $_POST["gastosMedicos"];
$colegiaturas = $_POST["colegiaturas"];

$deducciones_personales = $gastos_medicos + $colegiaturas;
$renta_neta = $monto_gravado - $deducciones_personales;
$isr_ordinario = ISR::calcular($renta_neta,3);

$declaracion = [
  "monto_gravado" => $monto_gravado,
  "gastos_medicos" => $gastos_medicos,
  "colegiaturas" => $colegiaturas,
  "deducciones_personales" => $deducciones_personales,
  "renta_neta" => $renta_neta,
  "isr_ordinario" => $isr_ordinario
];

$_SESSION["declaracion_renta"] = $declaracion;

header("Location: ../../?pg=declaracion");




