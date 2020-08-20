<?php

class AFP{
  const PORCENTAJE = 0.0725;
  
  public static function calcular($ingresos){
    return round($ingresos * self::PORCENTAJE,2);
  }
}

