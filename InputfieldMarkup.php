<div class="rcp-colors">
  <?php
  foreach ($f->colors() as $col) {
    $selected = ($value == $col->name) ? "selected" : "";
    echo "<svg class='rcp-color $selected' data-col='{$col->name}'>
      <rect style='fill:{$col->css}' title='{$col->tooltip}' uk-tooltip />
    </svg>";
  }
  ?>
  <input type="text" id="<?= $f->id ?>" class="uk-input" name="<?= $f->name ?>" value="<?= $f->value ?>">
</div>