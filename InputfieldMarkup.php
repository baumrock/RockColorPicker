<div class="rcp-colors">
  <?php

  use function ProcessWire\wire;

  foreach ($f->colors() as $col) {
    // get selected state
    $selected = ($value == $col->name) ? "selected" : "";

    // create html from the colors css property
    // if it starts with < it is html
    // otherwise we use the css property and put it in the style attribute
    $html = $col->css;
    if (!str_starts_with($col->css, "<")) {
      $html = "<div style='{$col->style}'></div>";
    }

    // output wrapper + html
    echo "<div
      class='rcp-color $selected'
      data-color='{$col->name}'
      title='{$col->label}' uk-tooltip
      >$html</div>";
  }
  if (!$f->colors()->count()) {
    echo wire()->files->render(__DIR__ . '/InputfieldMarkupSetup.php', [
      'field' => $f,
    ]);
  }
  ?>
  <input type="text" id="<?= $f->id ?>" class="uk-input" name="<?= $f->name ?>" value="<?= $value ?>">
</div>