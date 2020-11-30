<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'UserControllerDatas' => 'controllers\\crud\\datas\\UserControllerDatas',
  'CRUDDatas' => 'Ubiquity\\controllers\\crud\\CRUDDatas',
  'UserControllerViewer' => 'controllers\\crud\\viewers\\UserControllerViewer',
  'ModelViewer' => 'Ubiquity\\controllers\\crud\\viewers\\ModelViewer',
  'UserControllerEvents' => 'controllers\\crud\\events\\UserControllerEvents',
  'CRUDEvents' => 'Ubiquity\\controllers\\crud\\CRUDEvents',
  'UserControllerFiles' => 'controllers\\crud\\files\\UserControllerFiles',
  'CRUDFiles' => 'Ubiquity\\controllers\\crud\\CRUDFiles',
),
  '#traitMethodOverrides' => array (
  'controllers\\UserController' => 
  array (
  ),
),
  'controllers\\UserController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Users","inherited"=>true,"automated"=>true)
  ),
);

