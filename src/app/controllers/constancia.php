<?php

// reference the Dompdf namespace
require_once('./src/libs/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

$empleado = getEmpleadoSession();
$nombre_pdf = $empleado["apellidos"] . "-" . $empleado["nombre"] . "-Constancia-Pago.pdf";

$dictionary_page = get_dictionary_page();
$page_rendered = render('./src/static/templates/constancia.html',$dictionary_page);

create_pdf($page_rendered,$nombre_pdf);

header('Location: ?pg=ingresos');



function create_pdf($file,$name){
  // instantiate and use the dompdf class
  $dompdf = new Dompdf();
  
  $dompdf->loadHtml($file);
  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('letter', 'portrait');
  // Render the HTML as PDF
  $dompdf->render();
  // Output the generated PDF to Browser
  $dompdf->stream($name);
}

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
