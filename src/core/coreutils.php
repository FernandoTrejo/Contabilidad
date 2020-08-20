<?php

function render($file,$dictionary = []){
  $template = file_get_contents($file);
  if(count($dictionary) > 0){
    foreach  ($dictionary  as  $clave=>$valor)  { $template  =  str_replace('{'.$clave.'}',  $valor,  $template); 
      
    }
  }
  return $template;
}

function create_data_table($data){
  $result = "";
 
 foreach ($data as $key=>$row) {
    $result .= "<tr><td>" . $key . "</td>";
    foreach ($row as $value) {
      $result .= "<td>" . $value . "</td>";
    }
    $result .= "</tr>";
  }

  //print_r($result);exit();
  return $result;
}

function sum_array_columns($array){
  $new_array = [];
  if(count($array)>0){
  foreach ($array as $key=>$value){
    foreach ($value as $k=>$v) {
      $new_array[$k] += $v; 
    }
  }
  }
  
  $res = ["Totales" => $new_array]; 
  return $res;
}

