<?php
foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
  $array_temp = array();
  foreach($marks['marks'] as $mark) {
    $array_temp[] = array('mark' => $mark['scored_marks'], 'exam' => $mark['exam_title']);
  }
  $subject_marks_array[$subject_id]['marks'] = $array_temp;
  $subject_marks_array[$subject_id]['subject'] = $marks['subject_title'];

}
$graph_data = $subject_marks_array[$variables['data']['subject']];
$js_title = '[\'Subject\',\'' .  $graph_data['subject'] . '\'],';
$marks_js_values = '';
foreach ($graph_data['marks'] as $key => $graphData) {
	$marks_js_values .= '[\'' . $graphData['exam'] . '\', ' . $graphData['mark'] . '],';
}
?>


<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChartSubjectLine_<?php print $variables['data']['subject']; ?>);
	function drawChartSubjectLine_<?php print $variables['data']['subject']; ?>() {
		var data = google.visualization.arrayToDataTable([
			<?php print $js_title; ?>
			<?php print $marks_js_values; ?>
		]);
		
		var options = {
			is3D: true,
			chartArea:{left:0,top:0,width:"80%"},
			//curveType: 'function',
			fontName: 'Open Sans',
			hAxis: {gridlines: {color: '#FF0000'}},
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('subject_wise_wrapper_<?php print $variables['data']['subject']; ?>'));
		chart.draw(data, options);
	}
</script>
<div id="subject_wise_wrapper_<?php print $variables['data']['subject']; ?>" class="subject_wise_wrapper"></div>