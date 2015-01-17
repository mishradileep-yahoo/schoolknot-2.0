(function ($) {
  Drupal.behaviors.AccountMerge = {
    attach: function (context) {
      $("#account_merge_account_change").change(function() {
    	  window.location.href = Drupal.settings.basePath + 'student-tracker/progress-sheet/' + $(this).val();
      })
    }
  }

})(jQuery);