$(document).on("click", ".InputfieldRockColorPicker .rcp-color", function () {
  let $color = $(this).closest(".rcp-color");
  let $colors = $color.closest(".rcp-colors");
  let $li = $color.closest(".Inputfield");
  let $input = $li.find("input");

  // set flag that defines wether we can remove selected state or not
  let remove =
    $color.hasClass("selected") && !$li.hasClass("InputfieldStateRequired");

  // unselect all items
  $.each($colors.find(".rcp-color"), function (i, el) {
    $(el).removeClass("selected");
  });

  // set the new selected item
  if (remove) {
    $input.val("");
  } else {
    $color.addClass("selected");
    $input.val($color.data("color"));
  }

  // trigger change on the inputfield
  $li.addClass("InputfieldStateChanged");
  $input.change(); // for rockpagebuilder
});
$(document).bind("keypress", function (e) {
  // support space+enter to change color
  if (e.which == 32 || e.which == 13) {
    $(":focus").closest(".rcp-color").click();
  }
});
