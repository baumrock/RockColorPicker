# Output

You can access a RockColorPicker field like any other ProcessWire field: `$page->your_field_name`.

Like with any other field, this call can return two types of values: Formatted and Unformatted:

<img src=https://i.imgur.com/R0Ixd2I.png class=blur>

## Formatted value

The formatted value is a string that is equal to the array key of your defined color:

<img src=https://i.imgur.com/3OpIuzc.png class=blur>

## Unformatted value

The unformatted value is a WireData object that holds all defined and calculated values for the picked color:

<img src=https://i.imgur.com/yLSnD74.png class=blur>

As you can see, the "style" property is not useful in this case. This is only useful for regular color elements having a hex code or such.

Naming of these props could probably be improved. Feel free to open an issue or even better: Submit a PR 😉

## Empty value

If no color is picked, the field will return FALSE for the formatted value and an empty WireData object for the unformatted value:

<img src=https://i.imgur.com/MO8tPR1.png class=blur>
