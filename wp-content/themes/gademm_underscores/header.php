<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gademm_underscores
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!--Loading Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Lora|Meie+Script|Muli|Quicksand:300,400" rel="stylesheet">
<!--Loading Font Awesome-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!--<a class="skip-link screen-reader-text" href="#content"><?php //esc_html_e( 'Skip to content', 'gademm_underscores' ); ?></a>-->

	<header id="masthead" class="site-header header-bar" role="banner">
		<div class="clearfix">
			<div class="site-branding">
				<?php
				if ( function_exists( 'the_custom_logo' ) ) : ?>
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
				<?php
				endif;
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button id="menu-toggle" class="" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars fa-lg"></i></button>
				<div class="clearfix"></div>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- /.navigation-holder -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container-fluid">
