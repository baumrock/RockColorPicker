<?php

namespace ProcessWire;

/**
 * @author Bernhard Baumrock, 03.01.2023
 * @license Licensed under MIT
 * @link https://www.baumrock.com
 */
class RockColorPicker extends WireData implements Module
{
  private $assetsAdded = false;

  /** @var WireData */
  private $colors;

  public static function getModuleInfo()
  {
    return [
      'title' => 'RockColorPicker',
      'version' => '1.2.1',
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
  }

  public function init()
  {
    $this->colors = $this->wire(new WireData());
  }

  /**
   * Hookable method to get colors of this field
   * See readme how to set colors of a field!
   */
  public function ___colors()
  {
    return $this->colors;
  }

  /**
   * Return style string from css setting
   * If provided a color like #ff0000 or rgba(0,0,0) we prepend the
   * background-color property. Otherwise we use it as is.
   * css = #afafaf --> style = background-color:#afafaf;
   * css = 'foo:bar' --> style = 'foo:bar'
   */
  public function getStyle($item): string
  {
    $style = $item->css;
    if (!strpos($style, ":")) $style = "background-color:$style";
    return $style;
  }

  public function loadAssets()
  {
    if ($this->assetsAdded) return;
    $url = $this->wire->config->urls($this);
    $path = $this->wire->config->paths($this);
    $this->wire->config->styles->add(
      $url . "RockColorPicker.css"
        . "?m=" . filemtime($path . "RockColorPicker.css")
    );
    $this->wire->config->scripts->add(
      $url . "RockColorPicker.js"
        . "?m=" . filemtime($path . "RockColorPicker.js")
    );
    $this->assetsAdded = true;
  }

  public function setColors($field, $colors, $force = false)
  {
    // if colors for that field have already been set we exit early
    if ($this->colors->get($field) and !$force) return;

    $arr = $this->wire(new WireArray());
    foreach ($colors as $name => $data) {
      $item = $this->wire(new WireData());
      $item->name = $name;
      $item->css = $data[0];
      $item->style = $this->getStyle($item);
      $item->label = count($data) > 1 ? $data[1] : '';
      $arr->set($name, $item);
    }
    $this->colors->set($field, $arr);
  }
}
