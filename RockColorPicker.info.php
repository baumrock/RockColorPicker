<?php

namespace ProcessWire;

$info = [
  'title' => 'RockColorPicker',
  'version' => json_decode(file_get_contents(__DIR__ . "/package.json"))->version,
  'summary' => 'Main RockColorPicker Module',
  'autoload' => false,
  'singular' => true, // sic
  'icon' => 'paint-brush',
  'requires' => [
    'PHP>=8.1',
  ],
  'installs' => [
    'InputfieldRockColorPicker',
    'FieldtypeRockColorPicker',
  ],
];
