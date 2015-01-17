	Drupal.behaviors.classbellsu = {
		attach: function(context, settings) {
			jQuery('#classbellsu-status-comment-form').ajaxComplete(function(event, xhr, settings) {
			
			var formSubmitInnerHTML = event.target.innerHTML;
			console.log(event.target.innerHTML);
			var postId = jQuery(formSubmitInnerHTML).find('input[name="post_id"]').val();
			if('' != postId) {
				
				alert('asdasd');
				
				jQuery.ajax({
					url: Drupal.settings.basePath + 'views/ajax',
					type: 'get',
					data: {
						view_name: 'classbell_status_updates',
						view_display_id: 'block_1', //your display id
						view_args: postId,
					},
					//dataType: 'json',
					success: function (response) {
						console.log(response);
						if (response[1] !== undefined) {
							var viewHtml = response[1].data;
							jQuery('#post-comments-' + postId).html(viewHtml);
							//Drupal.attachBehaviors();
						}
					}
				});
				
				
			}
			});
		}
	}