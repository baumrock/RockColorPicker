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
      'version' => '1.0.0',
      'summary' => 'Module to choose a color from a palette',
      'icon' => 'paint-brush',
      'requires' => [
        'RockColorPicker',
      ],
    ];
  }

  public function colors()
  {
    return $this->master()->colors()->get($this->name);
  }

  public function master(): RockColorPicker
  {
    return $this->wire->modules->get('RockColorPicker');
  }

  /**
   * Render the Inputfield
   * @return string
   */
  public function ___render()
  {
    $this->master()->loadAssets();
    $val = $this->value;
    if ($val instanceof WireData) $val = $val->name;
    return $this->wire->files->render(
      __DIR__ . "/InputfieldMarkup.php",
      ['f' => $this, 'value' => $val]
    );
  }
}
