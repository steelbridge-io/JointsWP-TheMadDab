<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>
	
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<header class="header" role="banner">
						
					 <!-- This navs will be applied to the topbar, above all content
						  To see additional nav styles, visit the /parts directory -->
					 <?php
                     get_template_part('parts/nav', 'topmenu');
                     //get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
	 	
				</header> <!-- end .header -->
              
              <?php if(is_home() || is_front_page()) : ?>
                <div id="frontpage-hero" class="card">
                  <div class="front-page card-divider">
                    <?php $front_page_title = get_theme_mod('themaddab_hero_title'); ?>
                    <h1 class="front-page-hero-title"><?php echo $front_page_title; ?></h1>
                  </div>
                  <div class="fp-topcont-img card-section">
                    <?php $front_page_subtitle = get_theme_mod('themaddab_hero_subtitle_text');
                          $front_page_header_text = get_theme_mod('themaddab_hero_text'); ?>
                    <h2 class="hero-subtitle"><?php echo $front_page_subtitle; ?></h2>
                    <h3 class="hero-text"><?php echo $front_page_header_text; ?></h3>
                  </div>
                  <?php get_template_part( 'parts/nav', 'product-bar' ); ?>
                </div>
              <?php endif; ?>
