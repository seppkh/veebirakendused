<?php
	$myname = "Krister Sepp";
	$current_time = date("d.m.Y H:i:s");
	$time_html = "\n <p>Lehe avamise hetkel oli kuupäev ja aeg: " . $current_time . ".</p> \n";
	$semester_begin = new DateTime('2021-01-25');
	$semester_end = new DateTime('2021-06-30');
	$semester_duration = $semester_begin ->diff($semester_end);
	$semester_dur_days = $semester_duration ->format("%r%a");
	$semester_dur_html = "\n <p>2021 kevadsemestri kestus on " .$semester_dur_days ." päeva.</p> \n";
	$today = new DateTime("now");
	$from_semester_begin = $semester_begin ->diff($today);
	$from_sem_begin_days = $from_semester_begin ->format("%r%a");

	if ($from_sem_begin_days < $semester_dur_days) {
		$sem_progress = "\n" .'<p>Semester edeneb: <meter min="0" max="' .$semester_dur_days .'" value="' .$from_sem_begin_days .'"></meter>.</p>' ."\n";
		}
	else {
		$sem_progress = "\n" .'<p>Semester on lõppenud.</p>' ."\n";
	}
	// <meter min= "0" max= "135" value="35"></meter>

	//loeme piltide kataloogide sisu
	$picsdir = "../pics/"; // ehk /~andrus.rinde/vr2021/pics/
	$allfiles = array_slice(scandir($picsdir), 2);
	// echo $allfiles;
	// var_dump($allfiles);
	$allowed_photo_types = ["image/jpeg", "image/png"];
	$picfiles = [];
	// 
	//
	// Kontrollime, et leht näitaks ainult jpeg ja png faile. Selleks kontrollid IGA faili sisu (foreach), mille command on getimagesize(). 
	foreach ($allfiles as $file) {
		$fileinfo = getimagesize($picsdir .$file); //kasuta getimagesize, et kontrollida, et tegu on pildiga. Faililaiendi kontrollimine ainuüksi ei määraks midagi, nt .pptx fail võib lõppeda .jpg nimega.
		// var_dump($fileinfo);
		if (isset($fileinfo["mime"])) { //kui "mime" sisaldub faili infos, mis on piltide sees olemas. Mp3s nt pole.
			if(in_array($fileinfo["mime"], $allowed_photo_types)) { //kontrolli, kas "mime" info sialdub lubatud phototüüpides
				array_push($picfiles, $file); //kui jah, siis lisa meie piltide listi
			}
		}
	}

	$photo_count = count($picfiles);
	$photo_num = mt_rand(0, $photo_count-1);
	$random_photo = $picfiles[$photo_num]; //mt_rand peaks olema kiirem kui rand
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
	<?php
		echo $time_html;
		echo $semester_dur_html;
		echo $sem_progress;
	?> <br>
	<!-- <img src="/~andrus.rinde/vr2021/pics/IMG_0245.JPG" alt="Vaade Haapsalus"> -->
	<img src="<?php echo $picsdir .$random_photo; ?>" alt="Vaade Haapsalus">

</body>
</html>
