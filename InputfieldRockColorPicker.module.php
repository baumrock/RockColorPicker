<?php

namespace ProcessWire;

/**
 * @author Bernhard Baumrock, 14.12.2022
 * @license Licensed under MIT
 * @link https://www.baumrock.com
 */
class InputfieldRockColorPicker extends Inputfield
{

  public static function getModuleInfo()
  {
    return [
      'title' => 'RockColorPicker Inputfield',
      'version' => '0.0.1',
      'summary' => 'Module to choose a color from a palette',
      'icon' => 'paint-brush',
      'requires' => [
        'FieldtypeRockColorPicker',
      ],
    ];
  }

  /**
   * Construct
   *
   */
  public function __construct()
  {
    parent::__construct();
    $this->setAttribute('colors', '');
  }

  /**
   * Get Inputfields needed to configure this Fieldtype
   *
   * @param Field $field
   * @return InputfieldWrapper
   */
  public function ___getConfigInputfields()
  {
    /** @var InputfieldWrapper $inputfields */
    $inputfields = $this->wire(new InputfieldWrapper());

    $inputfields->add([
      'type' => 'textarea',
      'name' => 'colors',
      'value' => $this->colors,
    ]);

    return $inputfields;
  }

  /**
   * Process the Inputfield's input
   * @return $this
   */
  public function ___processInput($input)
  {
    $this->message('process input!');
    return false;
  }

  /**
   * Render the Inputfield
   * @return string
   */
  public function ___render()
  {
    return $this->wire->files->render(__DIR__ . "/Inputfield.php", [
      'f' => $this,
    ]);
  }
}
