<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Idaho_Webmaster
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr( ( is_active_sidebar( 'sidebar-home' ) ) ? 'col-md-8' : 'col-md-12' ); ?>">
		<main id="main" class="site-main">

			<?php if ( ! get_theme_mod( 'idaho_search_home', true ) ) : ?>
			<div class="row hidden-print">
				<div class="col-md-8 col-md-offset-2">
					<form class="mobile search-form home" method="get" accept-charset="UTF-8" action="http://search.usa.gov/search" role="search">
						<input name="utf8" type="hidden" value="&#x2713;" />
						<input name="affiliate" type="hidden" value="<?php echo esc_attr( get_theme_mod( 'idaho_search_affiliate', 'idahogov' ) ); ?>" />
						<div class="input-group">
							<input type="text" class="form-control input-lg" placeholder="Search" title="Search" name="query">
							<span class="input-group-btn">
								<button class="btn btn-search" type="submit" title="Search">
									<span class="glyphicons glyphicons-search"></span>
								</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'idaho-webmaster' ),
							'after'  => '</div>',
						) );
					?>

			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
		<div class="col-md-4">
			<?php dynamic_sidebar( 'sidebar-home' ); ?>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>
