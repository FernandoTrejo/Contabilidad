<?php

$totals = sum_array_columns($planilla_empleado);
$totals_arr = $totals["Totales"];
$declaracion = $_SESSION["declaracion_renta"];

$pago_cuenta = (count($totals_arr)>0)?$totals_arr["isr"]:0;

$debe = $declaracion["isr_ordinario"] > $pago_cuenta;

$dictionary_page = [
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
  "_TOTAL_PAGAR_" => ($debe)? $declaracion["isr_ordinario"] - $pago_cuenta:"0.00",
  "_TOTAL_DEVOLVER_" => ($debe)?"0.00":$pago_cuenta - $declaracion["isr_ordinario"]
];

$page_template = render("./src/static/templates/declaracion.html",$dictionary_page);

$dictionary = [
  "_TITLE_" => "Declaracion de la renta",
  "_HOME_ACTIVE_" => "",
  "_INGRESOS_ACTIVE_" => "",
  "_DECLARACION_ACTIVE_" => "active",
  "_CONTENT_" => $page_template
];

