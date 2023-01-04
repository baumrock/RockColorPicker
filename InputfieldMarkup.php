<div class="rcp-colors">
  <?php
  foreach ($f->colors() as $col) {
    $selected = ($value == $col->name) ? "selected" : "";

    // prepare html and style tag
    // If provided a color like #ff0000 or rgba(0,0,0) we prepend the
    // background-color property. Otherwise we use it as is.
    $style = $col->css;
    if (strpos($style, "<") === 0) {
      $html = $style;
    } else {
      if (!strpos($style, ":")) $style = "background-color:$style";
      $html = "<div style='$style'></div>";
    }

    // output wrapper + html
    echo "<div
      class='rcp-color $selected'
      data-color='{$col->name}'
      title='{$col->label}' uk-tooltip
      >$html</div>";
  }
  ?>
  <input type="text" id="<?= $f->id ?>" class="uk-input" name="<?= $f->name ?>" value="<?= $value ?>">
</div>