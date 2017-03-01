<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php wp_footer(); ?>
<footer id="site-footer">
    <div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="contact-details">
                        <h4>Contact details</h4>
                        <?php if(get_field('contact_details','option')){ ?> <p><?php echo get_field('contact_details','option'); ?></p><?php } ?>
                        <?php if(get_field('phone_number','option')){ ?>  <div class="call-us">
                            <a href="tel:+<?php echo get_field('phone_number','option'); ?>"><?php echo get_field('phone_number','option'); ?></a>
                        </div>
                        <?php } ?>
                        <?php if(get_field('email','option')){ ?>  <div class="email-us">
                            <a href="mailto:<?php echo get_field('email','option'); ?>"><?php echo get_field('email','option'); ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-2">
                    <?php if(get_field('footer_logo','option')){ ?>
                    <div class="logo-icon">
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_field('footer_logo','option'); ?>" class="aligncenter" alt="footer-logo.png"></a>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-sm-5">
                    <?php if(get_field('address','option')){ ?>
                    <div class="address-details">
                        <h4>Address</h4>
                        <div class="location">
                            <?php echo get_field('address','option'); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                  <?php if(get_field('copy_right','option')){ ?>

                    <div class="cpy-right">
                     <?php  echo get_field('copy_right','option'); ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-sm-4">
                    <ul class="social-icons footer">
                        <li><a href="<?php esc_url(the_field('facebook','option' )); ?>"><i class="social-icon facebook"></i></a></li>
                        <li><a href="<?php esc_url(the_field('instagram','option')); ?>"><i class="social-icon instagram"></i></a></li>
                        <li><a href="<?php esc_url(the_field('linked_in','option')); ?>"><i class="social-icon linked-in"></i></a></li>
                        <li><a href="<?php esc_url(the_field('pinterest','option')); ?>"><i class="social-icon pinterest"></i></a></li>
                        <li><a href="<?php esc_url(the_field('houzz','option')); ?>"><i class="social-icon houzz"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    jQuery('#menu-item-643').addClass('subbutton');

     jQuery('.subbutton a').click(function() {
     //event.preventdefault();
    /* if(jQuery('ul.dropdown-menu').is(':hidden')) {
     jQuery('ul.dropdown-menu').slideDown(500);
     }else {
     jQuery('ul.dropdown-menu').slideUp(500);
     }*/

     });
 jQuery('.current-menu-item').addClass('active')
jQuery( "li.menu-item-has-children" ).addClass( "dropdown" );
</script>
