<?php
/**
 * Template part for displaying large header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idaho_Webmaster
 */

?>

<div class="brand-text">
	<?php if ( is_front_page() && is_home() ) : ?>
		<h1 class="site-title heading-lg"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<?php else : ?>
		<p class="h1 site-title heading-lg"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	<?php endif; ?>
</div>
