<?php
require_once 'database.php';
?>
<html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Учёт моделей</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/jquery.fancybox.min.js"></script>
</head>

<body onload="setInterval('scroll();', 250);">
	<div id="top_bar">
		
	</div>

	<div id="top">
		<div id="container_top">

		</div>
	</div>
	<div id="container">
		<?php
		$sql = "SELECT * FROM `main_sup` ORDER BY ind DESC LIMIT 0, 12";
		$title = DB::run($sql);
		$i=0;
		while ($row = $title->fetch(PDO::FETCH_LAZY)) {
			$imga = $row['image'];
			$rest = substr($imga, 5);
			$imga = "thumb/" . $rest;
			if ($i%4==0) echo '<img class="preview1"  src="' . $imga . '" onCLick="clickImage(this)" />';
			else echo '<img class="preview"  src="' . $imga . '" onCLick="clickImage(this)" />';
			$i++;
		}
			?>
		</div>
	</body>
	</html>
