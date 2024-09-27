<div style='width:100%;'>
  <p>To setup your field, copy this code to your init.php file or into an init() method of a module:</p>
  <pre class='uk-margin-remove'><code>wire()->addHookBefore(
  "RockColorPicker::colors",
  function ($event) {
    $picker = $event->object;
    $picker->setColors('<?= $field->name ?>', [
      'blue' => ['#acefee', 'Light Blue'],
      'yellow' => ['#ffe36c', 'Yellow'],
      'rose' => ['#ffc5df', 'Rose'],
    ]);
  }
);</code></pre>
  <p class='notes uk-margin-remove-bottom'>Advanced usage: See <a href='https://www.baumrock.com/processwire/module/rockcolorpicker/docs/'>docs</a>.</p>
</div>