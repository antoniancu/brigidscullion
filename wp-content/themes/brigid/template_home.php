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
                    <?php the_content(); ?>
                </div>
				 
                    <?php  endwhile;
                endif; ?>
                
            </div>
        </div>


        <div class="sold-property-section">
            <div class="container">
                <div class="row">
                    <h2><?php _e('Properties for sale and recently sold', 'brigid-theme') ?></h2>
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
                <div class="all-properties-cta">
                    <a href="<?php echo bloginfo('url') . '/properties'; ?>" class="contact-btn"><?php echo _e('View all properties for sale'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section id="for-buyers">
        <div class="container">
            <?php echo get_field('for_buyers'); ?>
        </div>

        <div class="buyer-property-section">
            <div class="container">
                <div class="row">
                    <?php
                    if( have_rows('featured_buyer_properties') ):
                        while ( have_rows('featured_buyer_properties') ) : the_row();
                            $buyer_property_post = get_sub_field('buyer_property');
                            $featured_buyer_title = esc_html(get_sub_field('title'));
                            if( $featured_buyer_title || $buyer_property_post ) {
                                ?>
                                <!--                                --><?php //var_dump(get_sub_field('buyer_property'));?>
                                <div class="col-sm-4">
                                    <a href="<?php echo get_permalink( get_sub_field('buyer_property') );?>">
                                        <div class="buyer-property-inner">
                                            <div class="heading">
                                                <?php echo esc_html( get_sub_field('title') ); ?>
                                            </div>
                                            <?php  $buyer_image = wp_get_attachment_image_src( get_post_thumbnail_id
                                            ( $buyer_property_post->ID ), 'buyer_property_image'); ?>
                                            <img src="<?php echo esc_url($buyer_image[0]); ?>" class="property-thumbnail">
                                            <div class="address"><?php echo get_the_title( get_sub_field
                                                ('buyer_property') );
                                                ?>
                                                <br>Read their story here..
                                            </div>
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