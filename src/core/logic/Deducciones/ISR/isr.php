<?php

require_once('../core/logic/Deducciones/ISR/TablasRetencion.php'); 

class ISR{
  
  public static function calcular($rem_gravada,$clave_tabla){
    switch ($clave_tabla) {
      case 1:
        return ISR::calcular_retencion($rem_gravada,tabla_retencion_mensual);
        break;
        
      case 2:
        return ISR::calcular_retencion($rem_gravada,tabla_recalculo_junio);
        break;
      
      case 3:
        return ISR::calcular_retencion($rem_gravada,tabla_recalculo_diciembre);
        break;
    }
    
  }
  
  private static function calcular_retencion($rem_gravada,$tabla_retencion){
    $retencion = 0;
    
    foreach ($tabla_retencion as $tramo) {
      if($tramo['fin'] == "null"){
        $retencion = ($rem_gravada - $tramo['sobre']) * $tramo['porcentaje'] + $tramo['cuota'];
      }else{
        if($rem_gravada>=$tramo['inicio'] && $rem_gravada<=$tramo['fin']){
          $retencion = ($rem_gravada - $tramo['sobre']) * $tramo['porcentaje'] + $tramo['cuota'];
          break;
        }
      }
    }
    
    return round($retencion,2);
  }
}






