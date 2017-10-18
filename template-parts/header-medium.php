<?php
/**
 * Template part for displaying medium header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idaho_Webmaster
 */

?>

<div class="brand-text">
	<?php if ( is_front_page() && is_home() ) : ?>
		<h1 class="site-title heading-md"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><br><?php bloginfo( 'description' ); ?></a></h1>
	<?php else : ?>
		<p class="h1 site-title heading-md"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><br><?php bloginfo( 'description' ); ?></a></p>
	<?php endif; ?>
</div>
