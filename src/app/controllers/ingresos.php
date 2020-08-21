<?php

$dictionary_page = get_dictionary_page();
      
$page = get_page($dictionary_page);
      
function get_page($dictionary_page){
  $planilla_empleado = getPlanillaSession();
  
  $totals = sum_array_columns($planilla_empleado);
  $data_totals = create_data_table($totals);
  $data_planilla = create_data_table($planilla_empleado);
  
  $data_table = $data_planilla . $data_totals;
  
  $page_template = render("./src/static/html/ingresosMensuales.html",$dictionary_page);
  $planilla_template = render("./src/static/templates/planilla.html", ["_DATA_" => $data_table]);
  
  return $page_template . $planilla_template;
}      
      
function get_dictionary_page(){
  $empleado = getEmpleadoSession();
  $tiempo = getTiempoSession();
  return  [
    "_NOMBRE_" => $empleado["nombre"] . " " . $empleado["apellidos"],
    "_NIT_" => $empleado["nit"],
    "_MES_" => MESES[$tiempo["indice_mes"]],
    "_SALARIO_" => $empleado["salario"]
  ];
}
      
function getDictionary(){
  global $page;
  return [
    "_TITLE_" => "Ingresos Mensuales",
    "_CONFIG_ACTIVE_" => "",
    "_HOME_ACTIVE_" => "",
    "_INGRESOS_ACTIVE_" => "active",
    "_DECLARACION_ACTIVE_" => "",
    "_CONTENT_" => $page
  ];
}


