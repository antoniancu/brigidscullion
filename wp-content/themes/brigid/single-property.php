<?php
/*
Template Name: Property Post Type template
*/
get_header( 'property'); ?>

    <div class="container property-page">
        <h2 class="title"><?php _e('Property Listing', 'brigid-theme') ?></h2>
        <div class="col-sm-8 main">
            <div class="row">
                <?php the_title('<h1>','</h1>'); ?>
                <div class="listing-image-main-gallery slick-carousel" data-slick='{"autoplay": true, "lazyLoad": "ondemand", "infinite": true, "fade": true, "slidesToShow": 1, "asNavFor": ".listing-image-thumb-gallery"}'>
                    <?php

                    $images = get_field('property_gallery');

                    if( $images ) { ;
                        foreach( $images as $image ) { ?>

                            <div>
                                <img data-lazy="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </div>
                        <?php }; ?>
                    <?php }; ?>
                </div>
                <div class="listing-image-thumb-gallery slick-carousel" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "lazyLoad": "ondemand", "asNavFor": ".listing-image-main-gallery", "focusOnSelect": true, "arrows": false}'>
                    <?php

                    $images = get_field('property_gallery');

                    if( $images ) { ;
                        foreach( $images as $image ) { ?>

                            <div class="gallery-thumbnail">
                                <img data-lazy="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </div>
                        <?php }; ?>
                    <?php }; ?>
                </div>
                <?php if (get_the_content()) { ?>
                    <div class="details">
                        <h2><?php _e('Details', 'brigid-theme') ?></h2>
                        <?php the_content(); ?>
                    </div>
                <?php } ?>
                <?php
                    // check if the floors repeater field has rows of data
                    if( have_rows('floor') ) { ?>
                    <div class="floors-rooms">
                        <h2>Floors and Rooms</h2>
                        <ul class="floors-list">
                        <?php

                        // loop through the rows of data
                        while (have_rows('floor')) {
                            the_row();
                            $floor_name = get_sub_field('floor_name');
                            ?>
                            <li>
                            <h3><?php echo $floor_name ?></h3>
                            <ul class="rooms-list">
                            <?php
                        if( have_rows('rooms')) {
                            while (have_rows('rooms')) {
                                the_row();
                                $room = get_sub_field('room');
                                $dimensions = get_sub_field('dimensions');
                                $room_notes = get_sub_field('room_notes');
                                ?>

                                <li>
                                    <h5 class="room-name"><?php echo $room ?></h5>
                                    <span class="room-dimensions"><?php echo $dimensions ?></span>
                                    <span class="room-notes"><?php echo $room_notes ?></span>
                                </li>

                                <?php
                            }?>
                            </ul>
                            <?php
                        };
                            ?>
                            </li><?php
                        }; ?>
                        </ul>
                    </div>
                    <?php  }; ?>
            </div>
        </div>
        <div class="col-sm-4 sidebar">
            <div class="listing-id-status">
                <?php
                $sold_status = get_field('sold_status') == 1 ? brigid_stringtranslate( __('Sold' , 'brigid-theme') ) : false ;
                $price_per_month = get_field('price_per_month');
                if ( $sold_status ) {
                    if ( $price_per_month ) { $sold_status = brigid_stringtranslate( __('Rented', 'brigid-theme') ); };
                    ?>
                    <span class="sold"><?php echo $sold_status ?></span>
                <?php } ?>
                <span class="property-id">#<?php esc_html(the_field('id'));  ?></span>
            </div>
            <h2 class="listing-price">$<?php echo money_format( '%!.0i', esc_html( get_field('asking_price') ) );
            echo $price_per_month ? brigid_stringtranslate( __('/month', 'brigid-theme') ) : '';?></h2>
            <ul class="listing-properties-general">
                <li><?php _e('Property type: ', 'brigid-theme'); esc_html(the_field('property_type'));  ?></li>
                <?php if ( get_field('year_of_construction')) { ?>
                    <li><?php _e('Year built: ', 'brigid-theme'); esc_html(the_field('year_of_construction'));  ?></li>
                <?php } ?>
            </ul>
            <div class="property-address">
                <?php esc_html(the_field('property_address'));  ?><br/>
                <?php esc_html(the_field('property_city'));  ?>
                <?php esc_html(the_field('property_state')); esc_html(the_field('property_postal_code'));  ?>
            </div>
            <div class="listing-location-map">
                <?php

                $location = get_field('map');

                if( !empty($location) ){
                    ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php }; ?>
            </div>

            <?php
            $property_evaluations = array(
                __('Municipal Evaluation', 'brigid-theme') => esc_html( get_field('building_evaluation')  ),
                __('Land Evaluation', 'brigid-theme') => esc_html( get_field('lot_evaluation') ),
                __('Municipal Taxes', 'brigid-theme') => esc_html( get_field('municipal_taxes') ),
                __('School Taxes', 'brigid-theme') => esc_html( get_field('school_taxes') ),
                __('Additional Revenue', 'brigid-theme') => esc_html( get_field('additional_revenue') ),
            );

            if ( $property_evaluations[0] ) {
            ?>
            <div class="listing-properties-evaluation">
                <h3><?php _e('Evaluations and Taxes', 'brigid-theme') ?></h3>
                <ul>
                    <?php foreach ( $property_evaluations as $evaluation_label => $evaluation_value ) {
                        if ( $evaluation_value ) {
                            echo  '<li><span class="list-item-title">' . $evaluation_label . ':</span> $' .
                                $evaluation_value . '</li>';
                        };
                    } ?>

                </ul>
            </div>
            <?php }; ?>

            <?php

                $property_dimensions = array(
                    __('Lot size', 'brigid-theme') => esc_html(get_field('lot_size')),
                    __('Lot area', 'brigid-theme') => esc_html(get_field('lot_area')),
                    __('Building size', 'brigid-theme') => esc_html(get_field('building_size')),
                    __('Living area', 'brigid-theme') => esc_html(get_field('living_area')),
                );
            if ( $property_dimensions[0] ) { ?>

                <div class="listing-properties-dimensions">
                    <h3><?php _e('Dimensions', 'brigid-theme') ?></h3>
                    <ul>
                        <?php foreach ($property_dimensions as $property_dimension_label => $dimension_value) {
                            if ( $dimension_value ) {
                                 echo '<li><span class="list-item-title">' . $property_dimension_label .': </span>' .
                                     $dimension_value . 'FT.</li>';
                            };
                        }; ?>
                    </ul>
                </div>

           <?php }; ?>

            <?php
            if (have_rows('features')) { ?>
                <ul class="listing-features">
                <h3><?php _e('Features', 'brigid-theme') ?></h3>

                    <?php while (have_rows('features')) {
                        the_row();
                        $feature_title = get_sub_field('feature_title');
                        echo '<li class="feature"><span class="feature-title">' . $feature_title . ':</span>
                            <ul class="features-items-list">';
                        if (have_rows('features_list')) {
                            while (have_rows('features_list')){
                                the_row();
                                echo '<li class="feature-description">';
                                echo the_sub_field('feature_description');
                                echo '</li>';
                            };
                        };
                        echo '</ul></li>';
                    }; ?>
                </ul>
            <?php }; ?>

            <?php if ( !$sold_status ) { ?>
            <div class="listing-form-questions">
                <h3 class="form-title"><?php _e('Questions about this listing?', 'brigid-theme') ?></h3>
                <?php
                    if (ICL_LANGUAGE_CODE == 'en') {
                        echo do_shortcode('[contact-form-7 id="908" title="Questions about this listing?"]');
                    }else{
                        echo do_shortcode('[contact-form-7 id="1872" title="Questions à propos de cette propriété?"]');
                    };
                ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="cta property">
        <h2 class="form-title"><?php _e('Interested in this property?', 'brigid-theme') ?></h2>
        <?php
            if (ICL_LANGUAGE_CODE == 'en') {
                echo do_shortcode( '[contact-form-7 id="907" title="INTERESTED IN THIS PROPERTY"]' );
            }else{
                echo do_shortcode( '[contact-form-7 id="1873" title="Intéressé(e) par cette propriété?"]' );
            };
        ?>
        <div class="clearfix"></div>
    </div>
<?php get_footer()?>