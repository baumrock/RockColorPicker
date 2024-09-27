# Setup

Once you created a field it will give you a code snippet that you can copy & paste into your `init.php` file or into an `init()` method of a module, similar to this one:

```php
wire()->addHookBefore(
  "RockColorPicker::colors",
  function ($event) {
    $picker = $event->object;
    $picker->setColors('your_field_name', [
      'blue' => ['#acefee', 'Light Blue'],
      'yellow' => ['#ffe36c', 'Yellow'],
      'rose' => ['#ffc5df', 'Rose'],
    ]);
  }
);
```

## Custom CSS

Sometimes selecting a single plain color is not enough. For example, what if you want to let the user select from some gradients?

```php
wire()->addHookBefore(
  "RockColorPicker::colors",
  function ($event) {
    $picker = $event->object;
    $picker->setColors('your_field_name', [
      'blue-to-white' => [
        'background: rgb(34,0,255); background: linear-gradient(90deg, rgba(34,0,255,1) 0%, rgba(255,255,255,1) 100%);',
        'Blue to White gradient'
      ],
      'red-to-white' => [
        'background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,255,255,1) 100%);',
        'Red to White gradient'
      ],
    ]);
  }
);
```

<img src=https://i.imgur.com/XiUBhxz.png class=blur>

You can use this technique for anything that can go into a `style` attribute of the html element. For example, you can also use CSS variables:

```php
wire()->addHookBefore(
  "RockColorPicker::colors",
  function ($event) {
    $picker = $event->object;
    $picker->setColors('your_field_name', [
      'my-blue' => [
        'background: var(--my-blue);',
        'My Blue'
      ],
      'my-red' => [
        'background: var(--my-red);',
        'My Red'
      ],
    ]);
  }
);
```

## Custom HTML

With custom HTML you have full control over the element that is selectable. This can be useful if you want, for example, to create a color picker based on the projects primary and secondary colors, which will likely be defined as classes in your CSS.

Here is an example that uses UIkit classes `muted` and `primary`:

```php
wire()->addHookBefore(
  "RockColorPicker::colors",
  function ($event) {
    $picker = $event->object;
    $picker->setColors('your_field_name', [
      'muted' => [
        '<div class="uk-background-muted"></div>',
        'uk-background-muted'
      ],
      'primary' => [
        '<div class="uk-background-primary"></div>',
        'uk-background-primary'
      ],
    ]);
  }
);
```

<img src=https://i.imgur.com/kCsXIdp.png class=blur>

## Multi-Language

Because we are defining the colors in code, we can easily translate the labels of the colors using ProcessWire's multilang support:

```php
wire()->addHookBefore(
  "RockColorPicker::colors",
  function ($event) {
    $picker = $event->object;
    $picker->setColors('your_field_name', [
      'blue' => ['#acefee', __('Light Blue')],
      'yellow' => ['#ffe36c', __('Yellow')],
      'rose' => ['#ffc5df', __('Rose')],
    ]);
  }
);
```

<img src=https://i.imgur.com/ptT9pUR.png class=blur>
