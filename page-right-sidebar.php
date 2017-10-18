<?php
/**
 * Template Name: Right Sidebar
 *
 * @package WordPress
 * @subpackage Idaho_Webmaster
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-9 col-sm-8">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<div id="secondary" class="widget-area col-md-3 col-sm-4" role="complementary">
	<?php dynamic_sidebar('sidebar-page'); ?>
</div><!-- #secondary -->

<?php get_footer(); ?>
