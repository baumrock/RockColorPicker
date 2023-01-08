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
      'version' => '1.0.1',
      'summary' => 'Module to choose a color from a palette',
      'icon' => 'paint-brush',
      'requires' => [
        'RockColorPicker',
      ],
    ];
  }

  public function colors()
  {
    $name = $this->name;
    if ($i = strpos($name, "_repeater")) $name = substr($name, 0, $i);
    $colors = $this->master()->colors()->get($name);
    if (!$colors instanceof WireArray) return new WireArray();
    return $colors;
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
    $val = $this->value;
    if ($val instanceof WireData) $val = $val->name;
    return $this->wire->files->render(
      __DIR__ . "/InputfieldMarkup.php",
      ['f' => $this, 'value' => $val ?: false]
    );
  }

  public function renderReady(Inputfield $parent = null, $renderValueMode = false)
  {
    $this->master()->loadAssets();
  }
}
