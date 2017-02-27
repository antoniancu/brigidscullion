<?php 
/*
 
Template Name: Coming Soon

*/



?>
<?php get_header();?>
<section id="middle">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="inner-page">
		
		<div class="container">
	<?php 
	if (ICL_LANGUAGE_CODE == 'en') {
   echo "<h1>Coming Soon</h1>";
}else{
	echo "<h1>À Venir</h1>";
}
	?>
			 
			 
		</div>
	</div>	<?php endwhile; ?>
</section>

<?php get_footer();?>