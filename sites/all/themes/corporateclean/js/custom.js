(function($) {
	$(document).ready(function(){
	
		
	
		$('.status-form-wrapper').hide();
		$('.status-form-wrapper:first').show();
		$('.status-update-form .tabs li:first').addClass('active');
		$('.status-update-form .tabs li').css('cursor', 'pointer');
		
		$('.status-update-form .tabs li').click(function(){
			
			$('.status-update-form .tabs li').removeClass('active');
			$(this).addClass('active');
			
			$('.status-form-wrapper').hide();
			$('#'+$(this).data('warpper')).show();
			
		});
		
		//$("#edit-privacy-setting").minimalect();
		//$("input[type=file]").nicefileinput();
		
		// Comment Load More Togggele
		$('#comment-small span.load-more').click(function(){
			//$('#comment-small').hide();
			//$('#comment-full').show();
		});
		
		// Limit Text lenght for status update
		$('form#classbellsu-status-update-form textarea#edit-status-text').keyup(function(){
			var textLength = $(this).val().length;
			if(textLength > 999) {
				$(this).val($(this).val().substring(0, 999));
				alert('1000 Maximum character Limit Reached');
			}
		});
		
		// Limit Text lenght for comments in status update
		$('form#classbellsu-status-comment-form textarea#edit-comment-text').keyup(function(){
			var textLength = $(this).val().length;
			if(textLength > 499) {
				$(this).val($(this).val().substring(0, 499));
				alert('500 Maximum character Limit Reached');
			}
		});
		
		
		
		// Open User sub menu
		$('#user-menu .user').mouseover(function(){
			$('#user-submenu').show();
		}).mouseout(function(){
			$('#user-submenu').hide();
		});
		
		$('#user-menu .login').mouseover(function(){
			$('#login-submenu').show();
		}).mouseout(function(){
			$('#login-submenu').hide();
		});
		
		
		
		$('.view-compare-schools td.text .content').each(function(i){
			$(this).mouseover(function(){
				$(this).next().show();
			}).mouseout(function(){
				$(this).next().hide();
			})
		});
		
		// SA Homework filter hide-show
		$('.homework-view-filter').hide();
		$('#homework-filter-toggle').click(function(){
			$('.homework-view-filter').fadeIn('slow');
			$(this).fadeOut();
		});
		
		// RWD Search
		$('#rwd-search .rwd-search-txt a').click(function(){
			$('#rwd-search  .rwd-search-form').show();
			$(this).hide();
		});
		
		// RWD-Menu Hide-Show
		$('.rwd-menu-hide-show.show').click(function(){
			 $('#header').removeClass('rwd-header-hide');
		});
		$('.rwd-menu-hide-show.hide').click(function(){
			 $('#header').addeClass('rwd-header-hide');
		});
		$(window).scroll(function() {
			//alert($(this).scrollTop());
			if($(this).scrollTop() > 100) {
				$('#header').addClass('rwd-header-hide');
			}
			else{
				$('#header').removeClass('rwd-header-hide');
			}
		});
		
		// Forget Password Form events haandler
		$('#show-parents-forgetpassword').click(function(){
			$('.parents-forgetpassword').show();
			$('.form-submit.forgetpassword').hide();
		});
		$('#show-schooladmin-forgetpassword').click(function(){
			$('.schooladmin-forgetpassword').show();
			$('.form-submit.forgetpassword').hide();
		});
		
		// Auth account Form events haandler
		$('#show-schooladmin-auth-acccount').click(function(){
			$('.schooladmin-auth-account').show();
			$('.form-submit.forgetpassword').hide();
		});
		$('#show-parents-auth-acccount').click(function(){
			$('.parents-auth-account').show();
			$('.form-submit.forgetpassword').hide();
		});
	});
	 $('.tooltipSmall').live('click', function(e) {	
		 	
			$('.toolTipBoxSmall').hide("fast");	
			$('.dnArrowSmall').hide("fast");	
			
			var mousePost = $(e.target),
				offset = mousePost.position(),
				offsetTop = offset.top,					
				$div = $(this).next(),
				$divH = $div.height(),
				$divW = $div.width();
			
			if (offsetTop > $divH) {				 
					offsetTop = offsetTop - $divH + 0 + 'px';
					$div.removeClass("dnArrowSmall");
				} else {
					offsetTop = offsetTop + 25 + 'px';
					$div.addClass("dnArrowSmall");					
				}
								
			$div.css({
				'left': offset.left - ($divW / 2) + 9 + 'px',
				'top': offsetTop
				 
			});								
						
						
					$div.show();
;		
						
			e.preventDefault();	
			 
					 
		});
	
	
})(jQuery);
