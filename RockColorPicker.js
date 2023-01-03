$(document).on("click", ".InputfieldRockColorPicker svg", function () {
  // using UIkit JS because jquery fails with addclass on svg
  // see https://stackoverflow.com/a/10257755/6370411
  let util = UIkit.util;
  let el = util.$(this);
  let parent = el.parentNode;
  let $li = $(this).closest(".Inputfield");
  let input = util.$("input", parent);
  let remove = util.hasClass(el, "selected");
  util.each(util.$$("svg", parent), function (el) {
    util.removeClass(el, "selected");
  });
  $(this).closest(".Inputfield").addClass("InputfieldStateChanged");
  if (remove && !$li.hasClass("InputfieldStateRequired")) {
    util.attr(input, "value", "");
  } else {
    util.addClass(el, "selected");
    util.attr(input, "value", util.data(el, "col"));
  }
});
$(document).bind("keypress", function (e) {
  // support space+enter to change color
  if (e.which == 32 || e.which == 13) {
    $(":focus").closest("svg.rcp-color").click();
  }
});
