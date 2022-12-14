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
      'version' => '0.0.1',
      'summary' => 'Module to choose a color from a palette',
      'icon' => 'paint-brush',
      'requires' => [
        'PHP>=8.1',
      ],
      'installs' => [
        'InputfieldRockColorPicker',
      ],
    ];
  }

  /**
   * Return the fields required to configure an instance of FieldtypeText
   *
   * @param Field $field
   * @return InputfieldWrapper
   *
   */
  public function ___getConfigInputfields(Field $field)
  {
    /** @var InputfieldWrapper $inputfields */
    $inputfields = $this->wire(new InputfieldWrapper());
    return $inputfields;
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
}
