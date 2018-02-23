<?php
require_once 'database.php';
connect();
?>

<html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Учёт моделей</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script src="js/functions.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="js/jquery.fancybox.min.js"></script>
		<!-- <script src="js/popup_img.js" type="text/javascript" charset="utf-8" async defer></script> -->
	</head>

	<body onload="setInterval('scroll();', 250);">
		<div id="top">
		</div>
		<div id="container">
			<?php
			$qr_result = "select * from main_sup ORDER BY date DESC LIMIT 0, 11";
			$query = mysql_query($qr_result) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
			while ($data = mysql_fetch_array($query)) {
			    $imga = $data[image];
			   $rest = substr($imga, 5);
			   $imga="thumb/".$rest;
			    echo '<img class="preview"  src="' . $imga . '" onCLick="clickImage(this)" />';}
			?>
		</div>
	</body>
</html>


<!-- 
	<script>
		function popupImg(immm){	// Событие клика на маленькое изображение
		  	var img = $(this);	// Получаем изображение, на которое кликнули
			var src = immm.src; // Достаем из этого изображения путь до картинки
			$("body").append("<div class='popup'>"+ //Добавляем в тело документа разметку всплывающего окна
							 "<div class='popup_bg'></div>"+ // Блок, который будет служить фоном затемненным
							 "<img src="+src+" class='popup_img' />"+ // Само увеличенное фото
							 "</div>");
			$(".popup").fadeIn(400); // Медленно выводим изображение
			$(".popup_img").click(function(){	// Событие клика на затемненный фон
				$(".popup").fadeOut(400);	// Медленно убираем всплывающее окно
				setTimeout(function() {	// Выставляем таймер
				  $(".popup").remove(); // Удаляем разметку высплывающего окна
				}, 400);
			});
		}
	</script> -->

<!-- <script>

var contentHeight = 640;
var pageHeight = document.documentElement.clientHeight-225;
var scrollPosition;
var n = 10;
var xmlhttp;

function putImages(){

	if (xmlhttp.readyState==4)
	  {
		  if(xmlhttp.responseText){
			 var resp = xmlhttp.responseText.replace("\r\n", "");
			 var files = resp.split(";");
			  var j = 0;
			  for(i=0; i<files.length; i++){
				  if(files[i] != ""){
					 document.getElementById("container").innerHTML += '<a href="foto/'+files[i]+'"><img id="preview" src="foto/'+files[i]+'" /></a>';
					 j++;
					   if(j ==8){
						  // document.getElementById("container").innerHTML += '<p>'+(n-1)+" Images Displayed | <a href='#header'>top</a></p><br /><hr />";
						  j = 0;
					  }
				  }
			  }
		  }
	  }
}


function scroll(){

	if(navigator.appName == "Microsoft Internet Explorer")
		scrollPosition = document.documentElement.scrollTop;
	else
		scrollPosition = window.pageYOffset;



	if((contentHeight - pageHeight - scrollPosition) < 120){
	console.log( contentHeight - pageHeight - scrollPosition);
		if(window.XMLHttpRequest)
			xmlhttp = new XMLHttpRequest();
		else
			if(window.ActiveXObject)
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			else
				alert ("Извините! Ваш браузер не поддерживает XMLHTTP!");

		var url="getImages.php?n="+n;

		xmlhttp.open("GET",url,true);
		xmlhttp.send();

		n += 9;
		xmlhttp.onreadystatechange=putImages;
		contentHeight += 640;
	}
}

</script!-->

</html>