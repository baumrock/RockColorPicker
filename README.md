# RockColorPicker

Super simple color picker for ProcessWire:

<img src=https://i.imgur.com/VYv3Mbz.png height=150>

On non-required fields the selected color can be unselected by clicking the color again. The module also supports selecting colors via keyboard input (tab to focus color and then space/enter to select/unselect).

## Setup

The colors of your field must be defined in `/site/init.php`:

```php
$wire->addHookBefore(
  "RockColorPicker::colors",
  function (HookEvent $event) {
    // set colors of field "site_bgcolor"
    // labels are translatable
    $event->object->setColors('site_bgcolor', [
      'blue' => ['#acefee', __('blue')],
      'yellow' => ['#ffe36c', __('yellow')],
      'rose' => ['#ffc5df', __('rose')],
      'green' => ['#b5ffb2', __('green')],
      'violet' => ['#d5bfff', __('violet')],
    ]);

    // set colors of field "another_field"
    $event->object->setColors('another_field', [
      'red' => ['#ff0000', 'This is red'],
      'green' => ['#00ff00', 'This is green'],
      'blue' => ['#0000ff', 'This is blue'],
    ]);
  }
);
```

## Accessing the field values

Formatted value:

<img src=https://i.imgur.com/sOBc18h.png width=280>

Unformatted value:

<img src=https://i.imgur.com/StnDbWm.png width=400>

## Why is there no GUI for setup?

Building a GUI for this field would be extremely hard because we need a connection between the color name, css-code and the label, but the label would need to be multi-language. Having a regular multilang textarea with language tabs would mean that we'd have to repeat all the colors for every language and also repeat all the css-codes. That's less than ideal so I chose to go with a code-only fieldtype so that one can setup colors once and then translate labels if need be.
