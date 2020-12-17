<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'AnswerService' => 'services\\AnswerService',
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
);

