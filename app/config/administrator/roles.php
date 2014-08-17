<?php

 return array (
  'title' => 'Grupos',
  'single' => 'Grupo',
  'model' => 'Algm\\Mss\\Modules\\User\\Models\\Role',
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
    'perms' => array(
        'title' => 'Permisos',
        'type' => 'relationship',
        'name_field' => 'display_name',
    ),
  ),
);