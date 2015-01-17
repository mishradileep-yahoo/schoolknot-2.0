(function ($) {
  Drupal.behaviors.SchoolRating = {
    attach: function (context) {
    	$('input[type=radio]').addclass('star');
    }
  };
})(jQuery);