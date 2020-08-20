<?php

$dictionary_page = [
  "_NOMBRE_" => $empleado["nombre"] . " " . $empleado["apellidos"],
  "_NIT_" => $empleado["nit"],
  "_MES_" => $meses[$_SESSION["indiceMes"]],
  "_SALARIO_" => $empleado["salario"]
];
      
$totals = sum_array_columns($planilla_empleado);
$data_totals = create_data_table($totals);
$data_planilla = create_data_table($planilla_empleado);

$data_table = $data_planilla . $data_totals;

$page_template = render("./src/static/html/ingresosMensuales.html",$dictionary_page);
$planilla_template = render("./src/static/templates/planilla.html", ["_DATA_" => $data_table]);

$page = $page_template . $planilla_template;
      
$dictionary = [
  "_TITLE_" => "Ingresos Mensuales",
  "_HOME_ACTIVE_" => "",
  "_INGRESOS_ACTIVE_" => "active",
  "_DECLARACION_ACTIVE_" => "",
  "_CONTENT_" => $page
];


