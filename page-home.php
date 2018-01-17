<?php
/*
  * Template name: Home
  * */
$qr_result   = "select * from main_sup ORDER BY date DESC  LIMIT " . strval($current_row) . "," . strval($screen_rows);
$query = mysql_query($qr_result) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");


 //echo "Home page";
?>


<div class="wrapper content">
	<img class="image"  src="/uploads/site_article/wed_rings/017_1.jpg" alt=""> 
	<img class="image" src="/uploads/site_article/wed_rings/018_1.jpg" alt="">
	<img class="image" src="/uploads/site_article/wed_rings/019_1.jpg" alt="">
	<img class="image" src="/uploads/site_article/wed_rings/020_1.jpg" alt="">	
	<img class="image" src="/uploads/site_article/wed_rings/021_1.jpg" alt="">
	<img class="image" src="/uploads/site_article/wed_rings/022_1.jpg" alt="">
	<img class="image" src="/uploads/site_article/wed_rings/023_1.jpg" alt="">	
	<img class="image" src="/uploads/site_article/wed_rings/024_1.jpg" alt=""> 

<!-- </div> -->

<!-- <h1>Пагинация для Галерей</h1> -->
<!-- 
post_content - ссылка на фото
post_title - тип изделия


-->



<?php get_footer();

