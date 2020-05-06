/**
 * For Giving Page Functions File
 *
 * Processes campus selection from dropdown.
 */

jQuery(function ($) {
  "use strict";
  var url;
  $("#setup-gift-dropdown").on("change", function () {
    url = $(this).val();
  });
  $("#go-to-campus").click(function () {
    window.location = url;
  });
  return false;
});
