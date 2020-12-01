<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'QcmControllerDatas' => 'controllers\\crud\\datas\\QcmControllerDatas',
  'CRUDDatas' => 'Ubiquity\\controllers\\crud\\CRUDDatas',
  'QcmControllerViewer' => 'controllers\\crud\\viewers\\QcmControllerViewer',
  'ModelViewer' => 'Ubiquity\\controllers\\crud\\viewers\\ModelViewer',
  'QcmControllerEvents' => 'controllers\\crud\\events\\QcmControllerEvents',
  'CRUDEvents' => 'Ubiquity\\controllers\\crud\\CRUDEvents',
  'QcmControllerFiles' => 'controllers\\crud\\files\\QcmControllerFiles',
  'CRUDFiles' => 'Ubiquity\\controllers\\crud\\CRUDFiles',
),
  '#traitMethodOverrides' => array (
  'controllers\\QcmController' => 
  array (
  ),
),
  'controllers\\QcmController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Qcms","inherited"=>true,"automated"=>true)
  ),
);

