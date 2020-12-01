<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\crud',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'ControllerBase' => 'Ubiquity\\controllers\\ControllerBase',
  'HasModelViewerInterface' => 'Ubiquity\\controllers\\crud\\interfaces\\HasModelViewerInterface',
  'MessagesTrait' => 'Ubiquity\\controllers\\semantic\\MessagesTrait',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'UResponse' => 'Ubiquity\\utils\\http\\UResponse',
  'ResponseFormatter' => 'Ubiquity\\controllers\\rest\\ResponseFormatter',
  'OrmUtils' => 'Ubiquity\\orm\\OrmUtils',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'HtmlContentOnly' => 'Ajax\\common\\html\\HtmlContentOnly',
  'InsertJqueryTrait' => 'Ubiquity\\controllers\\semantic\\InsertJqueryTrait',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\crud\\CRUDController' => 
  array (
  ),
),
  'Ubiquity\\controllers\\crud\\CRUDController::edit' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'modal'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'ids')
  ),
  'Ubiquity\\controllers\\crud\\CRUDController::newModel' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'modal')
  ),
  'Ubiquity\\controllers\\crud\\CRUDController::display' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'modal'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'ids')
  ),
  'Ubiquity\\controllers\\crud\\CRUDController::delete' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'ids')
  ),
  'Ubiquity\\controllers\\crud\\CRUDController::updateModel' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'object')
  ),
  'Ubiquity\\controllers\\crud\\CRUDController::showDetail' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'ids')
  ),
);

