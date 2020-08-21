<?php

function getDictionary(){
  return [
    "_TITLE_" => "Home",
    "_HOME_ACTIVE_" => "active",
    "_INGRESOS_ACTIVE_" => "",
    "_DECLARACION_ACTIVE_" => "",
    "_CONTENT_" => render("./src/static/html/home.html")
  ];
}