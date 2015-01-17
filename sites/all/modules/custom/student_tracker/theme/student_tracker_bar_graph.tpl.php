<?php
// Add ChartJS js Library
$chartJs_path = drupal_get_path('module', 'student_tracker') . '/js/Chart.js';
drupal_add_js($chartJs_path);
$labels = $student_marks = array();
foreach($variables['data']['subject_marks_data'] as $subject_id => $subject_data) {
  $labels[] = '"' . substr($subject_data['subject_title'], 0, 3) . '"';
  $student_marks[] = '"' . $subject_data['data'][$variables['data']['student_user']->uid] . '"';
  $class_average[] = '"' . $subject_data['class_avg'] . '"';;
}
$student_name = $variables['data']['student_user']->field_student_first_name['und'][0]['value'] . 
                ' ' . $variables['data']['student_user']->field_student_middle_name['und'][0]['value'] . 
                ' ' . $variables['data']['student_user']->field_student_last_name['und'][0]['value'];
?>
<canvas id="canvas" height="450" width="600"></canvas>
<div id="lineLegend"></div>
<script>
  var barChartData = {
    labels : [<?php print implode(', ', $labels)?>],
    datasets : [
      {
        fillColor : "rgba(220,220,220,0.5)",
        strokeColor : "rgba(220,220,220,1)",
        data : [<?php print implode(', ', $student_marks)?>],
        title : '<?php print $student_name; ?>\'s Marks'
      },
      {
        fillColor : "rgba(151,187,205,0.5)",
        strokeColor : "rgba(151,187,205,1)",
        data : [<?php print implode(', ', $class_average)?>],
        title : 'Class Average'
      }
    ],
	
  }
  var options = {
		  
	}
  var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData, options);
  legend(document.getElementById("lineLegend"), barChartData);

  function legend(parent, data) {
	    parent.className = 'legend';
	    var datas = data.hasOwnProperty('datasets') ? data.datasets : data;

	    datas.forEach(function(d) {
	        var title = document.createElement('span');
	        title.className = 'title';
	        title.style.borderColor = d.hasOwnProperty('strokeColor') ? d.strokeColor : d.color;
	        title.style.borderStyle = 'solid';
	        parent.appendChild(title);

	        var text = document.createTextNode(d.title);
	        title.appendChild(text);
	    });
	}
</script>
<style>
.legend .title {
    display: block;
    margin: 0.5em;
    border-style: solid;
    border-width: 0 0 0 1em;
    padding: 0 0.3em;
}
</style>