<?php 
/*
 
Template Name: Contact

*/



?>
<?php get_header();?>
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
			while(have_posts()):the_post();
			the_content();
			endwhile;
			?>
		</div>
	</div>	
</section>

<?php get_footer();?>