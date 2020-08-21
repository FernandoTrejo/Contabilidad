<?php

class ISSS{
  const PORCENTAJE = 0.03;
  const LIM_ISSS_DEDUCCION = 1000;
  const ISSS_MAXIMO = 30;
  
  public static function calcular($ingresos){
    $isss = 0;
    if($ingresos > self::LIM_ISSS_DEDUCCION){
      $isss = self::ISSS_MAXIMO;
    }else{
      $isss = $ingresos * self::PORCENTAJE;
    }
     
     return round($isss,2);
  }
}
  
  
  
  