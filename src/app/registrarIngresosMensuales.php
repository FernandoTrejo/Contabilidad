<?php

session_start();
/*******Archivos necesarios**********/
require_once("../core/sessions.php");
require_once('../core/logic/Deducciones/deducciones.php'); 

/*******Verificaciones iniciales**********/
if(!isset($_POST["btnRegistrar"])){
  print("no hay post");
  exit();
}

if(!isset($_SESSION["empleado"])){
  print("no hay empleado");
  exit();
}

if(!isset($_SESSION["tiempo"])){
  print("no hay tiempo");
  exit();
}

if(!isset($_SESSION["planilla_empleado"])){
  print("no hay planilla_empleado");
  exit();
}

/*******Asignaciones**********/

$empleado = getEmpleadoSession();
$planilla_empleado = getPlanillaSession();
$tiempo = getTiempoSession();

$salario = $_POST["salario"];
$comision = $_POST["comision"];
$mes = $_POST["mes"];

if($salario != $empleado["salario"]){
  $empleado["salario"] = $salario;
}

/*******Calculos**********/

$deducciones = calcular_deducciones($salario + $comision);

$planilla_empleado[$mes] = [
  "salario" => $salario,
  "comision" => $comision,
  "total_ingresos" => ($salario + $comision),
  "isss" => $deducciones["isss"],
  "afp" => $deducciones["afp"],
  "total_deducciones" => ($deducciones["isss"]+$deducciones["afp"]),
  "rem_gravada" => $deducciones["rem_gravada"],
  "isr" => $deducciones["isr"]
];

$tiempo["indice_mes"] += 1;

setEmpleadoSession($empleado);
setPlanillaSession($planilla_empleado);
setTiempoSession($tiempo);


//retornar a la pagina
header("Location: ../../?pg=ingresos");
