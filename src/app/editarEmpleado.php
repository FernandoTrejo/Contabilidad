<?php

session_start();
/*******Archivos necesarios**********/
require_once("../core/sessions.php");

/*******Verificaciones iniciales**********/
if(!isset($_POST["btnEditEmpleado"])){
  print("no hay post");
  exit();
}

if(!isset($_SESSION["empleado"])){
  print("no hay empleado");
  exit();
}

/*******Asignaciones**********/

$empleado = getEmpleadoSession();

$nombre = $_POST["nombreEmpleado"];
$apellidos =$_POST["apellidosEmpleado"];
$nit = $_POST["nitEmpleado"];
$salario = $_POST["salarioEmpleado"];

$empleado["nombre"] = $nombre;
$empleado["apellidos"] = $apellidos;
$empleado["nit"] = $nit;
$empleado["salario"] = $salario;

setEmpleadoSession($empleado);


//retornar a la pagina
header("Location: ../../?pg=config");