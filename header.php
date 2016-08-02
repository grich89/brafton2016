<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

		<script src="https://use.fontawesome.com/548d31e453.js"></script>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div class="overlay">

					<div id="inner-header" class="wrap cf">

						<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
						<div class="fixed">

							<div class="wrap">

								<a href="<?php echo home_url(); ?>" rel="nofollow"><p id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><span><?php bloginfo('name'); ?></span></p></a>

								<?php // if you'd like to use the site description you can un-comment it below ?>
								<?php // bloginfo('description'); ?>


								<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
									<?php wp_nav_menu(array(
			    					         'container' => false,                           // remove nav container
			    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
			    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
			    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
			    					         'theme_location' => 'main-nav',                 // where it's located in the theme
			    					         'before' => '',                                 // before the menu
			        			               'after' => '',                                  // after the menu
			        			               'link_before' => '',                            // before each link
			        			               'link_after' => '',                             // after each link
			        			               'depth' => 0,                                   // limit the depth of the nav
			    					         'fallback_cb' => ''                             // fallback function (if there is one)
									)); 
										//wp_nav_menu(
										    //array (
										        //'theme_location' => 'Full width',
										        //'walker'         => new WPSE_78121_Sublevel_Walker
										    //)
										//);
									?>

								</nav>

							</div>

						</div>

						<div id="spacer"></div>

						<div class="clear"></div>

						<?php if (is_front_page()) { ?>

							<div class="expand">
								<div class="inner">
									<div class="text">
										<h2>Expand your marketing presence</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere egestas odio, nec placerat augue congue eu. Suspendisse potenti.</p>
										<a class="green-btn" href="#">Content Marketing</a>
									</div>
								</div>
							</div>

						<?php } else if (is_page(array('About', 'Video Production') ) ) { ?>

							<div class="video">
								<div class="inner">
									<div class="text">
										<div class="play">
											<a href="#"><i class="fa fa-play-circle-o" aria-hidden="true"></i></a>
										</div>
										<h2>Lorem ipsum dolor sit amet</h2>
									</div>
								</div>
							</div>

						<?php } else if (is_page() ) { ?>

							<div class="expand">
								<div class="inner">
									<div class="text">
										<h1><?php the_title(); ?></h1>
										<?php $desc = get_field('page_description'); ?>
										<?php if( $desc ) {
											echo '<p>';
											echo $desc;
											echo '</p>';
										}
										?>
									</div>
								</div>
							</div>

						<?php } else if (is_singular('case_studies') ) { ?>

							<div class="case-study expand">
								<div class="inner">
									<div class="text">
										<h1><?php the_title(); ?></h1>
										<?php the_excerpt(); ?>
									</div>
								</div>
							</div>

						<?php } ?>

						<?php if (is_singular('case_studies') ) { ?>

							<div class="expand">
								<div class="inner">
									<div class="text">
										<h1><?php the_title(); ?></h1>
										<?php the_excerpt(); ?>
									</div>
								</div>
							</div>

						<?php } ?>

					</div>

					</div>

				</div>

			</header>
