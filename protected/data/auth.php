<?php
return array (
  'hradmin' => 
  array (
    'type' => 2,
    'description' => 'Can do hr admin functions',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'head',
      1 => 'user',
    ),
    'assignments' => 
    array (
      'vic' => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'head' => 
  array (
    'type' => 2,
    'description' => 'Can do hr admin functions',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'user',
    ),
    'assignments' => 
    array (
      'vic' => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'superaccountant' => 
  array (
    'type' => 2,
    'description' => 'Can do all accounting functions',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'accountant',
      1 => 'user',
    ),
  ),
  'accountant' => 
  array (
    'type' => 2,
    'description' => 'Can do all some accounting functions',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'user',
    ),
    'assignments' => 
    array (
      'acc' => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'user' => 
  array (
    'type' => 2,
    'description' => 'Can do basic functions',
    'bizRule' => '',
    'data' => '',
    'assignments' => 
    array (
      'conceng' => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
);
