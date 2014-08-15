<?php

 return array (
  'title' => 'Permisos',
  'single' => 'Permiso',
  'model' => 'Algm\\Mss\\Modules\\User\\Models\\Permission',
  'form_width' => 700,
  'columns' =>
  array (
    'id' =>
    array (
      'title' => 'Id',
    ),
    'name' =>
    array (
      'title' => 'Name',
    ),
    'display_name' =>
    array (
      'title' => 'DisplayName',
    ),
    'created_at' =>
    array (
      'title' => 'CreatedAt',
    ),
    'updated_at' =>
    array (
      'title' => 'UpdatedAt',
    ),
  ),
  'edit_fields' =>
  array (
    'name' =>
    array (
      'title' => 'Name',
      'type' => 'text',
    ),
    'display_name' =>
    array (
      'title' => 'DisplayName',
      'type' => 'text',
    ),
  ),
);