<!doctype html>
<?php  $path = $_SERVER['REQUEST_URI'] ; $test = explode('/',$path);    ?>
<?php  setlocale(LC_MONETARY, 'en_CA');    ?>

<?php if (in_array("fr", $test)) {  ?> <html lang=”fr-ca”> 
<?php } else { ?> <html lang=”en-ca”>
<?php } ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="UTF-8">
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<!--include css-->

<!--	<link rel="stylesheet" href="--><?php //bloginfo('template_url'); ?><!--/assets/css/reset.css">-->
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
<!--	<link rel="stylesheet" href="--><?php //bloginfo('template_url'); ?><!--/assets/plugins/bootstrap/css/bootstrap.min.css">-->
	<!-- <link rel="stylesheet" href="assets/plugins/Hover-master/css/hover.css"> -->
<!--	--><?php //if(ICL_LANGUAGE_CODE=='en'){?>
<!--	<link rel="stylesheet" href="--><?php //bloginfo('template_url'); ?><!--/assets/css/style.css">-->
<!--		<link rel="stylesheet" href="--><?php //bloginfo('template_url'); ?><!--/assets/css/responsive.css">-->
<!--	--><?php //}else{?>
<!--	<link rel="stylesheet" href="--><?php //bloginfo('template_url'); ?><!--/assets/css/style_fr.css">-->
<!--		<link rel="stylesheet" href="--><?php //bloginfo('template_url'); ?><!--/assets/css/responsive_fr.css">-->
<!--	--><?php //}?>


	<!--include css-->

	<!--include Script -->

<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--	<script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/assets/plugins/bootstrap/js/bootstrap.min.js"></script>-->
<!--	<script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/assets/js/jquery.syncheight.js"></script>-->
<!--	<script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/assets/plugins/Flexmenu/jQuery.Flexmenu.js"></script>-->
<!--	<script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/assets/js/functions.js"></script>-->
<!--	<script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/js/readmore.js"></script>-->
<!--	<script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/js/jquery.formance.min.js"></script>-->


	<!--[if IE ]>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/pie.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/html5.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/ie9.js"></script>
	<![endif]-->

	<!--include Script -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-64318386-1', 'auto');
  ga('send', 'pageview');
 
</script>

<style type="text/css">
	
	.no-place span.title-banner {display: -webkit-inline-box;text-transform: uppercase;font-size: 38px;color: #ececec;margin: 0 0 5px 0;display: inline-block;}
</style>
<meta name="msvalidate.01" content="AB72223358D958D1D418F674186CCE52" />
	<?php wp_head(); ?>
</head>
<body class="<?php if(is_front_page()){ echo 'home page'; } ?>">
<header id="site-header">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="call-us">
						<a href="tel:+<?php echo get_field('phone_number','option') ?>"><?php echo get_field('phone_number','option') ?></a>
					</div>
				</div>
				<?php  $languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
					//echo "<pre>";print_r($languages); ?>
					<div class="lang">
						<p>
                        	
				<div class="col-sm-8">
				
					<ul class="social-icons">
                        <li><a href="<?php esc_url(the_field('facebook','option' )); ?>"><i class="social-icon facebook"></i></a></li>
                        <li><a href="<?php esc_url(the_field('instagram','option')); ?>"><i class="social-icon instagram"></i></a></li>
                        <li><a href="<?php esc_url(the_field('linked_in','option')); ?>"><i class="social-icon linked-in"></i></a></li>
                        <li><a href="<?php esc_url(the_field('pinterest','option')); ?>"><i class="social-icon pinterest"></i></a></li>
                        <li><a href="<?php esc_url(the_field('houzz','option')); ?>"><i class="social-icon houzz"></i></a></li>
                        <a href=""></a>
						<li>	<?php 
						 $fr = $languages['fr']['url'];
						 $en = $languages['en']['url'];
						 foreach($languages as $l){
						 $active	= $l['active'];
						 $lang_id = $l['id'];
						 if ( ( $active==1 ) && ( $lang_id==1 ) ) {
							 ?>
								 <a href="<?php echo $fr ;?>"><i class="social-icon french"></i></a>
								 <?php } elseif ( ( $active==1) && ( $lang_id==4 ) ) { ?>
                                 <a href="<?php echo $en; ?>"><i class="social-icon english"></i></a> <span>
								
						<?php }
						 }?>
                        </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="header-nav">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="logo">
						<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_field('logo','option') ?>" alt="logo"></a>
					</div>
				</div>
				<div class="main-nav pull-right">
					<nav class="navbar navbar-default">

						<!-- Brand and toggle get grouped for better mobile display -->
						<!-- <div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div> -->
						<div class="menu-icon"><span></span></div>
						<div class="clearfix"></div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse outerspace" id="bs-example-navbar-collapse-1">

							<?php

							$defaults = array(
								'theme_location'  => '',
								'menu'            => '',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'nav navbar-nav',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								//'walker'          => new Custom_Walker_Nav_Menu()
							);

							wp_nav_menu( $defaults );

							?>



						</div>

					</nav>
				</div>
			</div>
		</div>
	</div>

</header>
<?php 
if(is_front_page()){?>
<div id="banner" style="background: url(<?php echo get_field('home_banner'); ?>) center center no-repeat scroll;">
        <div class="container">
            <div class="no-place-outer">
                <div class="middle-align">
                    <div class="no-place">

                        <?php if(get_field('banner_text_line_1')){ ?>
                        <span class="title-banner"><?php echo get_field('banner_text_line_1'); ?></span>
                        <?php } ?>
                    <?php if(get_field('banner_text_line_2')){ ?>
                            <div class="tagline"><?php echo get_field('banner_text_line_2'); ?></div>


                    <?php } ?>
                    <?php if(get_field('contact_button_text')){ ?>

                        <a class="contact-btn" href="<?php if(get_field('contact_button_url')){echo get_field('contact_button_url');} ?>" target="_blank"><?php echo get_field('contact_button_text'); ?></a>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php }elseif ( !is_singular('property')){
global $post;
$banner_image = get_field('inner_page_banner');


$inner_page_description = get_field('inner_page_description');

?><?php if($banner_image['url']){?>
<div id="banner" style="background: url(<?php echo $banner_image['url']; ?>) center center no-repeat scroll;">
	<div class="container">
		<div class="no-place-outer">
			<div class="middle-align">
				<div class="no-place">
					<span class="title-banner"><?php the_title();?></span>
					<?php if(get_field('inner_page_description')){ ?>
                            <div class="tagline"> <?php echo get_field('inner_page_description'); ?></div>
                    <?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }else {?><div id="banner" style="background: url(<?php bloginfo('template_url'); ?>/assets/img/banner-property-img.jpg) center center no-repeat;">
	<div class="container">
		<div class="no-place-outer">
			<div class="middle-align">
				<div class="no-place">
					<h1>404</h1>
					
                           <div class="tagline"></div>
                   
				</div>
			</div>
		</div>
	</div>
</div>
<?php }}

?>
