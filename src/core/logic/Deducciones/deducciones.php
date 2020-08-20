<?php

require_once('../core/logic/Deducciones/afp.php');
require_once('../core/logic/Deducciones/isss.php');
require_once('../core/logic/Deducciones/ISR/isr.php');

function calcular_deducciones($ingresos){
  //retornar un objeto con las deducciones corresoondientes y la renta
  $deduccion_isss = ISSS::calcular($ingresos);
  $deduccion_afp = AFP::calcular($ingresos);
  
  $deducciones_totales = round($deduccion_afp + $deduccion_isss,2);
  
  $rem_gravada = round($ingresos - $deducciones_totales, 2);
  
  $deduccion_isr = ISR::calcular($rem_gravada,1);
  
  return [
    'isss' => $deduccion_isss,
    'afp' => $deduccion_afp,
    'rem_gravada' => $rem_gravada,
    'isr' => $deduccion_isr
  ]; 
}


