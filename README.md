# RockColorPicker

Super simple color (and custom HTML) picker for ProcessWire:

<img src=https://i.imgur.com/701Jj9C.png height=150>

Please see the docs at https://www.baumrock.com/en/processwire/modules/rockcolorpicker/docs/

## Why is there no GUI for setup?

Building a GUI for this field would be extremely hard because we need a connection between the color name, css-code and the label.

The label might also be multi-language, and having a regular multilang textarea with language tabs would mean that we'd have to repeat all the colors for every language and also repeat all the css-codes. That's less than ideal so I chose to go with a code-only fieldtype so that one can setup colors once and then translate labels if need be.

A hook-based setup also has the benefit that you can create dynamic color-selection fields, for example having a primary and secondary color based on the client's settings or such.
