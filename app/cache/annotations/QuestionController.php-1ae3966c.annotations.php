<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'QuestionControllerDatas' => 'controllers\\crud\\datas\\QuestionControllerDatas',
  'CRUDDatas' => 'Ubiquity\\controllers\\crud\\CRUDDatas',
  'QuestionControllerViewer' => 'controllers\\crud\\viewers\\QuestionControllerViewer',
  'ModelViewer' => 'Ubiquity\\controllers\\crud\\viewers\\ModelViewer',
  'QuestionControllerEvents' => 'controllers\\crud\\events\\QuestionControllerEvents',
  'CRUDEvents' => 'Ubiquity\\controllers\\crud\\CRUDEvents',
  'QuestionControllerFiles' => 'controllers\\crud\\files\\QuestionControllerFiles',
  'CRUDFiles' => 'Ubiquity\\controllers\\crud\\CRUDFiles',
),
  '#traitMethodOverrides' => array (
  'controllers\\QuestionController' => 
  array (
  ),
),
  'controllers\\QuestionController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Questions","inherited"=>true,"automated"=>true)
  ),
);

