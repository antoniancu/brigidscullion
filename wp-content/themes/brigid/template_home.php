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