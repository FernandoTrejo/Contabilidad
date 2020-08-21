<?php


$page = render("./src/static/html/config.html",get_dictionary_page());
      
function get_dictionary_page(){
  $empleado = getEmpleadoSession();
  $tiempo = getTiempoSession();
  return  [
    "_NOMBRE_" => $empleado["nombre"], 
    "_APELLIDOS_" => $empleado["apellidos"],
    "_NIT_" => $empleado["nit"],
    "_SALARIO_" => $empleado["salario"],
    "_FECHA_INICIO_" => $tiempo["fecha_inicio"],
    "_FECHA_FIN_" => $tiempo["fecha_fin"]
  ];
}
      
function getDictionary(){
  global $page;
  return [
    "_TITLE_" => "Ingresos Mensuales",
    "_CONFIG_ACTIVE_" => "active",
    "_HOME_ACTIVE_" => "",
    "_INGRESOS_ACTIVE_" => "",
    "_DECLARACION_ACTIVE_" => "",
    "_CONTENT_" => $page
  ];
}


