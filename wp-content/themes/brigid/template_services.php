<?php
/*
Template Name: Services Page template
*/

get_header();

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
        <?php if (have_posts()) :
                    while (have_posts()) :
                        the_post(); 
                        
                    ?>
        <div class="page-content">

                  <?php  $morecon = get_the_content_with_formatting();
                  $span_id = get_the_id();
  $span_id = "more-".$span_id;
    $after_more = explode( '<span id="'.$span_id.'"></span>', $morecon ); ?>
            <div class="service_content_fist">
                <?php    if( $after_more[0] ) {
                    echo $content = $after_more[0];
                    } ?>
                    <?php  if( $after_more[1] ) { ?>
                  <a href="javascript:void(0);" id="readmore_service" class="read_more"><?php _e('Read More', 'brigid-theme') ?></a>
                        <?php } ?>

                </div>
            <div class="service_content_second">
                 <?php  if( $after_more[1] ) {
                    echo $content = $after_more[1];
                    }
                    
                ?>
                  <br><a href="javascript:void(0);" id="less_service" class="read_more">< Less</a>
                </div>
                 
                </div>
                    <?php  endwhile;
                endif; ?>
            <?php if(get_field('services_selling_title')){ ?>
            <h2 class="page-title"><?php echo get_field('services_selling_title'); ?></h2>
        <?php } ?>
            <ul>

                <?php

                // check if the repeater field has rows of data
                if( have_rows('selling_services_list') ):

                    // loop through the rows of data
                    while ( have_rows('selling_services_list') ) : the_row();

                     ?>

                    <?php if(get_sub_field('services_selling_title')){ ?>    <li><a href="<?php if(get_sub_field('services_selling_link')){ echo get_sub_field('services_selling_link'); } ?>"><?php echo get_sub_field('services_selling_title'); ?></a></li>


                <?php }


                    endwhile;

                else :

                    // no rows found

                endif;

                ?>



            </ul>
<?php if(get_field('services_buying_title')){ ?>

    <h2 class="page-title"><?php echo get_field('services_buying_title'); ?></h2>
    <?php } ?>
            <div class="buy-service">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="buy-service-inner">

                           <?php
                           $block_1_img=get_field('services_buying_block_1_image');
                           if(get_field('services_buying_block_1_image')){ ?>
                            <img src="<?php echo $block_1_img['url']; ?>" alt="<?php echo $block_1_img['alt']; ?>">
                            <?php } ?>
                            <span  style="<?php if(!get_field('block_1_link')){ ?>cursor:auto<?php }?>" class="main-view">
                                <?php $block_1_icon=get_field('services_buying_block_1_icon');
                                if($block_1_icon){?>
                                <img src="<?php echo $block_1_icon['url']; ?>" alt="<?php echo $block_1_icon['alt']; ?>">
                                 <?php } if(get_field('services_buying_block_1_description')){ ?>

                                <p><?php echo get_field('services_buying_block_1_description'); ?></p>
                                 <?php } ?>
                            </span>
                        </div>
                    </div>

                    <?php  $block_2_img=get_field('services_buying_block_2_image'); ?>
                    <div class="col-sm-6">
                        <div class="buy-service-inner">

                            <?php if($block_2_img){ ?>
                            <img src="<?php echo $block_2_img['url']; ?>" alt="<?php echo $block_2_img['alt']; ?>">
                            <?php } ?>

                            <span style="<?php if(!get_field('block_2_link')){ ?>cursor:auto<?php }?>" class="main-view">
                            <?php $block_2_icon=get_field('services_buying_block_2_icon');
                            if($block_2_icon){ ?>

                                <img src="<?php echo $block_2_icon['url']; ?>" alt="<?php echo $block_2_icon['alt']; ?>">
                             <?php } if(get_field('services_buying_block_2_description')){ ?>


                                <p>
                                    <?php echo get_field('services_buying_block_2_description'); ?>
                                </p>
                                 <?php } ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(get_field('additional_services_title')){ ?>
            <h2 class="page-title"><?php echo get_field('additional_services_title'); ?></h2>
            <?php } ?>
            <div class="additional-service">
                <div class="additional-service-inner">
                    <?php $add_img=get_field('additional_service_image');
                    if($add_img){
                    ?>
                    <img src="<?php echo $add_img['url']; ?>" alt="<?php echo $add_img['alt']; ?>">
                    <?php } ?>
                    <span style="<?php if(!get_field('additional_service_link')){ ?>cursor:auto<?php }?>" class="main-view">

                        <?php if(get_field('additional_service_description')){ ?>
                        <div class="content">
                            <?php echo get_field('additional_service_description'); ?>
                        </div>
                        <?php } ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>