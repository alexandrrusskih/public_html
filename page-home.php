<?php
/*
  * Template name: Home
  * */
get_header();

if(ale_get_meta('descr1')){
	echo ale_get_meta('descr1');
}

 //echo "Home page";

$custom_query = new WP_Query( array( 'post_type' => 'services','posts_per_page'=>'1' ) );

if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
<div class="h2" ><?php the_title(); ?></div>
<div class="contact-content">
	<?php the_content(); ?>
</div>
<?php endwhile; endif; ?>

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

