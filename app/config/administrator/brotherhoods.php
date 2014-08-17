<?php

 return array (
  'title' => 'Hermandades',
  'single' => 'Hermandad',
  'model' => 'Algm\\Mss\\Modules\\Brotherhood\\Models\\Brotherhood',
  'form_width' => 700,
  'columns' =>
  array (
    'id' =>
    array (
      'title' => 'Id',
    ),
    'user_id' =>
    array (
      'title' => 'UserId',
    ),
    'name' =>
    array (
      'title' => 'Name',
    ),
    'shortname' =>
    array (
      'title' => 'Shortname',
    ),
    'badge' =>
    array (
      'title' => 'Badge',
    ),
    'day' =>
    array (
      'title' => 'Day',
    ),
    'vinculation_id' =>
    array (
      'title' => 'VinculationId',
    ),
    'created_at' =>
    array (
      'title' => 'CreatedAt',
    ),
    'updated_at' =>
    array (
      'title' => 'UpdatedAt',
    )
  ),
  'edit_fields' =>
  array (
    'user' => array(
        'title' => 'Usuario',
        'type' => 'relationship',
        'name_field' => 'display_name',
    ),
    'name' =>
    array (
      'title' => 'Name',
      'type' => 'text',
    ),
    'shortname' =>
    array (
      'title' => 'Shortname',
      'type' => 'text',
    ),
    'badge' =>
    array (
      'title' => 'Badge',
      'type' => 'text',
    ),
    'day' =>
    array (
      'title' => 'Day',
      'type' => 'text',
    )
  ),
);