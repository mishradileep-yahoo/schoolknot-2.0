<?php
$style_fail = 'stroke-color: #CC0000; stroke-width: 4; fill-color: #FF0000';
$style_pass = 'stroke-color: #2EAAB2; stroke-width: 4; fill-color: #2E79B2';
foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
	foreach($marks['marks'] as $exam_id => $mark) {
		if($exam_id != $variables['data']['exam']) continue;
		$exam_wise_marks[$mark['exam_title']][$marks['subject_title']]['scored_marks'] = $mark['scored_marks'];
		$exam_wise_marks[$mark['exam_title']][$marks['subject_title']]['passing_marks'] = $mark['passing_marks'];
		$exam_wise_marks[$mark['exam_title']][$marks['subject_title']]['max_marks'] = $mark['max_marks'];
		if($exam_wise_marks[$mark['exam_title']][$marks['subject_title']]['scored_marks'] > 
			$exam_wise_marks[$mark['exam_title']][$marks['subject_title']]['passing_marks']) {
				$exam_wise_marks[$mark['exam_title']][$marks['subject_title']]['style'] = $style_pass;
			}
			else {
				$exam_wise_marks[$mark['exam_title']][$marks['subject_title']]['style'] = $style_fail;
			}
	}
}
//pr($variables['data']['marks_subject_wise']);

foreach ($exam_wise_marks as $subject_title => $marks) {
	ksort($exam_wise_marks[$subject_title]);
}
//pr($variables['data']['exam']);

$marks_js_values = '';
foreach($exam_wise_marks as $exam_title => $marks) {
	$marks_js_values_temp = '';
	$js_title = '\'Exam\',' . '\'' .$exam_title. '\'';
	foreach ($marks as $subject_title => $mark) {
		$marks_js_values_temp .= '[\''.$subject_title . '\',' . '' .$mark['scored_marks'] . ', '. '\''. $mark['style'].'\'],'; 
	}
	$marks_js_values .= $marks_js_values_temp;
}
$js_title = '['.$js_title.', { role: \'style\' }],';
//pr($exam_wise_marks);
//pr($js_title);
//pr($marks_js_values);
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChartPie_<?php print $variables['data']['exam']; ?>);
      function drawChartPie_<?php print $variables['data']['exam']; ?>() {
        var data = google.visualization.arrayToDataTable([
<?php print $js_title; ?>
<?php print $marks_js_values; ?>
        ]);

        var options = {
          //title: 'My Daily Activities',
          is3D: true,
          chartArea:{left:0,top:20,width:"80%"},
  		  curveType: 'function',
  		  fontName: 'Open Sans',
        };

        var chart = new google.visualization.PieChart(document.getElementById('data_exam_wise_pie_wrapper_<?php print $variables['data']['exam']; ?>'));
        chart.draw(data, options);
      }
    </script>


<div id="data_exam_wise_pie_wrapper_<?php print $variables['data']['exam']; ?>" class="data_exam_wise_pie_wrapper"></div>