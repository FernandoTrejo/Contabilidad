<?php

// reference the Dompdf namespace

require_once('../../src/libs/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

create_pdf($page,$nombre_pdf);

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