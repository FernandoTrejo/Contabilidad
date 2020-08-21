<?php

require_once('./src/libs/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

$empleado = getEmpleadoSession();
$nombre_pdf = $empleado["apellidos"] . "-" . $empleado["nombre"] . "-Constancia-Pago.pdf";

create_pdf(getConstanciaPdfSession(),$nombre_pdf);

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