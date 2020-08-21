<?php

$page = render("./src/static/templates/declaracion.html",get_dictionary_page());

function get_dictionary_page(){
  $planilla_empleado = getPlanillaSession();
  $declaracion = getDeclaracionSession();
  $empleado = getEmpleadoSession();
  
  $totals = sum_array_columns($planilla_empleado);
  $totals = $totals["Totales"];
  
  $pago_cuenta = (count($totals) > 0) ? $totals["isr"] : 0;
  $debe = $declaracion["isr_ordinario"] > $pago_cuenta;
  
  return [
    "_NOMBRE_" => $empleado["apellidos"] . ", " . $empleado["nombre"],
    "_NIT_" => $empleado["nit"],
    "_RENTAS_GRAVADAS_" => $declaracion["monto_gravado"],
    "_TOTAL_RENTAS_GRAVADAS_" => $declaracion["monto_gravado"],
    "_GASTOS_MEDICOS_" => $declaracion["gastos_medicos"],
    "_COLEGIATURAS_" => $declaracion["colegiaturas"],
    "_DEDUCCIONES_PERSONALES_" => $declaracion["deducciones_personales"],
    "_RENTA_NETA_" => $declaracion["renta_neta"],
    "_ISR_ORDINARIA_" => $declaracion["isr_ordinario"],
    "_PAGO_CUENTA_" => $pago_cuenta,
    "_TOTAL_PAGAR_" => ($debe) ? round($declaracion["isr_ordinario"] - $pago_cuenta,2) : "0.00",
    "_TOTAL_DEVOLVER_" => ($debe) ? "0.00" : round($pago_cuenta - $declaracion["isr_ordinario"],2)
  ];
}

function getDictionary(){
  global $page;
  return  [
    "_TITLE_" => "Declaracion de la renta",
    "_HOME_ACTIVE_" => "",
    "_INGRESOS_ACTIVE_" => "",
    "_DECLARACION_ACTIVE_" => "active",
    "_CONTENT_" => $page
  ];
}
