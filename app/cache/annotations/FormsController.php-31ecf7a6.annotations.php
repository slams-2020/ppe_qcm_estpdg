<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'User' => 'models\\User',
  'UIService' => 'services\\UIService',
),
  '#traitMethodOverrides' => array (
  'controllers\\FormsController' => 
  array (
  ),
),
  'controllers\\FormsController' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\php\\ubiquity\\JsUtils', 'name' => 'jquery')
  ),
);

