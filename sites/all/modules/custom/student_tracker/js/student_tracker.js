(function($) {
	$(document).ready(function(){
		
		
		
		$('#exam_wise_progress_bar_id').change(function(){
			$('.data_exam_wise_bar_wrapper').hide('slow');
			$('#data_exam_wise_bar_wrapper_'+$(this).val()).show('fast');
		});
		
		// Colors Legends
		$('.legends span.color').each(function(i){
			$(this).css('background-color', '#'+$(this).data('color'));
		});
		
		
		
		$('#exam_wise_progress_pie_id').change(function(){
			$('.data_exam_wise_pie_wrapper').hide('slow');
			$('#data_exam_wise_pie_wrapper_'+$(this).val()).show('fast');
		});
		
		// Colors Legends
		$('.legends span.color').each(function(i){
			$(this).css('background-color', '#'+$(this).data('color'));
		});
		
		
		
		$('#subject_wise_line_id').change(function(){
			$('.subject_wise_wrapper').hide('slow');
			$('#subject_wise_wrapper_'+$(this).val()).show('fast');
		});
		
		
		setTimeout(setGraphHideShow, 1000);
		
	});


function setGraphHideShow(){
	
	/* Exam Wise Progress Sheet */
	$('.data_exam_wise_bar_wrapper').hide();
	$('.data_exam_wise_bar_wrapper:first').show();
	
	/* Exam Wise Pie Sheet */ 
	$('.data_exam_wise_pie_wrapper').hide();
	$('.data_exam_wise_pie_wrapper:first').show();
	
	/* Subject Wise Line Sheet */ 
	$('.subject_wise_wrapper').hide();
	$('.subject_wise_wrapper:first').show();
}
})(jQuery);