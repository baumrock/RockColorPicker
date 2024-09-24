<div class="rcp-colors">
  <?php

  use function ProcessWire\wire;

  foreach ($f->colors() as $col) {
    $selected = ($value == $col->name) ? "selected" : "";
    if (strpos($col->css, "<") === 0) {
      $html = $col->css;
    } else {
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