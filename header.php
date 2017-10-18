<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Idaho_Webmaster
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<meta name="description" content="<?php echo esc_attr( idaho_webmaster_page_description() ); ?>">
	<meta name="author" content="State of Idaho">

	<!-- Facebook Open Graph -->
	<meta property="og:title" content="<?php echo get_the_title(); ?>" />
	<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
	<meta property="og:url" content="<?php echo esc_attr( get_permalink() ); ?>" />
	<meta property="og:description" content="<?php echo esc_attr( idaho_webmaster_page_description() ); ?>" />
	<meta property="og:locale" content="en_US" />

	<!-- Twitter Card -->
	<meta name="twitter:card" content="<?php echo esc_attr( idaho_webmaster_page_description() ); ?>" />
	<meta name="twitter:site" content="<?php echo esc_attr( idaho_webmaster_find_twitter_handle() ); ?>" />
	<meta name="twitter:title" content="<?php echo get_the_title(); ?>" />
	<meta name="twitter:description" content="Visit our website for more information." />

	<!-- Dublin Core Terms -->
	<meta name="DCTERMS.title" content="<?php echo get_the_title(); ?>">
	<meta name="DCTERMS.subject" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
	<meta name="DCTERMS.description" content="<?php echo esc_attr( idaho_webmaster_page_description() ); ?>">
	<meta name="DCTERMS.creator" content="State of Idaho">
	<meta name="DCTERMS.created" content="<?php echo esc_attr( get_the_time( 'Y-m-d\TH:i:s' ) ); ?>">
	<meta name="DCTERMS.modified" content="<?php echo esc_attr( the_modified_date( 'Y-m-d\TH:i:s', '', '', false ) ); ?>">
	<meta name="DCTERMS.language" content="EN">
	<meta name="DCTERMS.publisher" content="State of Idaho">
	<meta name="DCTERMS.format" content="text/html">

	<link rel="shortcut icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon.ico?v=3" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="site-body">

	<?php /** Gradient container and gradient. Placed absolutely behind the main content. */ ?>
	<?php if ( ! get_background_image() ) : ?>
		<div class="gradient-background-container">
			<div class="gradient-background"></div>
		</div>
	<?php else : ?>
		<?php if ( ! get_theme_mod( 'idaho_background_shadow', false ) ) : ?>
			<div class="background-shadow-left"></div>
			<div class="background-shadow-right"></div>
			<div class="gradient-background-cutoff"></div>
		<?php endif; ?>
	<?php endif; ?>

	<?php /** For Screen Readers. */ ?>
	<a href="#content" class="sr-only sr-only-focusable skip-to-content"><?php esc_html_e( 'Skip to content', 'idaho-webmaster' ); ?></a>

	<?php /** Top Utility Navigation */ ?>
	<div class="top-navigation hidden-print">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 hidden-xs"><?php echo wp_kses_post( get_theme_mod( 'idaho_tagline', 'Adventures in Living' ) ); ?></div>
				
				<?php wp_nav_menu( array(
					'menu' 						=> 'top',
					'theme_location'		=> 'top',
					'depth' 					=> 1,
					'container' 			=> 'div',
					'container_class' => 'col-sm-6',
					'container_id' 		=> 'top-navigation',
					'menu_class' 			=> 'top-menu nav nav-pills navbar-right',
					'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
					'walker' 					=> new wp_bootstrap_navwalker(),
				)); ?>
			</div>
		</div>
	</div>

	<div id="page" class="hfeed site container">
		<header id="masthead" class="site-header" itemscope itemtype="http://schema.org/Organization">
			<div class="site-branding container <?php if ( get_theme_mod( 'idaho_full_header_image', false ) ) : ?>header-background<?php endif;?>">
				<div class="row">
					<div class="col-md-9 col-xs-8 col-sm-9 <?php if ( ! get_theme_mod( 'idaho_full_header_image', false ) ) : ?>header-background<?php endif;?>">
						
						<div class="row">
							<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo hidden-xs hidden-sm col-md-4" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img itemprop="logo" src="<?php echo esc_url( get_template_directory_uri() . '/img/logo' . ( ( get_theme_mod( 'idaho_grey_logo', false ) ) ? '-grey' : '' ) . '.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
							</a>
							<div class="header-text col-md-8">

								<?php /** Include header file based on theme options (template-parts/header-{type}). */ ?>
								<?php get_template_part( 'template-parts/header', get_theme_mod( 'idaho_header_layout', 'overmedium' ) ); ?>

							</div>
						</div>


					</div>

					<div class="col-md-3 col-xs-4 col-sm-3">
						<div class="search-form hidden-xs hidden-print">
							<?php if ( ! get_theme_mod( 'idaho_search_header', false )  && ! is_404() ) : ?>
							<?php get_search_form(); ?>
							<?php endif; ?>
							<?php get_template_part( 'template-parts/header', 'social' ); ?>
						</div><?php /** .search-form */ ?>

						<div id="toggle" class="toggle visible-xs mobile-nav btn-group">
								<button type="button" class="nav-toggle btn btn-lg btn-primary" data-toggle="collapse" data-target="#main-navigation">
		          		<span class="sr-only">Toggle navigation</span>
		          		<span class="glyphicons glyphicons-menu-hamburger"></span>
		          	</button>
								<?php if ( 'on' !== get_post_meta( get_the_ID(), '_idaho_search_header', true ) ) : ?>
			          	<button type="button" class="search-toggle collapsed btn btn-lg btn-primary" data-toggle="collapse" data-target="#search-collapse">
			          		<span class="sr-only">Toggle search</span>
			          		<span class="glyphicons glyphicons-search"></span>
			          	</button>
								<?php endif; ?>

		        	</div>
					</div>

				</div>
			</div><?php /** .site-branding */ ?>

			<?php if ( get_post_meta( get_the_ID(), '_idaho_search_header', true ) !== 'on' ) : ?>
				<div class="mobile search-form collapse hidden-print" id="search-collapse">
					<?php get_search_form(); ?>
				</div>
			<?php endif; ?>

				<?php /** Include the header carousel if it's enabled by the page options */ ?>
				<?php if ( get_post_meta( get_the_ID(), '_idaho_enable_carousel', true ) === 'on' ) : ?>
					<?php get_template_part( 'template-parts/header', 'carousel' ); ?>
				<?php endif; ?>

				<?php /** If the header navigation is disabled only allow it on screen with the smallest breakpoint */ ?>
				<?php if ( ! get_theme_mod( 'idaho_horizontal_navigation', true ) && ! is_404() ) : ?>
					<div class="visible-xs">
				<?php endif; ?>

				<div class="collapse navbar-collapse navbar-default" id="main-navigation">
				<?php $primary_nav_item = 'primary'; ?>
				<?php if ( get_post_meta( get_the_ID(), '_idaho_override_nav', true ) !== 'none' ) :
					$primary_nav_item = get_post_meta( get_the_ID(), '_idaho_override_nav', true );
				else: 
					if ( wp_get_post_parent_id( get_the_ID() ) && get_post_meta( wp_get_post_parent_id( get_the_ID() ), '_idaho_override_nav', true ) !== 'none' ) :
						$primary_nav_item = get_post_meta( wp_get_post_parent_id( get_the_ID() ), '_idaho_override_nav', true );
					endif;
				endif;
				?>
				<?php wp_nav_menu( array(
						'menu' => $primary_nav_item,
						'theme_location' => 'primary',
						'depth' => 0,
						'container' => false,
						'container_class' => false,
						'container_id' => false,
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
						'walker' => new wp_bootstrap_navwalker(),
					) ); ?>

					<?php /** Displays social links in the menu for small screens. */ ?>
					<div class="primary-social-nav visible-xs">
						<?php get_template_part( 'template-parts/header', 'social' ); ?>
					</div>

				</div>

				<?php if ( ! get_theme_mod( 'idaho_horizontal_navigation', true ) && ! is_404() ) : ?>
					</div>
				<?php endif; ?>

		</header><?php /** #masthead */ ?>
		<div id="content" class="site-content container">
			<?php if ( 'on' !== get_post_meta( get_the_ID(), '_idaho_breadcrumbs', 'off' )  ) : ?>
				<?php if ( ! is_404() ) : ?>
					<?php bootstrap_breadcrumbs(); ?>
				<?php endif; ?>
			<?php endif; ?>

			<div class="row">
