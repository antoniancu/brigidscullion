<?php
/*
Template Name: Home Page template
*/

get_header(); ?>

    
    <section id="middle">
        <div class="buy-rent-section">
            <div class="container">
                <?php if (have_posts()) :
                    while (have_posts()) :
                        the_post(); 
                    	
                    ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                      <?php if($image){ ?>
                    <div class="pr-image">
                        <img src="<?php echo $image[0]; ?>" alt="lady-image">
                    </div>
                    <?php } ?>
                <div class="pr-content">
                  <?php  $morecon = get_the_content_with_formatting();
                  $span_id = get_the_id();
                  $span_id = "more-".$span_id;
                  $after_more = explode( '<span id="'.$span_id.'"></span>', $morecon ); ?>
                    <div class="articles-new-first">
				    <?php if( $after_more[0] ) {
					echo $content = $after_more[0];
				    } ?>
					<?php  if( $after_more[1] ) { ?>
				   <a href="javascript:void();" id="readmore" class="read_more">Read More ></a>
						<?php } ?>

				</div>
				<div class="articles-new-second">
				 <?php  if( $after_more[1] ) {
					echo $content = $after_more[1];
				    }
					
				?>
				  <br><a href="javascript:void();" id="less" class="read_more">< Less</a>			
				
                </div>
             
                <?php if(get_field('contact_button_text')){ ?>
                    <a class="contact-btn" href="<?php if(get_field('contact_button_url')){echo get_field('contact_button_url');} ?>" target="_blank"><?php echo get_field('contact_button_text'); ?></a>
                <?php } ?>
                </div>
				 
                    <?php  endwhile;
                endif; ?>
                
            </div>
        </div>


        <div class="sold-property-section">
            <div class="container">
                <div class="row">
                    <?php
                    if( have_rows('home_featured_properties') ):
                        while ( have_rows('home_featured_properties') ) : the_row();
                            $property_post = get_sub_field('property');
                            $featured_title = get_sub_field('title');
                            if( $featured_title || $property_post ) {
                                ?>
<!--                                --><?php //var_dump(get_sub_field('property'));?>
                                <div class="col-sm-4">
                                    <a href="<?php echo get_permalink( get_sub_field('property') );?>">
                                        <div class="sold-property-inner">
                                            <div class="heading">
                                                <?php echo esc_html( get_sub_field('title') ); ?>
                                            </div>
                                            <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id
                                            ( $property_post->ID ), 'property_image'); ?>
                                            <img src="<?php echo $image[0]; ?>" class="property-thumbnail">
                                            <div class="address"><?php echo get_the_title( get_sub_field
                                                ('property') );
                                                ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                        endwhile;
                    else :
                        // no rows found
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>



<?php get_footer();
?>