<?php

class ISSS{
  const PORCENTAJE = 0.03;
  const LIM_ISSS_DEDUCCION = 1000;
  const ISSS_MAXIMO = 30;
  
  public static function calcular($ingresos){
     return ($ingresos > self::LIM_ISSS_DEDUCCION) ? self::ISSS_MAXIMO : round($ingresos * self::PORCENTAJE,2);
  }
}
  
  
  
  