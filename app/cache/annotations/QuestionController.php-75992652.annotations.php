<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'Question' => 'models\\Question',
  'Typeq' => 'models\\Typeq',
  'UIService' => 'services\\UIService',
),
  '#traitMethodOverrides' => array (
  'controllers\\QuestionController' => 
  array (
  ),
),
  'controllers\\QuestionController::index' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', '_default')
  ),
);

