
(function ($) {
  Drupal.behaviors.SchoolMessages = {
    attach: function (context) {
      $(".message-recipent-type").change(function() {
    	  $('.schoolmessage-message-class, .schoolmessage-message-parent').hide();
    	  if($(this + ':selected').val() == 0){
    		  $('.schoolmessage-message-parent').show(); 
    	  }
    	  if($(this + ':selected').val() == 1){
    		  $('.schoolmessage-message-class').show(); 
    	  }
      })
    }
  }

})(jQuery);