<?php
foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
	foreach($marks['marks'] as $mark) {
		$exam_wise_marks[$mark['exam_title']][$marks['subject_title']] = $mark['scored_marks'];
	}
	
  
}
foreach ($exam_wise_marks as $subject_title => $marks) {
	ksort($exam_wise_marks[$subject_title]);
}
$marks_js_values = '';
foreach($exam_wise_marks as $exam_title => $marks) {
	$marks_js_values_temp = '\'' . $exam_title . '\', ';
	$js_subject_title = '\'Subjects\',';
	foreach ($marks as $subject_title => $mark) {
		$js_subject_title .= '\'' . $subject_title . '\', ';
		$marks_js_values_temp .= $mark . ', '; 
	}
	$marks_js_values .= '['.$marks_js_values_temp.'],';
}
$js_subject_title = '['.$js_subject_title.'],';
?>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart_<?php print $variables['id']; ?>);
      function drawChart_<?php print $variables['id']; ?>() {
        var data = google.visualization.arrayToDataTable([
          <?php print $js_subject_title?>
          <?php print $marks_js_values?>
        ]);

        var options = {
          //title: 'Complete Progress Sheet',
		  is3D: true,
		  chartArea:{left:30,top:20,width:"80%"},
		  curveType: 'function',
		  fontName: 'Open Sans',
        };

        var chart = new google.visualization.LineChart(document.getElementById('data_complete_line_wrapper_<?php print $variables['id']; ?>'));
        chart.draw(data, options);
      }
    </script>
<div id="data_complete_line_wrapper_<?php print $variables['id']; ?>" class="data_complete_line_wrapper"></div>