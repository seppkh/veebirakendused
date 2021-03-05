<?php
	$myname = "Krister Sepp";
	$current_time = date("d.m.Y H:i:s");
	$time_html = "\n <p>lehe avamise hetkel oli: " . $current_time . ".</p> \n";
	$semester_begin = new DateTime('2021-01-25');
	$semester_end = new DateTime('2021-06-30');
	$semester_duration = $semester_begin ->diff($semester_end);
	$semester_dur_days = $semester_duration ->format("%r%a");
	$semester_dur_html = "\n <p>2021 kevadsemestri kestus on " .$semester_dur_days ." päeva.</p> \n";
?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title>Veebirakendused ja nende loomine 2021</title>
</head>
<body>
	<h1>
	<?php
		echo $myname;
	?>	
	</h1>
	<p>See leht on valminud õppetöö raames.</p>
	<?
		echo $time_html;
		echo $semester_dur_html;
	?>
</body>
</html>
