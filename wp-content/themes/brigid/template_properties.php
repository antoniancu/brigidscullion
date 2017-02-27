<?php
/*

Template Name: Properties

*/



?>
<?php get_header();?>


<section id="middle">
	<div class="inner-page">
		<div class="container properties-archive">
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
				 <?php if (have_posts()) :
                    while (have_posts()) :
                        the_post();

                    ?>
        <div class="page-content">

                  <?php  $morecon = get_the_content_with_formatting();
                  $span_id = get_the_id();
                  $span_id = "more-".$span_id;
    $after_more = explode( '<span id="'.$span_id.'"></span>', $morecon ); ?>
            <div class="property_content_first">
                <?php    if( $after_more[0] ) {
                    echo $content = $after_more[0];
                    } ?>
                    <?php  if( $after_more[1] ) { ?>
                    <br><a href="javascript:void();" id="readmore_property" class="read_more">Read More ></a>
                        <?php } ?>

                </div>
            <div class="property_content_second">
                 <?php  if( $after_more[1] ) {
                    echo $content = $after_more[1];
                    }

                ?>
                 <br> <a href="javascript:void();" id="less_property" class="read_more">< Less</a>
                </div>

                </div>
                    <?php  endwhile;
                endif; ?>




			<h2 class="page-title"><?php echo get_field('property_page_heading');?></h2>
			<div class="row">

			<?php
						// WP_Query arguments
						$args = array (
								'post_type'              => array( 'property' ),
								'post_status'            => array( 'publish' ),
								'posts_per_page'         => '-1',
								'orderby' 				 => 'menu_order',
								'order'   				 => 'ASC',
						);

						// The Query
						$propert_query = new WP_Query( $args );




						// The Loop
						if ( $propert_query->have_posts() ) {
							while ( $propert_query->have_posts() ) {
								$propert_query->the_post();
								// do something
								if (ICL_LANGUAGE_CODE == 'en') { $month = "Month"; }else{ $month = "Mois";; }
								 $asking_price = get_field( "asking_price", $post->ID );
								 $asking_price= number_format($asking_price);
								 $price_per_month = esc_html(get_field( "price_per_month", $post->ID ));

								 if($price_per_month=="Yes"){

								 	$asking_price = $asking_price.'/'.$month;
								 }

								 $property_address = esc_html( get_field( "property_address", $post->ID ) );
								 $property_city = esc_html ( get_field( "property_city", $post->ID ) );
								 $property_state = esc_html( get_field( "property_state", $post->ID ) );


								?>
									<div class="col-md-3 col-sm-4">
                                        <?php
                                        $sold_status = get_field('sold_status') == 1 ? 'Sold' : false ;
                                        $price_per_month = get_field('price_per_month');
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="property-listing">
                                                <?php  if (  $sold_status ) {
                                                    if ( $price_per_month ) { $sold_status = 'Rented'; };
                                                ?>
                                                <div class="sold"><?php echo $sold_status ?></div>
                                                <?php } ?>
                                                <div class="properties-inner">
                                                    <div class="property-title">

                                                        <?php if (ICL_LANGUAGE_CODE == 'en') { echo "Asking Price:"; }else{ echo "Prix demandé:"; } ?><strong>$<?php echo $asking_price;?></strong>
                                                    </div>


                                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id
                                                        ( $post->ID ), 'property_image' ); ?>

                                                    <img src="<?php echo $image[0]; ?>">

                                                    <?php else : ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/property-11.jpg" alt="property-11">
                                                    <?php endif; ?>




                                                </div>
                                                <div class="address"><?php echo $property_address;?> ,<?php echo $property_city;?>, <?php echo $property_state;?></div>
                                            </div>
                                        </a>
									</div>



								<?php

							}
						} else {
							// no posts found
						}

						// Restore original Post Data
						wp_reset_postdata();

			?>




			</div>
		</div>
	</div>
</section>



<?php get_footer();?>