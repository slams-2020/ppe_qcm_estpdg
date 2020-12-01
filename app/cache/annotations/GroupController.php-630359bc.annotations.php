<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'GroupControllerDatas' => 'controllers\\crud\\datas\\GroupControllerDatas',
  'CRUDDatas' => 'Ubiquity\\controllers\\crud\\CRUDDatas',
  'GroupControllerViewer' => 'controllers\\crud\\viewers\\GroupControllerViewer',
  'ModelViewer' => 'Ubiquity\\controllers\\crud\\viewers\\ModelViewer',
  'GroupControllerEvents' => 'controllers\\crud\\events\\GroupControllerEvents',
  'CRUDEvents' => 'Ubiquity\\controllers\\crud\\CRUDEvents',
  'GroupControllerFiles' => 'controllers\\crud\\files\\GroupControllerFiles',
  'CRUDFiles' => 'Ubiquity\\controllers\\crud\\CRUDFiles',
),
  '#traitMethodOverrides' => array (
  'controllers\\GroupController' => 
  array (
  ),
),
  'controllers\\GroupController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Groups","inherited"=>true,"automated"=>true)
  ),
);

