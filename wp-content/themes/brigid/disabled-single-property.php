<?php
/*
Template Name: Property Post Type template
*/
get_header( 'property'); ?>

    <div class="container property-page">
        <h2 class="title">Property Listing</h2>
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

                <div class="details">
                    <h2>Details</h2>
                    <?php the_content(); ?>
                </div>
                <div class="floors-rooms">

                    <?php
                    // check if the floors repeater field has rows of data
                    if( have_rows('floor') ) { ?>
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
                        };
                        ?></ul><?php
                    } else {
                    };
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4 sidebar">
            <div class="listing-id-status">
                <span class="sold"><?php esc_html(the_field('sold_status'));  ?></span>
                <span class="property-id">#<?php esc_html(the_field('id'));  ?></span>
            </div>
            <h2 class="listing-price">$<?php echo money_format( '%!.0i', esc_html( get_field('asking_price') ) );  ?></h2>
            <ul class="listing-properties-general">
                <li>Property type: <?php esc_html(the_field('property_type'));  ?></li>
                <li>Year built: <?php esc_html(the_field('year_of_construction'));  ?></li>
            </ul>
            <div class="property-address">
                <?php esc_html(the_field('property_address'));  ?><br/>
                <?php esc_html(the_field('property_city'));  ?>
                <?php esc_html(the_field('property_state'));  ?>
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
                'Municipal Evaluation' => esc_html(get_field('building_evaluation') ),
                'Land Evaluation' => esc_html(get_field('lot_evaluation') ),
                'Municipal Taxes' => esc_html(get_field('municipal_taxes') ),
                'School Taxes' => esc_html(get_field('school_taxes') ),
                'Additional Revenue' => esc_html(get_field('additional_revenue') ),
            );

            if ( $property_evaluations ) {
            ?>
            <div class="listing-properties-evaluation">
                <h3>Evaluations and Taxes</h3>
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
                    'Lot size' => esc_html(get_field('lot_size')),
                    'Lot area' => esc_html(get_field('lot_area')),
                    'Building size' => esc_html(get_field('building_size')),
                    'Living area' => esc_html(get_field('living_area')),
                );
            if ( $property_dimensions ) { ?>

                <div class="listing-properties-dimensions">
                    <h3>Dimensions</h3>
                    <ul>
                        <?php foreach ($property_dimensions as $property_dimension_label => $dimension_value) {
                            if ( $dimension_value ) {
                                 echo '<li><span class="list-item-title">' . $property_dimension_label .': </span>' .
                                     $dimension_value . '</li>';
                            };
                        }; ?>
                    </ul>
                </div>

           <?php }; ?>





            <ul class="listing-features">
                <h3>Features</h3>
                <?php
                if (have_rows('features')) {
                    while (have_rows('features')) {
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
                    };
                };
                ?>
            </ul>
            <div class="listing-form-questions">
                <h3 class="form-title">Questions about this listing?</h3>
                <?php echo do_shortcode( '[contact-form-7 id="908" title="Questions about this listing?"]' ); ?>
            </div>
        </div>
    </div>
    <div class="cta property">
        <h2 class="form-title">Interested in this property?</h2>
        <?php echo do_shortcode( '[contact-form-7 id="907" title="INTERESTED IN THIS PROPERTY"]' ); ?>
        <div class="clearfix"></div>
    </div>
<?php get_footer()?>