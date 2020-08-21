<?php

$dictionary_page = get_dictionary_page();
$page = render('./src/static/templates/constancia.html',$dictionary_page);

setConstanciaPdfSession($page);

function get_dictionary_page(){
  $planilla_empleado = getPlanillaSession();
  $totals = sum_array_columns($planilla_empleado);
  $totals = $totals["Totales"];
  
  $empleado = getEmpleadoSession();
  $tiempo = getTiempoSession();
  
  return [
    "_NOMBRE_" => $empleado["apellidos"] . ", " . $empleado["nombre"],
    "_NIT_" => $empleado["nit"],
    "_FECHA_INICIO_" => $tiempo["fecha_inicio"],
    "_FECHA_FIN_" => $tiempo["fecha_fin"],
    "_ING_GRAVADOS_" => $totals["total_ingresos"],
    "_AFP_" => $totals["afp"],
    "_ISSS_" => $totals["isss"],
    "_MONTO_GRAVADO_" => $totals["rem_gravada"],
    "_ISR_" => $totals["isr"]
  ];
}

function getDictionary(){
  global $page;
  return [
    "_TITLE_" => "Constancia",
    "_HOME_ACTIVE_" => "active",
    "_CONFIG_ACTIVE_" => "active",
    "_INGRESOS_ACTIVE_" => "active",
    "_DECLARACION_ACTIVE_" => "active",
    "_CONTENT_" => $page . render("./src/static/html/constancia.html")
  ];
}
