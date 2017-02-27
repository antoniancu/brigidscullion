<?php 
/*
 
Template Name: Testimonial

*/
 get_header();
global $post;
 ?>


<section id="middle">
	<div class="inner-page">
		<div class="container">
		      <?php 
if (ICL_LANGUAGE_CODE == 'en') {
    $home = "Home";
    $url=get_permalink(4);
}else{
    $home = "Accueil";
    $url=get_permalink(207);
}

?>
<?php if(!is_page(array(4,207))){?>
<div class="breadcrumb"><div class="cust-bread"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="<?php echo $url; ?>" rel="v:url" property="v:title"><?php echo $home; ?></a> » <span class="breadcrumb_last"><?php the_title(); ?></span></span></span></div></div>
<?php } ?>
		<?php
$type = 'testimonial';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order'=>'ASC'
);

$my_query = new WP_Query($args);



//if( $my_query->have_posts() ) 
{
  while ($my_query->have_posts()) : $my_query->the_post(); 

  ?>
    <?php //echo get_field('testimonial_section_width',298);?>
    <div class="<?php echo get_field('testimonial_section_width',$my_query->post->ID);?>">
			 <?php the_content();?><br> 
			<b><?php echo get_field('testimonial_by');?></b>
			 </div>
			  <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>
		</div>
	</div>	
</section>

<?php get_footer();?>