<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\crud',
  '#uses' => array (
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'Pagination' => 'Ajax\\semantic\\widgets\\datatable\\Pagination',
  'HtmlContentOnly' => 'Ajax\\common\\html\\HtmlContentOnly',
  'OrmUtils' => 'Ubiquity\\orm\\OrmUtils',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'ModelViewer' => 'Ubiquity\\controllers\\crud\\viewers\\ModelViewer',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => 'int', 'name' => 'activePage'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => 'string', 'name' => 'model'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\php\\ubiquity\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\views\\View', 'name' => 'view')
  ),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait::getModelInstance' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'ids'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'boolean', 'name' => 'transform'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'boolean', 'name' => 'included'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'object')
  ),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait::_deleteMultiple' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'data'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'action'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'target'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'callable|string', 'name' => 'condition'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'params')
  ),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait::getAdminData' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'CRUDDatas')
  ),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait::getModelViewer' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'ModelViewer')
  ),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait::getFiles' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'CRUDFiles')
  ),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait::_getFiles' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'CRUDFiles')
  ),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait::getEvents' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'CRUDEvents')
  ),
  'Ubiquity\\controllers\\crud\\CRUDControllerUtilitiesTrait::getInstanceToString' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'object', 'name' => 'instance'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'string')
  ),
);

