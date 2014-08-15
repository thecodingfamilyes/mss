<?php

 return array (
  'title' => 'Usuarios',
  'single' => 'Usuario',
  'model' => 'Algm\\Mss\\Modules\\User\\Models\\User',
  'form_width' => 700,
  'columns' =>
  array (
    'id' =>
    array (
      'title' => 'Id',
    ),
    'username' =>
    array (
      'title' => 'Username',
    ),
    'display_name' =>
    array (
      'title' => 'DisplayName',
    ),
    'email' =>
    array (
      'title' => 'Email',
    )
  ),
  'edit_fields' =>
  array (
    'username' =>
    array (
      'title' => 'Username',
      'type' => 'text',
    ),
    'display_name' =>
    array (
      'title' => 'DisplayName',
      'type' => 'text',
    ),
    'email' =>
    array (
      'title' => 'Email',
      'type' => 'text',
    ),
    'password' =>
    array (
      'title' => 'Password',
      'type' => 'text',
    ),
    'password_confirmation',
    'terms'
  ),
);