<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'USession' => 'Ubiquity\\utils\\http\\USession',
  'Group' => 'models\\Group',
  'GroupService' => 'services\\GroupService',
),
  '#traitMethodOverrides' => array (
  'controllers\\GroupController' => 
  array (
  ),
),
  'controllers\\GroupController' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\php\\ubiquity\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Groups","inherited"=>true,"automated"=>true)
  ),
);

