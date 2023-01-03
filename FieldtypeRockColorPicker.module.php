<?php

namespace ProcessWire;

/**
 * @author Bernhard Baumrock, 14.12.2022
 * @license Licensed under MIT
 * @link https://www.baumrock.com
 */
class FieldtypeRockColorPicker extends FieldtypeText
{

  public static function getModuleInfo()
  {
    return [
      'title' => 'RockColorPicker',
      'version' => '1.0.0',
      'summary' => 'Module to choose a color from a palette',
      'icon' => 'paint-brush',
      'requires' => [
        'RockColorPicker',
      ],
    ];
  }

  /**
   * Format value for output
   *
   * @param Page $page
   * @param Field $field
   * @param string $value
   * @return string
   *
   */
  public function ___formatValue(Page $page, Field $field, $value)
  {
    if (!$value instanceof WireData) return false;
    return $value->name;
  }

  public function ___wakeupValue(Page $page, Field $field, $value)
  {
    $colors = $this->master()->colors()->get($field->name);
    if ($colors instanceof WireArray) return $colors->get($value);
    return new WireData();
  }

  /**
   * Return the associated Inputfield
   *
   * @param Page $page
   * @param Field $field
   * @return Inputfield
   *
   */
  public function getInputfield(Page $page, Field $field)
  {
    return $this->wire->modules->get('InputfieldRockColorPicker');
  }

  public function master(): RockColorPicker
  {
    return $this->wire->modules->get('RockColorPicker');
  }
}
