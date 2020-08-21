<?php

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

if(!isset($_SESSION["tiempo"])){
  $_SESSION["tiempo"] = [
    "indice_mes" => 0,
    "fecha_inicio" => "01/01/2019",
    "fecha_fin" => "31/12/2019"
  ];
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

if(!isset($_SESSION["constancia_pdf"])){
  $_SESSION["constancia_pdf"] = "";
}

function getEmpleadoSession(){
  return $_SESSION["empleado"];
}

function getPlanillaSession(){
  return $_SESSION["planilla_empleado"];
}

function getTiempoSession(){
  return $_SESSION["tiempo"];
}

function getDeclaracionSession(){
  return $_SESSION["declaracion_renta"];
}

function getConstanciaPdfSession(){
  return $_SESSION["constancia_pdf"];
}

//setters

function setEmpleadoSession($empleado){
  $_SESSION["empleado"] = $empleado;
}

function setPlanillaSession($planilla){
  $_SESSION["planilla_empleado"] = $planilla;
}

function setTiempoSession($tiempo){
  $_SESSION["tiempo"] = $tiempo;
}

function setDeclaracionSession($declaracion){
  $_SESSION["declaracion_renta"] = $declaracion;
}

function setConstanciaPdfSession($constancia){
  $_SESSION["constancia_pdf"] = $constancia;
}